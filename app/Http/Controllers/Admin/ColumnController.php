<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AuthRule;
use DB;
/**
 * 栏目管理
 */
class ColumnController extends Controller
{
    /**
     * 处理栏目分类数据
     */
    public static function category(){
        $data=AuthRule::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        foreach($data as $k=>$v){
            $n=substr_count($v->path,',');
            $data[$k]->title=str_repeat('|----',$n).$data[$k]->title;
        }
        return $data;
    }
    /**
     * 加载栏目管理首页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count=AuthRule::count();
        $search = $request->input('search','');
        $data=AuthRule::select('*',DB::raw("concat(path,',',id) as paths"))->where('title','like','%'. $search.'%')->orderBy('paths','asc')->get();
        foreach($data as $k=>$v){
            $n=substr_count($v->path,',');
            $data[$k]->title=str_repeat('|----',$n).$data[$k]->title;
        }
        return view('admin.column.index',['data' => $data,'count'=>$count,'request'=>$request->all()]);
    }

    /**
     * 加载添加栏目页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $column_data=self::category();
        //$column_data=AuthRule::all();
        return view('admin.column.create',['column_data'=>$column_data]);
    }

    /**
     * 接收添加页面的数据，将其存入数据库
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except('_token');
        $request->flashExcept('_token');
        //验证表单数据
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'pid' => 'required',
            'status' => 'required',
            'sort' => 'required',
        ],[
            'name.required' => '栏目控制器路由必填',
            'title.required' => '栏目名称必填',
            'pid.required' => '上级栏目必填',
            'status.required'=>'栏目状态必填',
            'sort.required'=>'排序必填',
        ]);
        $obj=new AuthRule;
        if($data['pid']==0){
            $obj->path='0' ;
        }else{
            $parent_info=$obj->find($data['pid']);
            $obj->path=$parent_info->path.','.$data['pid'];
        }
        $obj->name=$data['name'];
        $obj->title=$data['title'];
        $obj->pid=$data['pid'];
        $obj->status=$data['status'];
        $obj->icon=$data['icon'];
        $obj->sort=$data['sort'];
        $res=$obj->save();
        if($res){
            echo '添加成功';
           return $id = $obj->id;
        }else{
            return back()->with('error','添加失败');
        }
    }
    /** 
     * 添加子分类，加载添加页面
     * */ 
    public function add_child($id)
    {
        $column_data=self::category();
        return view('admin.column.add_child',['cid'=>$id,'column_data'=>$column_data]);
        
    }
    /**
     * 创建子分类，并添加到数据库
     */
    public function store_child(Request $request){
        $data=$request->except('_token');
        $request->flashExcept('_token');
        //验证表单数据
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'pid' => 'required',
            'status' => 'required',
            'sort' => 'required',
        ],[
            'name.required' => '栏目控制器路由必填',
            'title.required' => '栏目名称必填',
            'pid.required' => '上级栏目必填',
            'status.required'=>'栏目状态必填',
            'sort.required'=>'排序必填',
        ]);
        $obj=new AuthRule;
        if($data['pid']==0){
            $obj->path='0' ;
        }else{
            $parent_info=$obj->find($data['pid']);
            $obj->path=$parent_info->path.','.$data['pid'];
        }
        $obj->name=$data['name'];
        $obj->title=$data['title'];
        $obj->pid=$data['pid'];
        $obj->status=$data['status'];
        $obj->icon=$data['icon'];
        $obj->sort=$data['sort'];
        $res=$obj->save();
        if($res){
            echo '添加成功';
           return $id = $obj->id;
        }else{
            return back()->with('error','添加失败');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $column_data=self::category();
        $data=AuthRule::find($id);
        return view('admin.column.edit',['column_data'=>$column_data,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->except('_token','_method');
        //验证表单数据
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'pid' => 'required',
            'status' => 'required',
            'sort' => 'required',
        ],[
            'name.required' => '栏目控制器路由必填',
            'title.required' => '栏目名称必填',
            'pid.required' => '上级栏目必填',
            'status.required'=>'栏目状态必填',
            'sort.required'=>'排序必填',
        ]);
        $obj=new AuthRule;
        if($data['pid']==0){
            $path='0' ;
        }else{
            $parent_info=$obj->find($data['pid']);
            $path=$parent_info->path.','.$data['pid'];
        }
        $data['path']=$path;
        $res=AuthRule::where('id',$id)
        ->update($data);
        if($res){
            return "修改成功";
            // dd("修改成功");
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $res =AuthRule::find($id)->delete();
        if ($res) {
            $data = [
                'status' => 0,
                'msg' => '删除成功'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '删除失败'
            ];
        }
        $data=json_encode($data);
        return $data;
    }

    /**
     * 批量删除
     */
    public function delall(Request $request)
    {
        for ($i=0; $i<count($request['keys']); $i++) {
              // 遍历删除
              $res =AuthRule::find($request['keys'][$i])->delete();   
        }
        $res=1;
        if ($res) {
            $data = [
                'status' => 0,
                'msg' => '删除成功'
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '删除失败'
            ];
        }
        $data=json_encode($data);
        return $data;
       
    }
}

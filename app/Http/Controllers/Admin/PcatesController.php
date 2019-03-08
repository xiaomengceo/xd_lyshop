<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\ProductCates;
class PcatesController extends Controller
{
    /**
     * 处理商品分类数据
     */
    public static function category(){
        $data=ProductCates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        foreach($data as $k=>$v){
            $n=substr_count($v->path,',');
            $data[$k]->title=str_repeat('|----',$n).$data[$k]->title;
        }
        return $data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count=ProductCates::count();
        $search = $request->input('search','');
        $data=ProductCates::select('*',DB::raw("concat(path,',',id) as paths"))->where('title','like','%'. $search.'%')->orderBy('paths','asc')->get();
        foreach($data as $k=>$v){
            $n=substr_count($v->path,',');
            $data[$k]->title=str_repeat('|----',$n).$data[$k]->title;
        }
        return view('admin.pcates.index',['data' => $data,'count'=>$count,'request'=>$request->all()]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $column_data=self::category();
        return view('admin.pcates.create',['column_data'=>$column_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except('_token');
        $obj=new ProductCates;
        if($data['pid']==0){
            $obj->path='0' ;
        }else{
            $parent_info=$obj->find($data['pid']);
            $obj->path=$parent_info->path.','.$data['pid'];
        }
        $obj->title=$data['title'];
        $obj->pid=$data['pid'];
        $obj->status=$data['status'];
        $obj->order=$data['order'];
        $res=$obj->save();
        if ($res) {
            $data = [
                'status' => 1,
                'msg' => '添加成功',
            ];
        }else{
            $data = [
                'status' => 0,
                'msg' => '添加失败'
            ];
        }
        $data=json_encode($data);
        return $data;
    }

    /** 
     * 添加子分类，加载添加页面
     * */ 
    public function add_child($id)
    {
        $column_data=self::category();
        return view('admin.pcates.add_child',['cid'=>$id,'column_data'=>$column_data]);
        
    }
    /**
     * 创建子分类，并添加到数据库
     */
    public function store_child(Request $request){
        $data=$request->except('_token');
        $obj=new ProductCates;
        if($data['pid']==0){
            $obj->path='0' ;
        }else{
            $parent_info=$obj->find($data['pid']);
            $obj->path=$parent_info->path.','.$data['pid'];
        }
        $obj->title=$data['title'];
        $obj->pid=$data['pid'];
        $obj->status=$data['status'];
        $obj->order=$data['order'];
        $res=$obj->save();
        if ($res) {
            $data = [
                'status' => 1,
                'msg' => '添加成功',
            ];
        }else{
            $data = [
                'status' => 0,
                'msg' => '添加失败'
            ];
        }
        $data=json_encode($data);
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $data=ProductCates::find($id);
        return view('admin.pcates.edit',['column_data'=>$column_data,'data'=>$data]);
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
            'title' => 'required',
            'pid' => 'required',
            'status' => 'required',
            'order' => 'required',
        ],[
            'title.required' => '分类名称必填',
            'pid.required' => '上级分类必填',
            'status.required'=>'栏目状态必填',
            'order.required'=>'排序必填',
        ]);
        $obj=new ProductCates;
        if($data['pid']==0){
            $path='0' ;
        }else{
            $parent_info=$obj->find($data['pid']);
            $path=$parent_info->path.','.$data['pid'];
        }
        $data['path']=$path;
        $res=ProductCates::where('id',$id)
        ->update($data);
        if ($res) {
            $data = [
                'status' => 1,
                'msg' => '修改成功',
            ];
        }else{
            $data = [
                'status' => 0,
                'msg' => '修改失败'
            ];
        }
        $data=json_encode($data);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $res =ProductCates::find($id)->delete();
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
              $res =ProductCates::find($request['keys'][$i])->delete();   
        }
        if ($res) {
            $data = [
                'status' => 1,
                'msg' => '删除成功'
            ];
        }else{
            $data = [
                'status' => 0,
                'msg' => '删除失败'
            ];
        }
        $data=json_encode($data);
        return $data;
       
    }

}

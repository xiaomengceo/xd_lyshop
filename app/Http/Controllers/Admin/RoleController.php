<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AuthRule;
use DB;
use App\Model\AuthGroup;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data=AuthGroup::find(1)->admin;
        // dump($data);
        $group=AuthGroup::get();
        $str="";
        foreach($group as $k=>$v){
            $admin=$v->admin;
            foreach($admin as $kk=>$vv){
                 $str.=$vv->username.",";
                 $group[$k]['username']=substr($str,0,strlen($str)-1);
            } 
              
        }
        return view('admin.role.index',['group'=>$group]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role_data=AuthRule::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        //$role_data=ColumnController::category();
        return view('admin.role.create',['role_data'=>$role_data]);
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
        $data['rules']=implode(",", $data['user-Character']);
        $group=new AuthGroup;
        $group->title=$data['title'];
        $group->rules=$data['rules'];
        $group->status=$data['status'];
        $group->commit=$data['commit'];
        $res=$group->save();
        $res=1;
        if ($res) {
            $data = [
                'status' => 1,
                'msg' => '添加成功',
                'data'=>$data
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
        $role_data=AuthRule::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        $data=AuthGroup::find($id);
        $str=$data->rules;
        $data->rules=explode(",",$str);
        return view('admin.role.edit',['role_data'=>$role_data,'data'=>$data]);
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
         
        $data=$request->except('_token');
        $data['rules']=implode(",", $data['user-Character']);
        $res=AuthGroup::where('id',$id)
        ->update([
            'title'=>$data['title'],
            'status'=>$data['status'],
            'rules'=>$data['rules'],
            'commit'=>$data['commit']
        ]);
        if ($res) {
            $data = [
                'status' => 1,
                'msg' => '修改成功',
                'data'=>$data
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
        //先把数据查出来，再做删除，否则会报错，
        //关联模型数据依赖当前模型数据
        $group_rule =AuthGroup::find($id)->group_rule;
        $re=AuthGroup::find($id)->delete();
        if($group_rule->isEmpty()){
            //如果从关联表查找不到数据直接返回1
            $res=true;
        }else{
            foreach($group_rule as $k=>$v){
                $res=$v->delete();
            }
        }    
        if ($re&&$res) {
            $data = [
                'status' => 1,
                'msg' => '删除成功',
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

    /**
     * 批量删除
     */
    public function delall(Request $request)
    {
        for ($i=0; $i<count($request['keys']); $i++) {
              // 遍历删除
              $group_rule =AuthGroup::find($request['keys'][$i])->group_rule;
              if($group_rule->isEmpty()){
                //如果从关联表查找不到数据直接返回1
                $res=true;
               }else{
                    foreach($group_rule as $k=>$v){
                        $res=$v->delete();
                    }
               }    
              $re =AuthGroup::find($request['keys'][$i])->delete();  
        }
        //$res=1;
        if ($res&&$re) {
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

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\AuthGroup;
use App\Model\GroupRule;
/**
 * 管理员模块
 */
class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search','');
        $begin_time=$request->input('begin_time','');
        $end_time=$request->input('end_time','');
        $admin_data=Admin::where('username','like','%'. $search.'%')->get();
        // ->whereBetween('create_time', [$begin_time, $end_time])
        if(empty($begin_time)&&!empty($end_time)){
          $admin_data=Admin::where('username','like','%'. $search.'%')->where('create_time','<',$end_time)->get();
        }else if(!empty($begin_time)&&empty($end_time)){
            $admin_data=Admin::where('username','like','%'. $search.'%')->where('create_time','>',$begin_time)->get();
        }else if(!empty($begin_time)&&!empty($end_time)){
            $admin_data=Admin::where('username','like','%'. $search.'%')->whereBetween('create_time', [$begin_time, $end_time])->get();
        }
        //多对多的数据取出的时候需要层层遍历出来
        foreach($admin_data as $k=>$v){
              $group=$v->group;
              foreach($group as $kk=>$vv){
                $admin_data[$k]['title']=$vv->title;
              }   
        }
        $data=$admin_data;
         
        return view('admin.admins.index',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group=AuthGroup::get();
        return view('admin.admins.create',['group'=>$group]);
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
        $role_id=$data['role_id'];
        $password2=$data['password2'];
        $data=$request->except('_token','role_id','password2');
        $id=Admin::insertGetId($data);
        for($i=0;$i<count($role_id);$i++){
            $res=GroupRule::insert(['uid'=>$id,'group_id'=>$role_id[$i]]);
        }
        //$res=1;
        if ($res) {
            $data = [
                'status' => 1,
                'msg' => '添加成功',
                'ds' =>$data
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
     *  做启用和停用的功能.
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
        //取出角色组数据
        $group=AuthGroup::get();
        //获取当前管理员数据
        $admin_data=Admin::find($id);
        $grules=$admin_data->rule;
        $rule=array();
        foreach($grules as $k=>$v){
           $rule[]=$v->group_id;
        }
        return view('admin.admins.edit',['admin_data'=>$admin_data,'group'=>$group,'rule'=>$rule]);
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
        $role_id=$data['role_id'];
        $password2=$data['password2'];
        $data=$request->except('_token','role_id','password2');
        $res=Admin::where('id',$id)->update($data);
        $admin=Admin::find($id);
        // 移除用户的所有角色（好使）
        $admin->group()->detach();
        //给用户添加角色（好使）
        $admin->group()->attach($role_id);
        $res=1;
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
        $res =Admin::find($id)->delete();
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
              $res =Admin::find($request['keys'][$i])->delete();   
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

     /**
      * 修改用户状态
      */
    public function change(Request $request, $id){
        $admin_data =Admin::find($id);
        $admin_data->status=$request->input('status');
        $admin_data->save();
        $data = [
                        'status' => 1,
                        'msg' => '成功'
                    ];
        $data=json_encode($data);
        return $data;
    }

}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Userinfos;
/**
 * 普通用户管理
 */
class UsersController extends Controller
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
        $data=Userinfos::where('user_name','like','%'. $search.'%')->get();
        // ->whereBetween('create_time', [$begin_time, $end_time])
        if(empty($begin_time)&&!empty($end_time)){
          $data=Userinfos::where('user_name','like','%'. $search.'%')->where('created_at','<',$end_time)->get();
        }else if(!empty($begin_time)&&empty($end_time)){
            $data=Userinfos::where('user_name','like','%'. $search.'%')->where('created_at','>',$begin_time)->get();
        }else if(!empty($begin_time)&&!empty($end_time)){
            $data=Userinfos::where('user_name','like','%'. $search.'%')->whereBetween('created_at', [$begin_time, $end_time])->get();
        }
        $data=$data;
         
        return view('admin.users.index',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$data=$request->except('_token');
        //$password2=$data['password2'];
        $salt="*$%#@15153qazPLM";
        $data=$request->except('_token','password2');
        //$res=Userinfos::insert($data);
        $user=new Userinfos;
        $user->user_name=$data['user_name'];
        $user->password=md5($salt.$data['password']);
        $user->sex=$data['sex'];
        $user->telephone=$data['telephone'];
        $user->email=$data['email'];
        $res=$user->save();
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
         $data=Userinfos::find($id);
         return view('admin.users.edit',['data'=>$data]);
        
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
        $salt="*$%#@15153qazPLM";
        $data=$request->except('_token');
        $data=$request->except('_token','password2');
        $user=Userinfos::find($id);
        $user->user_name=$data['user_name'];
        $user->password=md5($salt.$data['password']);
        $user->sex=$data['sex'];
        $user->telephone=$data['telephone'];
        $user->email=$data['email'];
        $res=$user->save();
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
        $res =Userinfos::find($id)->delete();
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
              $res =Userinfos::find($request['keys'][$i])->delete();   
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
        $admin_data =Userinfos::find($id);
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

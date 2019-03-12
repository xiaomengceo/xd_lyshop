<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Home\Informat;
class InformatController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $id = 8;
        $info  = Informat::find($id);
        //dump($info);

       return view('home.informat.index', ['info'=>$info] ); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('home.informat.add'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $info = $request->except('_token');
         $xinxi =new Informat;
        $xinxi->user_name = $info['user_name'];
        $xinxi->real_name = $info['real_name'];
        $xinxi->birthday = $info['year1'] .'年'. $info['month1'].'月' . $info['day1'].'日' ;
        $xinxi->telephone = $info['telephone'];
        $xinxi->users_pic = $info['urs_pic'];
         $xinxi->email = $info['email'];
     /*    为密码加点盐*/
         $salt="！@#%&&adadsiikkkl";
         $xinxi->password = md5( $info['password']. $salt);
        $xinxi->marital_status = $info['marital_status'];
        $xinxi->sex = $info['sex'];
      
        $res = $xinxi->save();

        if($res){
            $data = [
                'msg'=>'success',
                'path' =>$res
            ];
        }else{
            $data = [
                'msg'=>'error',
                'path'=>404
            ];
        }
        $insertId = $xinxi->id;
        dump('提交资料成功');
        return redirect('/home/informat/')->with($insertId);
       // echo json_encode($data);
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
        $info = Informat::find($id);
        return view('home.informat.edit' , ['info'=>$info]);
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
        $info = $request->except('_token','_method');
        $xinxi = Informat::find($id);
        $xinxi->user_name = $info['user_name'];
        $xinxi->real_name = $info['real_name'];
        $xinxi->birthday = $info['year1'] .'年'. $info['month1'].'月' . $info['day1'].'日' ;
        $xinxi->telephone = $info['telephone'];
        $xinxi->users_pic = $info['urs_pic'];
         $xinxi->email = $info['email'];
           $salt="！@#%&&adadsiikkkl";
         $xinxi->password = md5( $info['password']. $salt);
        $xinxi->marital_status = $info['marital_status'];
        $xinxi->sex = $info['sex'];
       $res = $xinxi->save();

       if($res){
            $data = [
                'msg'=>'success',
                'path' =>$res
            ];
        }else{
            $data = [
                'msg'=>'error',
                'path'=>404
            ];
        }
        echo json_encode($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        /**
     * 加载上传图片的方法
     */
    
    public function upload(Request $request)
    {
        $rm ='到底是股份';
        if($request->hasFile('users_pic')){
            //创建文件上传对象
            $file = $request->file('users_pic');
            $res = $file->store('public');
            if($res){
                $data = [
                    'msg'=>'success',
                    'path'=>$res
                ];
            }else{
                $data = [
                    'msg'=>'error',
                    'path'=>$rm
                ];
            }
            echo json_encode($data);
        }else{
            dump('给我图片,号码');
            return back();
        }
    }
}

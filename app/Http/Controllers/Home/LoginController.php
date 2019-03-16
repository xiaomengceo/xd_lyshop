<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Userinfos;
//前台登录模块
class LoginController extends Controller
{
    public function login(){
        return view('home.login.login');
    }
    //验证登录
    public function check_login(request $request){
        $data=$request->except('_token');
        $salt="*$%#@15153qazPLM";
        //手机号正则
        $preg_phone='/^1[34578]\d{9}$/ims';
        //邮箱正则
        $preg_email='/^[a-zA-Z0-9]+([-_.][a-zA-Z0-9]+)*@([a-zA-Z0-9]+[-.])+([a-z]{2,5})$/ims';
        if(preg_match($preg_phone,$data['account'])){
           $res=Userinfos::where('telephone',$data['account'])->first();
           if($res!=null){
              if($res->password==md5($salt.$data['password'])){
                return redirect('/home/index')->with('success', '登录成功');
              }else{
                dd('账号或密码有误');
              }
           }else{
            dd('账号或密码有误');
           }   
        }else if(preg_match($preg_email,$data['account'])){
            if(preg_match($preg_email,$data['account'])){
                $res=Userinfos::where('email',$data['account'])->first();
                if($res!=null){
                    if($res->password==md5($salt.$data['password'])){
                        return redirect('/home/index')->with('success', '登录成功');
                    }else{
                        dd('账号或密码有误');
                    }
                }else{
                    dd('账号或密码有误');
                }   
            }
        }else {
            $res=Userinfos::where('user_name',$data['account'])->first();
                if($res!=null){
                    if($res->password==md5($salt.$data['password'])){
                        return redirect('/home/index')->with('success', '登录成功');
                    }else{
                        dd('账号或密码有误');
                    }
                }else{
                    dd('账号或密码有误');
                }   
        }
    }
}

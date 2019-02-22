<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin;
use Illuminate\Contracts\Encryption\DecryptException;
 /**
 * 登录管理
 * Class AdminUser
 * @package app\Http\Controllers\admin\LoginController.php
 */
class LoginController extends Controller
{
    /**
     * 登录方法
     * @return 页面 
     */
    public function login(){
        return view('admin.login.login');
    }
    
    public function check_login(Request $request){
        //验证表单数据
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'code' => 'required|captcha',
        ],[
            'username.required' => '用户名必填',
            'password.required' => '密码必填',
            'code.required' => '验证码不能为空',
            'code.captcha'=>'请输入正确的验证码',
        ]);
        //获取表单数据
        $data=$request->except('_token');
        $salt="！@#%&&adadsiikkkl";
        $password =md5($data['password'].$salt);
        //查询用户数据，返回查询结果
        $res=Admin::find($data['username']); 
        //$res=Admin::where('username',$data['username'])->where('password',$password)->get();
        if($res){ 
            if($res->password==$password){
                session(['username'=>$data['username']]);
                return redirect('admin/index')->with('success', '成功');
            }else{
                return redirect('admin/login/login')->with('error', '验证失败');
            }   
        }else{
            return redirect('admin/login/login')->with('error', '验证失败');
        }
        
        

        //return redirect('article')->with('success', '添加成功');

         
    }
    /**
     * 退出登录
     */
    public function login_out(){
        session(['username'=>null]);
        return redirect('admin/login/login');
    }

}

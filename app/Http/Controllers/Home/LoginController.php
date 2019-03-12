<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LoginController extends Controller
{
	/**
	 * 加载登录页面的方法
	 */
    
    public function login() {
    	//dump('的点点滴滴');
    	return view('home.login');
    }
    /**
     * 加载检测登录状态的方法
     */
    
    public function check_login(Request $request) {
          //验证表单数据
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            
        ],[
            'username.required' => '用户名必填',
            'password.required' => '密码必填',
        ]);


    }



    /**
	 * 加载退出登录页面的方法
	 */
    public function login_out() {
    	dump('退出登录');
    	 session(['username'=>null]);
    	return redirect('home.login');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 框架欢迎页控制器
 */
class HomeController extends Controller
{
    /**
     * index控制器加载后台欢迎页页面
     */
    public function index(){
        
       return view('admin.home.index');
    }
}

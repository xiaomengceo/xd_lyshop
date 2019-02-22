<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/**
 * 资源控制器操作处理#
*动作  URI 操作  路由名称
*GET /photos index   photos.index
*GET /photos/create  create  photos.create
*POST    /photos store   photos.store
*GET /photos/{photo} show    photos.show
*GET /photos/{photo}/edit    edit    photos.edit
*PUT/PATCH   /photos/{photo} update  photos.update
*DELETE  /photos/{photo} destroy photos.destroy
 */
Route::group(['middleware'=>'login'],function(){
    
    Route::get('admin/home/index','Admin\HomeController@index');
    Route::resource('admin/index','Admin\IndexController');
});

Route::get('admin/login/login','Admin\LoginController@login');
Route::post('admin/login/check_login','Admin\LoginController@check_login');
Route::get('admin/login/login_out','Admin\LoginController@login_out');



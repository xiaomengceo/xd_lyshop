<?php

/*
|--------------------------------------------------------------------------
| Web Routes 路由管理
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
Route::resource('admin/column','Admin\ColumnController');
Route::post('admin/column/delall','Admin\ColumnController@delall');
Route::resource('admin/admins','Admin\AdminsController');
Route::get('admin/column/add_child/{id}','Admin\ColumnController@add_child');
Route::post('admin/column/store_child','Admin\ColumnController@store_child');
Route::resource('admin/role','Admin\RoleController');
Route::post('admin/role/delall','Admin\RoleController@delall'); 
Route::get('admin/admins/change/{id}','Admin\AdminsController@change');

//商品分类
Route::resource('admin/pcates','Admin\PcatesController');
Route::post('admin/pcates/delall','Admin\PcatesController@delall');
Route::post('admin/pcates/store_child','Admin\PcatesController@store_child');
Route::get('admin/pcates/add_child/{id}','Admin\PcatesController@add_child');
//商品品牌
Route::resource('admin/brand','Admin\BrandController');
Route::post('admin/brand/upload','Admin\BrandController@upload');
Route::post('admin/brand/delall','Admin\BrandController@delall');
Route::post('admin/brand/up/{id}','Admin\BrandController@up');
//商品
Route::resource('admin/product','Admin\ProductController');
Route::post('admin/product/upload','Admin\ProductController@upload');
Route::post('admin/product/uploads','Admin\ProductController@uploads');
Route::post('admin/product/delall','Admin\ProductController@delall');
Route::get('admin/product/in_store/{id}','Admin\ProductController@in_store'); 
Route::post('admin/product/save_store','Admin\ProductController@save_store');  
Route::get('admin/product/change/{id}','Admin\ProductController@change');  
//商品规格
Route::resource('admin/spec','Admin\SpecController');
Route::post('admin/spec/delall','Admin\SpecController@delall');
Route::get('admin/product/get_pcate/{id}','Admin\ProductController@get_pcate');  






//app接口测试
Route::resource('home/app','Home\AppController');
Route::get('home/app/check/{t}/{r}/{s}','Home\AppController@check');
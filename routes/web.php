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

//后台登录
Route::get('admin/login/login','Admin\LoginController@login');
Route::post('admin/login/check_login','Admin\LoginController@check_login');
Route::get('admin/login/login_out','Admin\LoginController@login_out');
//后台栏目
Route::resource('admin/column','Admin\ColumnController');
Route::post('admin/column/delall','Admin\ColumnController@delall');
Route::get('admin/column/add_child/{id}','Admin\ColumnController@add_child');
Route::post('admin/column/store_child','Admin\ColumnController@store_child');
//管理员
Route::resource('admin/admins','Admin\AdminsController');
Route::get('admin/admins/change/{id}','Admin\AdminsController@change');
Route::post('admin/admins/delall','Admin\AdminsController@delall'); 
//角色
Route::resource('admin/role','Admin\RoleController');
Route::post('admin/role/delall','Admin\RoleController@delall'); 
//用户管理
Route::resource('admin/users','Admin\UsersController');
Route::post('admin/users/delall','Admin\UsersController@delall'); 
Route::get('admin/users/change/{id}','Admin\UsersController@change');
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

//前台模块
//前台登录
Route::get('home/login/login','Home\LoginController@login');
Route::post('home/login/check_login','Home\LoginController@check_login');
Route::get('home/login/login_out','Home\LoginController@login_out');
//注册
Route::get('home/register/index','Home\RegisterController@index');
Route::post('home/register/by_email','Home\RegisterController@by_email');
Route::post('home/register/by_phone','Home\RegisterController@by_phone');
Route::get('home/register/change_status/{id}/{token}','Home\RegisterController@change_status');
Route::get('home/register/send_phone/{phone}','Home\RegisterController@send_phone');
//前台首页
Route::resource('home/index','Home\IndexController');
Route::get('home/index/change_product/{id}','Home\IndexController@change_product');





//司科伟路由

/*加载订单物流详细信息的路由*/
/*加载批量删除的路由*/
Route::post('/admin/order_logis/delall' , 'Admin\OrderLogisController@delall');
Route::resource('/admin/order_logis' , 'Admin\OrderLogisController');
/*加载物流公司信息管理模块的路由*/
//加载批量删除数据的路由
Route::post('/admin/expr_manages/delall' , 'Admin\ExprManagesController@delall');
//加载上传图片的路由
Route::post('/admin/expr_manages/upload' , 'Admin\ExprManagesController@upload');
Route::resource('/admin/expr_manages' , 'Admin\ExprManagesController');

/*加载友情链接管理的路由*/
//加载文件上传的方法/admin/friend_links/upload1
Route::post('/admin/friend_links/display' , 'Admin\FriendLinksController@display');
/*加载批量删除的路由*/
Route::post('/admin/friend_links/delall' , 'Admin\FriendLinksController@delall');
Route::post('/admin/friend_links/upload1' , 'Admin\FriendLinksController@upload1');
Route::resource('/admin/friend_links' , 'Admin\FriendLinksController');
/*加载文章分类管理的路由*/
Route::resource('/admin/article_types' , 'Admin\ArticleTypesController');
/*加载文章详情的路由*/
/*加载批量删除的路由*/
Route::post('/admin/article_infos/delall' , 'Admin\ArticleInfosController@delall');
Route::resource('/admin/article_infos' , 'Admin\ArticleInfosController');
/*加载文章评论的路由*/
/*加载批量删除的路由*/
Route::post('/admin/article_rat/delall' , 'Admin\ArticleRatController@delall');
Route::resource('/admin/article_rat' , 'Admin\ArticleRatController');
/*加载轮播图的路由*/
//加载批量删除数据的路由
Route::post('/admin/view_pagers/delall' , 'Admin\ViewPagersController@delall');
Route::post('/admin/view_pagers/upload','Admin\ViewPagersController@upload');
Route::resource('/admin/view_pagers' , 'Admin\ViewPagersController');
/*加载轮播图分类信息的路由*/
/*加载批量删除的路由*/
Route::post('/admin/viewp_cates/delall' , 'Admin\ViewpCatesController@delall');
Route::resource('/admin/viewp_cates' , 'Admin\ViewpCatesController');
//加载订单管理模块的路由
Route::resource('/admin/order_list' , 'Admin\OrderListController');


//前台路由									
/*加载物流公司信息管理模块的路由*/
Route::resource('/home/address' , 'Home\AddressController');
/*加载个人信息管理模块的路由*/
/*加载上传图片的方法*/
Route::post('/home/informat/upload' , 'Home\InformatController@upload');
Route::resource('/home/informat' , 'Home\InformatController');
/*加载个人中心的安全设置模块的路由*/
/*加载个人中心模块发送邮件的方法*/
Route::get('/home/safety/send_mail' , 'Home\SafetyController@SendMail');
/*加载验证邮箱的方法*/
Route::post('/home/safety/showcode' , 'Home\SafetyController@ShowCode');
/*加载验证手机号的方法*/
Route::get('/home/safety/showphone' , 'Home\SafetyController@ShowPhone');
/*执行发送短信的方法*/
Route::get('/home/safety/dosend' , 'Home\SafetyController@DoSend');
/*加载安全模块的方法*/
Route::resource('/home/safety' , 'Home\SafetyController');






/*加载前台订单列表模块的路由*/
Route::resource('/home/my_orders' , 'Home\MyOrdersController');






//加载前台主页的路由
Route::resource('/home/index' , 'Home\IndexController');
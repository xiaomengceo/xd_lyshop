<?php

namespace App\Home;

use Illuminate\Database\Eloquent\Model;

class MyOrders extends Model
{
     //设置默认操作的表名
    public $table = 'order_lists';
    //设置日期字段保存格式
   // protected $dateFormat = 'U';
   // public $timestamps = false; //不验证时间
   

  /**
   *  加载查询商品信息的方法
   *  配对一对多关系模型,关联商品表
   */

   public function getGoods(){
   		return	$this->hasMany('App\Model\Product','id','gid');

   }
}

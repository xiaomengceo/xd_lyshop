<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
/**
 * 商品表
 */
class Product extends Model
{
    //修改默认表名
    public $table='product';
    //一对多,关联商品列表（副表）
    public function product_sku()
    {
        return $this->hasMany('App\Model\ProductSku','product_id');
    }
    //一对多，关联商品图片组表
    public function product_img()
    {
        return $this->hasMany('App\Model\ProductImg','product_id');
    }
    //一对一 关联商品规格表
    public function property_name()
    {
       return $this->belongsTo('App\Model\PropertyName','spec_id');
    }
    
}

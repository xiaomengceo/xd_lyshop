<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
/**
 * 商品分类表  producted_cates
 */
class ProductCates extends Model
{
    //修改默认表名
    public $table='product_cates';
    //一对多，分类和商品的关系
    public function product()
    {
        return $this->hasMany('App\Model\Product','type_id');
    }
}

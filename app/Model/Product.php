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
}

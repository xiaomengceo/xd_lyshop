<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArticleInfos extends Model
{
     //设置默认操作的表名
    public $table = 'articles';
    //设置日期字段保存格式
   // protected $dateFormat = 'U';
   // public $timestamps = false; //不验证时间
}

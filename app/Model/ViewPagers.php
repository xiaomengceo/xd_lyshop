<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\ViewpCates;
class ViewPagers extends Model
{
     //设置默认操作的表名
    public $table = 'view_pagers';
    //设置日期字段保存格式
    //protected $dateFormat = 'U';
    //public $timestamps = false; //不验证时间
    
    public function getType(){
    	 // 配置 属于 关系
    	 return $this->belongsTo('App\Models\ViewpCates','viewp_cates','id','cate_id');
    }
}

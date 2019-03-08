<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //修改表名
    public $table='admin';
    //修改时间字段验证，不验证时间
    public $timestamps = false; 
    //修改默认主键
    //public $primaryKey = 'username';
    //多对多
    public function group()
    {
        return $this->belongsToMany('App\Model\AuthGroup','group_rule','uid','group_id');
        //参数解释： 1、关联模型 2、中间表表名、3、当前模型对应的表在中间表的外键
        //4、关联模型在中间表里的外键
    }
    //一对多
    public function rule(){
        return $this->hasMany('App\Model\GroupRule','uid');
    }
     
}

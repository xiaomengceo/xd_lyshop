<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
/**
 * 权限组（角色表对应的模型）
 */
class AuthGroup extends Model
{
    //修改默认表名
    public $table="auth_group";
    //多对多模型关联
    public function admin()
    {
        return $this->belongsToMany('App\Model\Admin','group_rule','group_id','uid');
        //参数解释： 1、关联模型 2、中间表表名、3、当前模型对应的表在中间表的外键
        //4、关联模型在中间表里的外键
    }
    //一对多,关联角色组与成员关系的表
    public function group_rule()
    {
        return $this->hasMany('App\Model\GroupRule','group_id');
    }

}

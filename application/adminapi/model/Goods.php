<?php

namespace app\adminapi\model;

use think\Model;

class Goods extends Model
{
    //定义与分类的关联 一个商品属于一个分类
    public function category()
    {
        return $this->belongsTo('Category','cate_id','id')->bind('cate_name');
    }
    //定义与品牌的关联 一个商品属于一个品牌
    public function brand()
    {
        return $this->belongsTo('Brand','brand_id','id')->bind(['brand_name'=>'name']);
    }
    //定义与模型的关联 一个商品属于一个模型
    public function type()
    {
        return $this->belongsTo('Type','type_id','id')->bind('type_name');
    }
}

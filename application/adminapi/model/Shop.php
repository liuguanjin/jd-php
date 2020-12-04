<?php

namespace app\adminapi\model;

use think\Model;

class Shop extends Model
{
    //
    public function goods()
    {
        return $this->hasMany('Goods','shop_id','id');
    }
}

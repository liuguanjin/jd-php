<?php

namespace app\homeapi\controller;

use think\Controller;

class Category extends BaseApi
{
    //获取一级 二级 三级分类
    public function read($id="")
    {
        $category = \app\adminapi\model\Category::where('pid',$id)->select();
        if (empty($category)){
            $this->fail('id违法');
        }
        $this->ok($category);
    }
}

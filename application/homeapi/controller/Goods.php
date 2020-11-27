<?php

namespace app\homeapi\controller;

use think\Controller;

class Goods extends BaseApi
{
    public function index()
    {
        $params = input();
        $where = [];
        if (!empty($params['keyword'])){
            $where['goods_name'] = ['like',"%{$params['keyword']}%"];
        }
        if (empty($params['page'])){
            $params['page'] = 1;
        }
        $goods = \app\adminapi\model\Goods::where($where)->field('id,goods_name,goods_price,goods_number,goods_logo')->limit(10*($params['page']-1),10)->select();
        if (empty($goods)){
            $this->fail('服务器异常，获取商品列表失败');
        }
        $this->ok($goods);
    }
    public function detail($id = "")
    {
        $goods = \app\adminapi\model\Goods::with('goods_images,spec_goods,brand_row')->find($id);
        if (empty($goods)){
            $this->fail('服务器异常，商品已不存在');
        }
        $goods['brand'] = $goods['brand_row'];
        unset($goods['brand_row']);
        $type = \app\adminapi\model\Type::with('specs,specs.spec_values,attrs')->find($goods['type_id']);
        $goods['type'] = $type;
        $this->ok($goods);
    }
}

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
        $goods = \app\adminapi\model\Goods::with('shop')->where($where)->limit(10*($params['page']-1),10)->select();
        if (empty($goods)){
            $this->fail('服务器异常，获取商品列表失败');
        }
        $this->ok($goods);
    }
    public function detail($id = "")
    {
        $goods = \app\adminapi\model\Goods::with('goods_images,spec_goods,brand_row,shop')->find($id);
        if (empty($goods)){
            $this->fail('服务器异常，商品已不存在');
        }
        $goods['brand'] = $goods['brand_row'];
        unset($goods['brand_row']);
        $type = \app\adminapi\model\Type::with('specs,specs.spec_values,attrs')->find($goods['type_id']);
        $goods['type'] = $type;
        $this->ok($goods);
    }
    public function balanceGoods()
    {
        $params = input();
        unset($params['/balancegoods']);
        $goods = [];
        foreach ($params as $k=>$v){
            $goods[$k]['goods'] = \app\adminapi\model\Goods::with('shop')->find($v['goods_id']);
            $goods[$k]['spec_goods'] = \app\adminapi\model\SpecGoods::find($v['spec_goods_id']);
        }
        $this->ok($goods);
    }
}

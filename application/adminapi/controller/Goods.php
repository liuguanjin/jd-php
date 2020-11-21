<?php

namespace app\adminapi\controller;

use think\Controller;
use think\Request;

class Goods extends BaseApi
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //获取商品列表
        $params = input();
        $where = [];
        if (!empty($params['keyword'])){
            $where['goods_name'] = ['like',"%{$params['keyword']}%"];
        }
        $list = \app\adminapi\model\Goods::with('category,brand,type')
            ->where($where)
            ->order('id asc')
            ->paginate(10);
        $this->ok($list);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //添加商品
        $params = input();
        $validate = $this->validate($params,[
            'goods_name|商品名称' => 'require',
            'goods_price|商品价格' => 'require',
            'goods_logo|商品logo' => 'require',
            'market_price|市场价' => 'require',
            'cost_price|成本价' => 'require',
            'goods_number|商品库存' => 'require',
            'cate_id|所属分类' => 'require|number',
            'brand_id|所属品牌' => 'require|number',
            'type_id|所属模型' => 'require|number',
        ]);
        if ($validate !== true){
            $this->fail($validate);
        }
        
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}

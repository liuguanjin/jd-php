<?php

namespace app\adminapi\controller;

use think\Controller;
use think\Request;

class Type extends BaseApi
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //获取模型列表
        $params = input();
        $where = [];
        if (!empty($params['keyword'])){
            $where['type_name'] = ['like',"%{$params['keyword']}%"];
        }
        $list = \app\adminapi\model\Type::where($where)->select();
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
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //模型详情
        $list = \app\adminapi\model\Type::with('specs,specs.spec_values,attrs')->find($id);
        $this->ok($list);
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
        //修改模型
        $params = input();
        $validate = $this->validate($params,[
            'type_name|模型名称' => 'require',
            'spec|规格数组' => 'require|array',
            'attr|属性数组' => 'require|array',
        ]);
        if ($validate !== true){
            $this->fail($validate);
        }
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

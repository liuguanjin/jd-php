<?php

namespace app\adminapi\controller;

use think\Controller;

class Upload extends BaseApi
{
    public function logo()
    {
        $type = input('type');
        if (empty($type)){
            $this->fail('缺少type参数');
        }
        $file = request()->file('logo');
        if (empty($file)){
            $this->fail('必须上传文件');
        }
        $info = $file->validate(['size'=>1024*1024*10,'ext'=>'jpg,jpeg,png,gif'])->move(ROOT_PATH.'public'.DS.'uploads'.DS.$type);
        if ($info){
           $logo = DS.'uploads'.DS.$type.DS.$info->getSaveName();
           $this->ok($logo);
        }else{
            $msg = $file->getError();
            $this->fail($msg);
        }
    }
}

<?php

namespace app\homeapi\controller;

use think\Controller;

class Upload extends BaseApi
{
    public function images()
    {
        $type = input('type');
        $files = request()->file('images');
        if (empty($files)){
            $this->fail('还未上传文件或文件上传失败');
        }
        $data = ['success' => [],'error' => []];
        foreach ($files as $file){
            $dir = ROOT_PATH . 'public' . DS . 'uploads' . DS . $type;
            if (!is_dir($dir)){
                mkdir($dir);
            }
            $info = $file->validate(['size' => 10*1024*1024,'ext'=>'jpg,jpeg,png,gif'])->move($dir);
            if ($info){
                $path = DS.'uploads' . DS . $type .DS . $info->getSaveName();
                $data['success'][] = $path;
            }else{
                $data['error'][] = [
                    'name' => $file->getInfo('name'),
                    'msg' => $file->getError()
                ];
            }
        }
        $this->ok($data);
    }
}

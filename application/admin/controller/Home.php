<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Home extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {

        $token = session('admin.token');
        #var_dump(session('admin'));
        $this->assign('token',$token);
        return view();
    }

    public function logout()
    {
        session(null);
        $this->success('退出成功','/admin/index/login');
    }

    public function profile()
    {
        return view();
    }

    public function upload()
    {
        $files = request()->file('file');
        #var_dump($file);
        foreach($files as $file){
            $info = $file->validate(['ext'=>'jpg,png,gif'])->move('uploads/');
            if($info){
                echo $info->getSaveName();
                $this->success('上传成功','/admin/home/profile',1000);
            }else{
                echo $file->getError();
                $this->error($file->getError());
            }
        }
    }

    public function generateToken($length=20){
        $letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $randomStr= substr(str_shuffle($letters),0,$length);
        return md5($randomStr);
    }
}

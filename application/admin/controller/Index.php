<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Index extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    //重复登陆验证
    public function initialize()
    {
        if(session('?admin.id')){
            $this->redirect('/admin/home/index');
        }
    }
    public function login()
    {
        //
        if(request()->isAjax()){
            $data = [
                'username'=>input('username'),
                'password'=>md5(input('password'))
            ];
//            var_dump($data);
            $result = model('Admin')->login($data);
            if($result == 1){
                //return json(["code"=>"1","msg"=>"登陆成功"]);
                $this->success('登陆成功,立即跳转','/admin/home/index');
            }else{
                $this->error($result);
            }
        }

        return view();

    }

}

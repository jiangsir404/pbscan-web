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
        $this->success('退出成功','/admin/index/login','','1');
    }

    public function profile()
    {
        return view();
    }

    public function token(){
        return view();
    }

}

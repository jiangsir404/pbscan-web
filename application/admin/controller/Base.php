<?php

namespace app\admin\controller;

use think\Controller;

class Base extends Controller
{
    public function initialize()
    {
        if(!session('?admin.id')){
            $this->redirect('/admin/index/login');
        }
    }
}

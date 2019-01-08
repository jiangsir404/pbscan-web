<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Test extends Controller
{
    public function test(){
        $data = ['id'=>4];
        $result = db('admin')->delete($data);
        var_dump($result);
    }
}
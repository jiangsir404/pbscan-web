<?php

namespace app\admin\controller;

use think\Controller;

class Tool extends Base
{
    //显示
    public function index(){
        $result = db('Tools')->order('id','asc')->paginate(10);
        $this->assign('tools',$result);
        return view();
    }

}

<?php

namespace app\admin\controller;

use think\Controller;

class Result extends Base
{
    //显示
    public function index(){
        $result = db('results')->order('id','asc')->paginate(20);
        $this->assign('results',$result);
        return view();
    }

    public function history(){
        $requests = db('requests')->order('id','asc')->paginate(20);
        $this->assign('requests',$requests);
        return view();
    }

    public function issue(){
        $rid = input('get.rid');
        $token = session('admin.token');
        $result = db('issues')->where(['rid'=>$rid,'token'=>$token])->select();
        return json(json_encode($result));
    }

    public function delete(){
        $rid = input('get.rid');
        $token = session('admin.token');
        db('results')->where(['rid'=>$rid,'token'=>$token])->delete();
        db('issues')->where(['rid'=>$rid,'token'=>$token])->delete();
        db('requests')->where(['rid'=>$rid,'token'=>$token])->delete();
        $this->redirect('/admin/result/index');
    }

}

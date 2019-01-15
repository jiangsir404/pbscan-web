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
        $this->assign('scan_count',$this->getScanCount());
        $this->assign('result_count',$this->getResultCount());
        $this->assign('token',$token);
        return view();
    }

    //统计scan_burp=0 正在扫描的数目
    private function getScanCount(){
        $where['token'] = session('admin.token');
        $where['scan_burp'] = 0; #0表示正在扫描，1表示扫描完成。
        $scan_count = db('requests')->where($where)->order('id','asc')->count();
        return $scan_count;
    }

    //统计hide=0(不隐藏),issues_num>0 的记录数目
    private function getResultCount(){
        $where['token'] = session('admin.token');
        $where['hide'] = 0;
        $result_count = db('results')->where($where)->where('issues_num','GT',0)->order('id','asc')->count();
        return $result_count;
    }

    public function logout()
    {
        session(null);
        $this->success('退出成功','/admin/index/login','','1');
    }


}

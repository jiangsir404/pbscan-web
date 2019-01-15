<?php

namespace app\admin\controller;

use think\Controller;

class Result extends Base
{
    /*
     * 显示漏洞列表。
     */
    public function index(){
        $condition = input('');
        if(isset($condition)){
            $condition['hide'] = input('hide') ? input('hide') : 0;
            unset($condition['page']); #去掉分页参数，分页参数是传给paginate()的。
            $where = $condition;
            $where['token'] = session('admin.token');
        }else{
            $where['hide'] = 0;
            $where['token'] = session('admin.token');
        }
        $result = db('results')->where($where)->where('issues_num','GT',0)->order('id','asc')->paginate(20);

        //获取issuesList High红色，Meidum:黄色 Low: 蓝色 Information: 绿色
        $new_result = [];
        foreach($result as $key=>$value){
            $issueList = db('issues')->where(['token'=>session('admin.token'),'rid'=>$value['rid']])->field(['issueSeverity','count(*)'])->group('issueSeverity')->select();
            #var_dump($issueList);
            $data = '';
            foreach($issueList as $issue){
                if($issue['issueSeverity'] == 'High') {
                    $Severity = '<span class="label label-danger">'.$issue['count(*)'].'</span>'; //红色
                }else if($issue['issueSeverity'] == 'Medium') {
                    $Severity = '<span class="label label-warning">'.$issue['count(*)'].'</span>';  //黄色
                }else if($issue['issueSeverity'] == 'Low') {
                    $Severity = '<span class="label label-primary">'.$issue['count(*)'].'</span>';  #蓝色
                }else if($issue['issueSeverity'] == 'Information') {
                    $Severity = '<span class="label label-success">'.$issue['count(*)'].'</span>';  #绿色
                }

                $data .= $Severity.' ';
            }
            $value['issueList'] = $data;
            $result[$key] = $value;
            #var_dump($value['issueList']);
        }
        //获取正在扫描的链接数量

        $this->assign('scan_count',$this->getScanCount());
        $this->assign('result_count',$this->getResultCount());
        $this->assign('results',$result);
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

    public function history(){
        $where['token'] = session('admin.token');
        $requests = db('requests')->where($where)->order('id','asc')->paginate(20);
        $scan_count = $this->getScanCount();
        $this->assign('requests',$requests);
        $this->assign('scan_count',$this->getScanCount());
        $this->assign('result_count',$this->getResultCount());
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

    public function hide(){
        $rid = input('get.rid');
        $token = session('admin.token');
        db('results')->where(['rid'=>$rid,'token'=>$token])->update(['hide'=>1]);
        $this->redirect('/admin/result/index');
    }

    public function hideall(){
        $token = session('admin.token');
        db('results')->where(['token'=>$token])->update(['hide'=>1]);
        $this->redirect('/admin/result/index');
    }

}

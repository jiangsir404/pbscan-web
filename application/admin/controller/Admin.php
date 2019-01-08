<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Admin extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
//        var_dump($_SESSION);
        //显示管理员
        $admins = model('Admin')->order('id','asc')->paginate(10);
        //var_dump($admins);
        $this->assign('admins',$admins);
        return view('adminlist');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function add()
    {
        //添加管理员
        if(request()->isAjax()){
            $data = [
                'token' => input('post.token'),
                'username'=>input('post.username'),
                'password'=>md5(input('post.password')),
                'email'=>input('post.email'),
                'status'=>input('post.status')
            ];
        //var_dump($data);
        $result = model('Admin')->add($data);
        if($result == 1){
            $this->success('添加成功','/admin/admin/index');
        }else{
            $this->error($result);
        }
        }
        return view('adminadd');
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete()
    {
        //删除管理员
        $data = [
            'id'=>input('post.id')
        ];
        $result = model('Admin')->where($data)->delete();
        if($result){
            $this->success('删除成功',url('admin/admin/index'));
        }else{
            $this->error($result);
        }
    }

    public function adminstatus(){
        if(request()->isAjax()){
            $id = input('post.id');
            $status = input('post.status') ? 0:1;
            $result = model('Admin')->find(['id'=>$id]);
            if($result){
                $res = model('Admin')->isUpdate(true)->save(['status'=>$status,'id'=>$id]);
                if($res){
                    $this->success('操作成功',url('admin/admin/index'));
                }else{
                    $this->error($res);
                }
            }
        }
    }
}

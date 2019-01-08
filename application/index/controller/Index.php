<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Log;
//use think\Cache;
class Index extends Controller
{
    public function index()
    {
        $file = new \think\template\driver\file();
        $file->write('1.php','xx');
        var_dump($file);
        $options = [
            'type'=>'File', // 缓存类型为File
            'expire'=>0, // 缓存有效期为永久有效
            'length'=>3, // 缓存队列长度
        ];
        cache($options);
        // 设置缓存数据
        cache('name', 'xxx', 3600);
// 获取缓存数据
        var_dump(cache('name'));
        $result = model('Tools')->order('id','asc')->paginate(9);
        $this->assign('tools_list',$result);
        return $this->fetch();
    }

    public function challenges()
    {
        $result = model('Challenges')->order('id','asc')->paginate(9);
        $this->assign('challenges',$result);
        return view();
    }

    public function card()
    {
        $data['id'] = input('get.id');
        $challenge = model('Challenges')->where($data)->find();
        $this->assign('challenge',$challenge);
        return view();

    }

    public function hello()
    {
        $user = input('user');
        $this->assign($user);
        F('user',$user);
        return view();
    }
}

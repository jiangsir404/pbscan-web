<?php
/**
 * Created by PhpStorm.
 * User: lj
 * Date: 2018/11/24
 * Time: 18:40
 */

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Admin extends Model{
    use SoftDelete; //软删除
    public function login($data){
        $validate = new \app\common\validate\Admin();
        if(!$validate->scene('login')->check($data)){
            return $validate->getError();
        }
        //var_dump($data);
        $result = $this->where($data)->find();
        if($result){
            $sessionData = [
                'id'=>$result['id'],
                'username'=>$result['username'],
                'token'=>$result['token']
            ]; //设置session值。数组可以直接用[]表示了。
            session('admin',$sessionData);
            return 1;
        }else{
            return '用户名或密码错误';
        }
    }

    public function add($data){
        $validate =new \app\common\validate\Admin();
        if(!$validate->scene('add')->check($data)){
            return $validate->getError();
        }else{
            $this->save($data);
            return 1;
        }
    }
}
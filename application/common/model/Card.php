<?php
/**
 * Created by PhpStorm.
 * User: lj
 * Date: 2018/11/25
 * Time: 20:25
 */

namespace app\common\model;
use think\Model;

class Tools Extends Model
{
    public function index(){

    }

    public function add($data){
        $validate = new \app\common\validate\Tools();
        if(!$validate->scene('add')->check($data)){
            return $this->getError();
        }else{
            $this->save($data);
            return 1;
        }
    }
}
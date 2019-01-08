<?php
/**
 * Created by PhpStorm.
 * User: lj
 * Date: 2018/11/25
 * Time: 20:48
 */

namespace app\common\validate;

use think\Validate;
class Tools extends  Validate
{
    protected $rule = [
        'title'=>'require',
        'tag'=>'require',
        'update_time'=>'require',
        'category'=>'require',
        'content'=>'require',
        'link'=>'require'
    ];

    public function sceneAdd(){
        return $this->only(['title','tag','update_time','category','content','link']);
    }
}
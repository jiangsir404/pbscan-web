<?php
/**
 * Created by PhpStorm.
 * User: lj
 * Date: 2018/11/24
 * Time: 19:58
 */
namespace app\common\validate;

use think\Validate;
class Admin extends  Validate
{
    protected $rule = [
        'token|用户token'=>'require',
        'username|管理员账户'=>'require',
        'password|密码'=>'require',
        'email|邮箱'=>'email|unique:admin'
    ];

    public function sceneLogin()
    {
        return $this->only(['username','password']);
    }

    public function sceneAdd()
    {
        return $this->only(['username','password','email'])->append('username','unique:admin');
    }

}
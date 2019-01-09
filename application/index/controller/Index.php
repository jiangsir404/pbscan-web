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
        $this->redirect('/admin/home/index');
    }


}

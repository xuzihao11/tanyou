<?php
namespace app\controller;
use app\model\admin_info;
use app\model\consumer_info;
use think\facade\View;

class register
{
    private int $type;
    public function index($data)
    {
//        $register = new login_register/register;
        $reg  = new consumer_info();
        $reg->save($data);
    }
}
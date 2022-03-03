<?php
namespace app\controller;
use app\model\admin_info;
use app\model\consumer_info;
use think\exception\ValidateException;
use think\facade\View;
use think\facade\Request;

class register
{
    public function index()
    {
//        $register = new login_register/register;

        $data = Request::post();
        unset($data['register-submit']);
        try {
            $validate = new \app\controller\verify\User();
            $res      = $validate->scene('register')->check($data);

            if(!$res){
                return $validate->getError();
            }
        }catch (ValidateException $err){
            dump($err->getError());
        }

        $reg  = new consumer_info();
        $res  = $reg->save($data);
        if($res){
            return "注册成功";
        }

    }
}
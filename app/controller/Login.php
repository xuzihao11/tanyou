<?php
namespace app\controller;
use app\model\admin_info;
use app\model\consumer_info;
use think\contract\Jsonable;
use think\exception\ValidateException;
use think\facade\Session;
use think\response\Json;
use think\Validate;
use app\controller\verify\User;

class login
{
    public function __construct()
    {
    }
    public function index(){

        $cUser_name = (request()->param('User_name'));
        $cPwd       = (request()->param('Pwd'));

        try {
            $validate = new \app\controller\verify\User();
            $res  =$validate->scene('login')->check(['cUser_name' => $cUser_name,'cPwd' => $cPwd]);
            if (!$res){
                return $validate->getError();
            }
        }catch(ValidateException $err){
            dump($err->getError());
        }

        $query = consumer_info::where(['cUser_name'=>$cUser_name,'cPwd'=>$cPwd])
            ->column('cUID');

        if(empty($query)){
            return "您输入的用户名或密码错误!";
        }
        if (Session::has($cUser_name)){
            return "您已经登陆了哦";
        }
        Session::set($cUser_name, $cUser_name);
        Session::set('cUID', $query[0]);

        return "登录成功！";


        //todo  加载页面
    }
}
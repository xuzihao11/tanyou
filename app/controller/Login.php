<?php
namespace app\controller;
use app\model\admin_info;
use app\model\consumer_info;
use think\contract\Jsonable;
use think\facade\Session;
use think\response\Json;

class login
{
    public function __construct()
    {
    }
    public function index(){
        echo  Session::get('User_name');

        if (Session::has('User_name')){
            return "您已经登陆了哦";
        }
        $cUser_name = (request()->param('User_name'));
        $cPwd       = (request()->param('Pwd'));

        Session::set('User_name', $cUser_name);
        Session::set('Pwd', $cPwd);

        $query = consumer_info::where(['cUser_name'=>$cUser_name,'cPwd'=>$cPwd])
            ->find();
        if(empty($query)){
            return "您输入的用户名或密码错误!";
        }

        return "登录成功！";


        //todo  加载页面
    }
}
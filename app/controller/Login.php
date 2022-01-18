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

        if (Session::has('cUID')){
            return "您已经登陆了哦";
        }
        $cUser_name = (request()->param('User_name'));
        $cPwd       = (request()->param('Pwd'));

        $query = consumer_info::where(['cUser_name'=>$cUser_name,'cPwd'=>$cPwd])
            ->column('cUID');

        if(empty($query)){
            return "您输入的用户名或密码错误!";
        }
        Session::set('User_name', $cUser_name);
        Session::set('cUID', $query[0]);

        return "登录成功！";


        //todo  加载页面
    }
}
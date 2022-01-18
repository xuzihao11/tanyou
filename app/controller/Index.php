<?php
namespace app\controller;

use app\model\consumer_info;
use think\facade\View;
use think\Request;
use app\BaseController;

class Index extends BaseController
{

    public function index()
    {
//        $consumer = new consumer_info();
//        $consumer->cUID = 1;
//        $consumer->cPwd = 'root';
//        $consumer->cName = 'root';
//        $consumer->cBirth = date('Y-m-d',time());
//        $consumer->cSex = '男';
//        $consumer->cTel = '15623632510';
//        $consumer->cPhoto = '';
//        $consumer->cUser_name = 'haogg';
//        $consumer->cPhoto = '15623632510';
//        $consumer->cID = '1';
//        $consumer->save();
        return View::fetch('/login_register/login');
    }

    public function login()
    {
        return View::fetch('/login_register/login');

/*        $cUser_name = (request()->param('cUser_name'));
        $cPwd       = (request()->param('cPwd'));
        $new_con    = new login_register\login();
        $data       = $new_con->login($cUser_name,$cPwd);

        return $data;*/
    }

    public function register()
    {
        return View::fetch('/login_register/register');
    }
}

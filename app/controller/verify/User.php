<?php
namespace app\controller\verify;
use think\Validate;

class User extends Validate
{
    protected $rule = [
        'User_name' => 'require|max:30',
        'Pwd'       => 'require|max:20'
    ];
    protected $message = [
        'User_name.require' => '用户名必须',
        'User_name.max' => '用户名不能超过30个字符',
        'Pwd.require' => '密码必须',
        'Pwd.max' => '密码最大长度为20',
    ];

}
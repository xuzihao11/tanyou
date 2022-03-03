<?php
namespace app\controller\verify;
use think\Validate;

class User extends Validate
{
    protected $rule = [
        'cUser_name' => 'require|alphaNum|max:30',
        'cPwd'       => 'require|max:20',
        'cName'      => 'require|chsAlpha|max:20',
        'cBirth'     => 'require|date',
        'cSex'       => 'require|/^(男|女)$/i',
        'cTel'       => 'require|mobile',
        'cPhoto'     => 'require|image',
        'cID'        => 'require|idCard',
    ];

    protected $message = [
        'cUser_name.require'  => '用户名必须',
        'cUser_name.chsAlpha' => '用户名非法',
        'cUser_name.max'=> '用户名不能超过30个字符',

        'cPwd.require'  => '密码必须',
        'cPwd.max'      => '密码最大长度为20',

        'cName.require' => '请输入姓名',
        'cName.chsAlpha'=> '姓名非法哦',
        'cName.max'     => '姓名长度非法',

        'cBirth.require'=> '请输入您的生日哦',
        'cBirth.date'   => '生日非法',

        'cSex.require'  => '性别必须',
        'cSex.regex'    => '性别非法',

        'cTel.require'  =>  '请输入您的手机号',
        'cTel.mobile'   =>  '请输入正确的手机号',

        'cPhoto.require'=>  '请上传您的照片哦',
        'cPhoto.image'  =>  '格式错误',

        'cID.require'   =>  '请输入您的身份证号',
        'cID.idCard'    =>  '请输入正确的身份证号',
    ];

    protected $scene = [
        'login'  =>  ['cUser_name','cPwd'],
        'register' => [
            'cUser_name','cPwd', 'cName',
            'cBirth' ,'cSex','cTel',],
    ];

}
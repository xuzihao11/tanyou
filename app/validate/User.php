<?php
declare (strict_types = 1);

namespace app\validate;

use think\Validate;

class User extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */

    //场景验证
    //动态验证属性
    protected $scene = [
        'check'      =>      ['name','price','email'],
        'update'     =>      ['email'],
        'route'      =>      ['id']
    ];
    //使用remove移除多个字段时，不能使用remove()->remove()
    protected function sceneEdit(){
        $edit = $this->only(['name','price'])
            ->remove('name','max|require')
            ->append('price','require');
        return $edit;
    }
    protected $rule = [
        //field | title
        'name|用户名'      =>      'require|max:20|checkName:徐自豪',
        'price'     =>      'number|between:1,100',
        'email'     =>      'email',
        'id'        =>      'number|between:1,10'
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [
        //'name.require'    =>      '姓名不得为空',
        'price.number'      =>      '价格必须是数字',
        'price.require'     =>      '价格不能为空',
        'name.max'          =>      '姓名不能大于20位',
        'email'             =>      '邮箱格式不正确',
        'id.number'         =>      'id必须是数字',
        'id.max'            =>      'id在1-10之间'
    ];

    //自定义规则
    public function checkName($value,$rule,$data,$field,$title){
        dump($data);
        dump($field);
        dump($title);
        return $rule != $value? true: '非法姓名';
    }




}

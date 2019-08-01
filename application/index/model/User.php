<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19-8-1
 * Time: 上午10:18
 */

namespace app\index\Model;

use think\Model;

class User extends Model
{
    public function addUser($username,$password,$sex,$name,$telephone)
    {
        $para = array(
            'username'=>$this->checkPara($username),
            'password'=>$this->checkPara($password),
            'sex'=>$this->checkPara($sex),
            'name'=>$this->checkPara($name),
            'telephone'=>$this->checkPara($telephone)
        );
        return db('user')->insertGetId($para);
    }

    public function modifyUser($id)
    {

    }

    public function noUseUser($id)
    {

    }

    public function findUserById($id)
    {
        return db('user')->where('id',$id)->find();
    }

    public function findUserByUsername($username)
    {
        return db('user')->where('username',$username)->find();
    }

    public function checkPara($val)
    {
        $name = $this->get_variable_name($val);
        $val = trim($val);
        switch ($name)
        {
            case 'username' :
                break;
            case 'password' :
                $val = md5($val);
                break;
            case 'sex' :
                if($val != 0 || $val != 1)
                {
                    $val = 'para error';
                }
                break;
            case 'name':
                break;
            case 'telephone' :
                break;
        }
        return $val;
    }

    public function get_variable_name(&$var, $scope=null){

        $scope = $scope==null? $GLOBALS : $scope; // 如果没有范围则在globals中找寻

        // 因有可能有相同值的变量,因此先将当前变量的值保存到一个临时变量中,然后再对原变量赋唯一值,以便查找出变量的名称,找到名字后,将临时变量的值重新赋值到原变量
        $tmp = $var;

        $var = 'tmp_value_'.mt_rand();
        $name = array_search($var, $scope, true); // 根据值查找变量名称

        $var = $tmp;
        return $name;
    }
}
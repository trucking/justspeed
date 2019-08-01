<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19-8-1
 * Time: ����10:18
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

        $scope = $scope==null? $GLOBALS : $scope; // ���û�з�Χ����globals����Ѱ

        // ���п�������ֵͬ�ı���,����Ƚ���ǰ������ֵ���浽һ����ʱ������,Ȼ���ٶ�ԭ������Ψһֵ,�Ա���ҳ�����������,�ҵ����ֺ�,����ʱ������ֵ���¸�ֵ��ԭ����
        $tmp = $var;

        $var = 'tmp_value_'.mt_rand();
        $name = array_search($var, $scope, true); // ����ֵ���ұ�������

        $var = $tmp;
        return $name;
    }
}
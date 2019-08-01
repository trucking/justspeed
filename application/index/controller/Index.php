<?php
namespace app\index\controller;

use app\index\Model\User;
use \think\Controller;
class Index
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        return view('login');
    }

    public function checkLogin()
    {
        $user = new User;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $username = $user->checkPara($username);
        $password = $user->checkPara($password);
        $result = $user->findUserByUsername($username);
        if($password == $result['password'] && $result['isallowlogin'] == 1)
        {
            return true;
        }else
        {
            return false;
        }
    }
}

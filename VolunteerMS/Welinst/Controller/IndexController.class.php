<?php
namespace Welinst\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $info = session("wel_user");
        if (!$info) {
            $this->error("请登录", U('User/login'));
        }
        $this->assign("info", $info[0]);
        $this->display();
    }


    public function welcome(){
        echo "欢迎来到福利机构后台！";
    }
}
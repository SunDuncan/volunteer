<?php
namespace Welinst\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index_houtai()
    {
        $this->display();
    }


    public function welcome(){
        echo "欢迎来到福利机构后台！";
    }
}
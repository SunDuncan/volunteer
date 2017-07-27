<?php
    namespace Welfare\Controller;
    use Think\Controller;

    class IndexController extends Controller {
        public function index(){
            $this->display();
        }

        public function welcome(){
            echo "欢迎来到福利机构后台！！！！！";
        }
    }
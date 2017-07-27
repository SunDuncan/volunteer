<?php
    namespace Welinst\Controller;
    use Model\MessageModel;
    use Model\WelinstModel;
    use Think\Controller;

    class WelfareController extends Controller {

        public function test_input($x)
        {
            $x = trim($x);
            $x = stripslashes($x);
            $x = htmlspecialchars($x);
            return $x;
        }

        public function showlist() {
            $this->display();


        }

        public function index() {

        }

        public function applist() {
            $this->display();
        }

        public function appEnterpriseList() {
            $this->display();
        }

        public function add()
        {

            if(!isset($_SESSION['username'])){
                $this->error("请先登录",U('User/login'));
            } else{
              $username =session('username');
               $userl= new WelinstModel();
              $data['W_id'] = $userl->checkLogin($username);
            }


            if (empty($_POST)) {
               $this->display();
            } else {
                if (empty($_POST['title'])) {
                    $this->error("请输入通知消息简介");
                    return;
                }
                $data['title'] = $this->test_input($_POST['title']);

                if (empty($_POST['content'])) {
                    $this->error("通知的内容");
                    return;
                }
                $data['content'] = $this->test_input($_POST['content']);

                $data['createtime'] = time();

               $user= new MessageModel();
                $res = $user->addMessage($data);


                if (!$res) {
                    echo "消息发布失败";
                } else {
                    $this->success("消息发布成功", U('Welfare/showlist'));
                }
            }

        }
    }
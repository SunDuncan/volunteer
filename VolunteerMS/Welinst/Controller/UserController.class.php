<?php
namespace Welinst\Controller;

use Think\Controller;
use Model\WelinstModel;

class UserController extends Controller
{

    public function test_input($x)
    {
        $x = trim($x);
        $x = stripslashes($x);
        $x = htmlspecialchars($x);
        return $x;
    }

    public function register()
    {

        if (empty($_POST)) {
            $this->display();
        }else{
            if (empty($_FILES)) {
                $this->error("缺少营业执照");
                return;
            }


            /*
             * 实例化上传类
             * */
            $config = array(
                "rootPath"  => "./Public/",
                "savePath" => "upload/license/",
                "maxSize"  => 3145728,
                "exts"     =>  array("jpg", "gif", "png", "jpeg")
            );

            $upload = new \Think\Upload($config);


            $info = $upload->uploadOne($_FILES['license']);
            if (!$info) {
                $this->error($upload->getError());
                return ;
            } else {
                $data['license'] = explode('.', $config['rootPath'])[1] . $info['savepath'] . $info['savename'];
            }


            if (empty($_POST['username'])) {
                $this->error("请输入用户名");
                return ;
            }

            $user = new WelinstModel();

            $res = $user->checkUserUnique($_POST['username']);

            if (!$res){
                $this->error("此用户已存在");
                return ;
            }

            $data['name'] = $this->test_input($_POST['username']);

            if (empty($_POST['password'])) {
                $this->error("请输入密码");
                return ;
            }
            $data['pwd'] = $this->test_input($_POST['password']);
            $code = rand(10000,99999);
            $str = $code . $data['pwd'];
            $password = md5($str);
            $data['password'] = $password;
            $data['code'] = $code;



            if(empty($_POST['confirmpass'])){
                $this->error("请输入确认密码");
                return ;
            }else if ($_POST['confirmpass']!=$_POST['password']){
                $this->error("两次输入的密码不一致");
                return ;
            }



            if (empty($_POST['location'])) {
                $this->error("请输入福利机构地址");
                return ;
            }
            $data['location'] = $this->test_input($_POST['location']);


            if (empty($_POST['master'])) {
                $this->error("请输入机构负责人");
                return ;

            }
            $data['master'] = $this->test_input($_POST['master']);


            $data['create_time'] = time();

            $user = new WelinstModel();

            $info = $user->insertUser($data);



            if (!$info) {
                $this->error("用户名或密码错误");
                return ;
            } else {
//                $sqlUser="select name,password,location,master from mxh_welinst where id =" . $info   ;
//                $userInfo = D()->query($sqlUser);
//                session('EInfo', $userInfo, "welinst");
                $this->success("注册成功", U('User/login'));

            }

        }
    }

    public function logout(){
        session(null);
        $this->redirect('Welinst/User/login');
    }


    public function login()
    {


        if (empty($_POST)) {
            $this->display();
        }else {

            if (empty($_POST['username'])) {
                $this->error("请输入名称");
                return ;

            }
            $data['name'] = $this->test_input($_POST['username']);


            if (empty($_POST['password'])) {
                $this->error("请输入密码");
                return ;
            }

            $data['password'] = $this->test_input($_POST['password']);

            $user = new WelinstModel();

            $res = $user->checkUser($data);

            if (!$res) {
                echo "用户名或密码错误";
            } else {
         
                session(username,$data['name']);
                $this->success("登录成功", U('Index/index'));
            }
        }
    }


}


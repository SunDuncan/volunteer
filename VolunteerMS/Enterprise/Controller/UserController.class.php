<?php
namespace Enterprise\Controller;

use Think\Controller;
use Model\EnterpriseModel;

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

            $user = new EnterpriseModel();

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

            if (empty($_POST['property'])) {
                $this->error("请输入企业属性");
                return ;
            }
            $data['property'] = $this->test_input($_POST['property']);

            if (empty($_POST['location'])) {
                $this->error("请输入企业地址");
                return ;
            }
            $data['location'] = $this->test_input($_POST['location']);


            if (empty($_POST['legal_representative'])) {
                $this->error("请输入企业法人");
                return ;

            }
            $data['legal_representative'] = $this->test_input($_POST['legal_representative']);


            $data['create_time'] = time();

            $user = new EnterpriseModel();

            $info = $user->insertUser($data);

            if (!$info) {
                $this->error("用户名或密码错误");
                return ;
            } else {
            $sqlUser="select name,password,property,location,legal_representative from mxh_enterprise where id =" . $info   ;
            $userInfo = D()->query($sqlUser);
            session('EInfo', $userInfo, "enterprise");
            $this->success("注册成功", U('User/login'));

            }

        }
    }

    public function logout(){
        session(null);
        $this->redirect('Enterprise/User/login');
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

            $user = new EnterpriseModel();

            $res = $user->checkUser($data);

            if (!$res) {
                echo "用户名或密码错误";
            } else {

                $this->success("登录成功", U('Index/index'));
            }
        }
    }


}


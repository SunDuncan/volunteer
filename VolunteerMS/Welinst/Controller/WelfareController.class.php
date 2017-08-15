<?php
    namespace Welinst\Controller;
    use Model\EnterpriseModel;
    use Model\MessageModel;
    use Model\WelinstModel;
    use Welinst\Model\CommentModel;
    use Compoment\PhpExcelController;
    use Think\Controller;

    class WelfareController extends Controller {

        public function test_input($x)
        {
            $x = trim($x);
            $x = stripslashes($x);
            $x = htmlspecialchars($x);
            return $x;
        }


        public function delete(){


                $id = I('get.id');
                
                $sqlid = "id=" . $id;

                $deleteData= new MessageModel();

                $res = $deleteData->where($sqlid)->delete();

                if (!$res) {
                    $this->error("消息删除失败");
                } else {
                    $this->success("消息删除成功", U('Welfare/showlist'));
                }

      
        }
        public function edit(){

            if (empty($_POST)) {
                $id = I("get.id");
                $sql = "select *from mxh_message where id = " . $id;
                $resInfo = D()->query($sql);
                $this->assign("info", $resInfo);
                $this->assign('id', I('get.id'));
                $this->display();
            } else {
                $id = I('get.id');
                if (empty($_POST['articletitle'])) {
                    $this->error("请输入通知消息标题");
                    return;
                }
                $changeData['title'] = $this->test_input($_POST['articletitle']);
                if (empty($_POST['abstract'])) {
                    $this->error("通知的内容");
                    return;
                }
                $changeData['content'] = $this->test_input($_POST['abstract']);
                $changeData['updatetime'] = time();
                $sqlid = "id=" . $id;
                $chageUser= new MessageModel();
                $res = $chageUser->where($sqlid)->save($changeData);

               
                if (!$res) {
                    $this->error("消息修改失败");
                } else {
                    $this->success("消息修改成功");
                }
            }

        }

        public function showlist() {
            $id = session("wel_user")[0]['id'];
            $sqlAll="select * from mxh_message where W_id = " . $id . " and status = 1";
            $messageRs=D()->query($sqlAll);
         //   session('messageRs', $messageRs, "message");
            $this->assign("messageRs",$messageRs);

            $this->display();
        }

        public function index() {

        }

        public function applist() {
            $username =session('username');
            $user=new WelinstModel();
            $welinstId=$user->findId($username);
            $sqlAll="select * from mxh_message where W_id =" . $welinstId . " and status = 1";    //查找对应福利机构id的消息
            $AllRs=D()->query($sqlAll);
            $this->assign("AllRs",$AllRs);
            $this->display();
        }

        public function appenterpriseList() {
                $messageId = I('get.id');     //企业所申请福利机构的id即当前行的id
                $sqlAppIds="select App_ids from mxh_message where id =" . $messageId . " and status = 1";
                $AppIds=D()->query($sqlAppIds);
                $app_ids = explode(',' , $AppIds[0]['app_ids']);
                $user= new EnterpriseModel();
                $res = $user->enterpriseQueryList($app_ids);

                $this->assign("name",$res);
                $this->assign("mess_id", $messageId);
            
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
                    $this->error("消息发布失败");
                } else {
                    $this->success("消息发布成功", U('Welfare/showlist'));
                }
            }

        }

        public function agree() {
            $id = I("get.id");

            $messId = I('get.mess_id');
            $sql = "Update mxh_message set E_id = " . $id . ",status = 2 ,updatetime = ". time() . " where id = " . $messId;

            $res = D()->execute($sql);

            /**
             * 用来插入到评价表中
             */
            $commentModel = new CommentModel();
            $c_res = $commentModel->addComment($messId);
            if (!$c_res) {
                $this->error("失败");
                return ;
            }

            if ($res) {
                $this->success("成功");
                return;
            } else {
                $this->error("不能重复同意");
                return;
            }
        }

        public function end() {
            $id = session("wel_user")[0]['id'];
            $sql1 = "select *from mxh_message where W_id = " . $id . " and status = 2";
            $info = D() -> query($sql1);
            foreach($info as $key => $value) {
                $E_id = $value['e_id'];
                $sql2 = "select *from mxh_enterprise where id = " . $E_id;
                $eInfo = D() -> query($sql2);
                $info[$key]['E_name'] = $eInfo[0]['name'];
            }

            $this->assign("info", $info);
            $this->display();
        }

        /**
         * 已经完成的表
         */
        public function finish() {
            $id = session("wel_user")[0]['id'];
            $commentModel = new CommentModel();
            $info = $commentModel->queryEndComment($id);
            $this->assign("info", $info);
            $this->display();
        }

        /**
         * 导表的功能
         */
        public function export() {
            $id = session("wel_user")[0]['id'];
            $name = session("wel_user")[0]['name'];
            $excel = new PhpExcelController();
            $commentModel = new CommentModel();

            $elxCellData = array(
                array('id', 'ID'),
                array('wel_name', '福利机构的名称'),
                array('ent_name', '企业名称'),
                array('title', '活动简介'),
                array('ac_content', '活动的内容'),
                array('star', '评价的星级'),
                array('co_content', '评价的内容')
            );

            /**
             * 获取评论的列表
             */
            $info = $commentModel->queryEndComment($id);

            $exlData = array();
            foreach($info as $key => $value) {
                $value['id'] = $key + 1;
                array_push($exlData, $value);
            }

            $excel->exportExcel($name. "任务表", $elxCellData, $exlData);
        }

        /**
         * 待评价
         */
        public function evaluate() {

            /**
             * 获取企业已经点了完成，但未评价的表格
             */
            $id = session("wel_user")[0]['id'];
            $commentModel = new CommentModel();
            $info = $commentModel->waitComment($id);
            $this->assign("info", $info);
            $this->display();
        }

        /**
         * 评价的post
         */
        public function evaluate_post() {
            $data = I('post.');
            $updateData['star'] = $data['score'];
            $updateData['content'] = $data['abstract'];
            $updateData['id'] = $data['comment_id'];
            $updateData['status'] = 2;
            $updateData['endtime'] = time();
            $commentModel = new CommentModel();
            $info = $commentModel->commentEnd($updateData);
            if ($info) {
                $this->success("评价成功");
            } else {
                $this->error("评价失败");
            }
            exit;
        }

    }
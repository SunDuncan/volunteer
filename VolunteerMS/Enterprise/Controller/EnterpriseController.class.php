<?php
    namespace Enterprise\Controller;
    use Model\MessageModel;
    use Think\Controller;
    use Model\WelinstModel;
    use Compoment\EnterpriseBaseController;
    use Compoment\PhpExcelController;
    use Enterprise\Model\CommentModel;

    class EnterpriseController extends EnterpriseBaseController {
        public function showlist() {
            if (!$this->checkLogin()) {
                $this->error("请登录再操作");
            }

            $messageModel = new MessageModel();
            $welinstModel = new WelinstModel();
            $info = $messageModel->queryEnterPriseMessage();
            foreach ($info as $key => $value) {
                $welInfo = $welinstModel->findInfo($value['w_id']);
                $info[$key]['welname'] = $welInfo['name'];
            }

            $this->assign("info", $info);
            $this->display();
        }

        public function index() {
            if (!$this->checkLogin()) {
                $this->error("请登录再操作");
            }
        }
        public function servicelist(){
            if (!$this->checkLogin()) {
                $this->error("请登录再操作");
            }

            $messageModel = new MessageModel();
            $welinstModel = new WelinstModel();
            $info = $messageModel->queryEnterPriseMessage();
            $id = session('enter_user')[0]['id'];
            $ids = array();
            foreach ($info as $key => $value) {
                $app_ids = explode(",", $value['app_ids']);
               if (in_array($id, $app_ids)) {
                   array_push($ids, $value['id']);
               }
            }

            $queryInfo = $messageModel->enterpriseServiceList($ids);


            foreach ($queryInfo as $key => $value) {
                $welInfo = $welinstModel->findInfo($value['w_id']);
                $queryInfo[$key]['welname'] = $welInfo['name'];
            }

            $this->assign('info', $queryInfo);
            $this->display();
        }

        public function pendsuccess(){
            if (!$this->checkLogin()) {
                $this->error("请登录再操作");
            }

            $welinstModel = new WelinstModel();
            $messageModel = new MessageModel();
            $id = session('enter_user')[0]['id'];
            $info = $messageModel->enterpriseSuccessList($id);
            foreach ($info as $key => $value) {
                $welInfo = $welinstModel->findInfo($value['w_id']);
                $info[$key]['welname'] = $welInfo['name'];
            }
            $this->assign("info", $info);
            $this->display();
        }

        public function app() {
            if (!$this->checkLogin()) {
                $this->error("请登录再操作");
            }

            $getInfo = I('get.');
            $messageId = $getInfo['mes_id'];
            $entId = $getInfo['ent_id'];
            $messageModel = new MessageModel();
            $info = $messageModel->queryEnterPriseMessageById($messageId);
            $app_ids = $info['app_ids'];
            if (empty($app_ids)) {
                $data['App_ids'] = $entId;
            } else {
                $app_ids = explode(',' , $app_ids);
                if (in_array($entId, $app_ids)) {
                    $this->error("不能重复申请");
                    return ;
                }
                array_push($app_ids, $entId);
                $app_ids = implode(',', $app_ids);
                $data['App_ids'] = $app_ids;
            }

            $data['id'] = $messageId;

            $updateInfo = $messageModel->updateInfo($data);
            if ($updateInfo) {
                $this->success("申请成功");
            } else {
                $this->error("申请失败");
            }
        }

        public function welinfo() {
            $messageId = I("get.id");
            $messageModel = new MessageModel();
            $messageInfo = $messageModel->queryInfo($messageId);
            if ($messageInfo) {
                $data['status'] = 1;
                $data['msg'] = $messageInfo;
            } else {
                $data['status'] = 0;
            }
            $this->ajaxReturn($data);
        }


        /**
         * 导表的功能
         */
        public function export() {
            $id = session("enter_user")[0]['id'];
            $name = session("enter_user")[0]['name'];
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
         * 等待服务的列表
         */
        public function waitservice() {
            $id = session("wel_user")[0]['id'];
            $commentModel = new CommentModel();
            $info = $commentModel->waitComment($id);

            $this->assign("info", $info);
            $this->display();
        }

        /**
         * 完成列表
         */
        public function commentEnd() {
            $id = I('get.id');
            $commentModel = new CommentModel();
            $info = $commentModel->endUpdate($id);

            if ($info) {
                $this->success("成功");
            } else {
                $this->error("失败");
            }
        }
        
    }
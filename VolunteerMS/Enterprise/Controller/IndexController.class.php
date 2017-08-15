<?php
namespace Enterprise\Controller;

use Compoment\EnterpriseBaseController;

class IndexController extends EnterpriseBaseController
{
    public function index()
    {
        if (!$this->checkLogin()) {
            $this->error("请登录再操作", U("user/login"));
        }

        $this->display();
    }

    public function welcome() {
        if (!$this->checkLogin()) {
            $this->error("请登录再操作");
        }

        echo "欢迎来到企业的后台管理界面";
    }
}
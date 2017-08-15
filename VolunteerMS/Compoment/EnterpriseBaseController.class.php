<?php
    namespace Compoment;
    use Think\Controller;

    class EnterpriseBaseController extends Controller {
        public function __construct()
        {
            parent::__construct();
            $enterpriseInfo = session('enter_user');
            $this->assign("enterInfo", $enterpriseInfo[0]);
        }

        public function checkLogin() {
            $userInfo = session('enter_user');
            if ($userInfo) {
                return true;
            }
            return false;
        }


    }
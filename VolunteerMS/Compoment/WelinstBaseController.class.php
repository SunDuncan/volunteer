<?php
namespace Compoment;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: Duncan
 * Date: 2017/7/27
 * Time: 14:54
 */

class WelinstBaseController extends Controller {
    public function __construct()
    {
        parent::__construct();

    }

    public function checkLogin() {
        $userInfo = session('wel_user');
        if ($userInfo) {
            return true;
        }
        return false;
    }
}
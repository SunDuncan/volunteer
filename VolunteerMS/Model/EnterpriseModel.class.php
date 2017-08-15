<?php
namespace Model;
use Think\Model;

class EnterpriseModel extends Model {

    protected $tableName = null;
    protected $user = null;

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "enterprise";
        $this->user = D($this->tableName);
    }

    public function insertUser($info) {

        $rs = $this->user->add($info);
        return $rs;
    }

    public function checkUser($info) {
        $selectInfo = array(
            "name" => $info['name']
        );

        $res = $this->where($selectInfo)->find();

        if ($res == null) {
            return false;
        }

        $code=$res['code'];

        $checkPassword = md5($code.$info['password']);

        if ($res['password'] !=$checkPassword) {
            return false;
        }

        return $res;
        
    }
    public function enterpriseQueryList($info) {
        if (empty($info)) {
            return;
        }

        $map['id'] = array('in', $info);

        $res = $this->user->where($map)->select();
        return $res;
    }

    public function checkUserUnique($info) {
        $selectInfo = array(
            "name" => $info
        );

        $res = $this->where($selectInfo)->find();

        if ($res == null) {
            return true ;
        }


        return false;

    }

}
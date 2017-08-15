<?php
namespace Model;
use Think\Model;

class MessageModel extends Model
{

    protected $tableName = null;
    protected $user = null;

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "message";
        $this->user = D($this->tableName);
    }

    public function addMessage($info)
    {

        if (empty($info)) {
            return ;
        }
        $rs = $this->user->add($info);
        return $rs;
    }


    public function changeMessage($info)
    {
      
        $rs = $this->user->where('id=5')->save();

        return $rs;
    }


    //查询等待申请的通知消息
    public function queryEnterPriseMessage() {
        $queryInfo['status'] = 1;
        return $this->user->where($queryInfo)->select();
    }

    //根据id来获取消息的列表
    public function queryEnterPriseMessageById($id) {
        $queryInfo['status'] = 1;
        $queryInfo['id']  = $id;
        return $this->user->where($queryInfo)->find();
    }

    //根据信息来修改消息
    public function updateInfo($info) {
        if (empty($info)) {
            return ;
        }

        $res = $this->user->save($info);
        return $res;
    }

    //查询企业已经完成列表
    public function enterpriseSuccessList($id) {
        $queryInfo['status'] = 2;
        $queryInfo['E_id'] = $id;
        return $this->user->where($queryInfo)->select();
    }

    //企业的服务列表的查询
    public function enterpriseServiceList($info) {
        if (empty($info)) {
            return;
        }

        $map['id'] = array('in', $info);

        $res = $this->user->where($map)->select();
        return $res;
    }

    public function getApp_ids($welinstid){
        $selectInfo = array(
            "W_id" =>$welinstid
        );
        $res = $this->where($selectInfo)->find();

        return $res['App_ids'];
    }


  

    //通过id来获取值
    public function queryInfo($id) {
        if (empty($id)) {
            return ;
        }

        $queryInfo['id']  = $id;
        return $this->user->where($queryInfo)->find();
    }
}
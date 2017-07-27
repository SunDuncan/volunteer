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

     
        $rs = $this->user->add($info);
        return $rs;
    }
}
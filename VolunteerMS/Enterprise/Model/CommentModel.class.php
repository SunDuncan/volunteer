<?php
namespace Enterprise\Model;

use Think\Model;

class CommentModel extends Model {
    protected $tableName = 'comment';


    /**
     * @param $id 消息的id
     * @return int;
     */
    public function addComment($id) {
        if (empty($id)) {
            return ;
        }

        $insertData = ['message_id' => $id, "createtime" => time()];
        return $this->add($insertData);
    }

    /**
     * 查询已完成的列表
     * @param $id 福利机构的id
     */

    public function queryEndComment($id) {
        if (empty($id)) {
            return ;
        }

        $sql = "select A.star as star , A.content as co_content ,B.content";
        $sql .= " as ac_content,B.title,C.`name` as ent_name,D.name as wel_name ,B.id from mxh_";
        $sql .= "comment A left join mxh_message B on A.message_id = B.id left join mxh";
        $sql .= "_enterprise C on B.E_id=C.id left join mxh_welinst D on B.W_id = D.id where";
        $sql .= " A.status = 2 and B.E_id = " . $id;

        $info = D()->query($sql);
        return $info;
    }


    public function queryEndCommentLimit($id, $limit) {
        if (empty($id)) {
            return ;
        }

        $sql = "select A.star as star , A.content as co_content ,B.content";
        $sql .= " as ac_content,B.title,C.`name` as ent_name,D.name as wel_name ,B.id from mxh_";
        $sql .= "comment A left join mxh_message B on A.message_id = B.id left join mxh";
        $sql .= "_enterprise C on B.E_id=C.id left join mxh_welinst D on B.W_id = D.id where";
        $sql .= " A.status = 2 and B.E_id = " . $id .$limit;

        $info = D()->query($sql);
        return $info;
    }

    /**
     * 待服务列表
     */
    public function waitComment($id) {
        if (empty($id)) {
            return ;
        }

        $sql = "select A.E_id ,A.id as message_id,A.title,A.content,B.id,C.name as w_name from mxh_message A left join mxh_comment B on A.id = B.message_id left join mxh_welinst C on A.W_id = C.id where A.E_id = " . $id . " and A.status = 2" . " and B.status = 0";
        $info = D() -> query($sql);
        return $info;
    }

    public function endUpdate($id) {
        if (empty($id)) {
            return ;
        }

        $data = array(
            'id' => $id,
            'status' => 1
        );
        return D('comment')->save($data);
    }
}
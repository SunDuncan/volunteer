<?php
namespace Home\Controller;
use Think\Controller;
use Compoment\PhpExcelController;
class IndexController extends Controller {
    public function index(){
        $this->display();
    }

    public function test() {

        $excel = new PhpExcelController();
        /**
         * 模拟数据
         */

        $data = array(
            array('id', 'ID'),
            array('Name', '姓名'),
            array('Sex', '性别')
        );

        $databaseDate = array(
            array(
                'id'=> 1,
                'Name' => '孙茂昀',
                'Sex' => '男'
                ),
            array(
                'id' => 2,
                'Name' => '莉莉',
                'Sex' => '女'
            )
        );
        $field = null;
        foreach($data as $key => $value) {
            if ($key == 0) {
                $field = $value[0];
            } else {
                $field .= "," . $value[0];
            }
        }

        $excel->exportExcel("测试导出", $data, $databaseDate);
    }

   
}
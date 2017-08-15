<?php
    /**
     * 用于封装phpexcel的类
     */

    namespace Compoment;

    use Think\Controller;

    class PhpExcelController extends Controller {
        /**
         * 数据导出为.xls格式
         * @param string $filename 导出的文件名
         * @param $expCellName   array -> 数据库字段以及字段的注释
         * @param $expTableData  Model -> 连接的数据库数据
         */
        public function exportExcel($fileName='table', $expCellName,$expTableData) {
            $xlsTitle = iconv('utf-8', 'gb2312', $fileName);//设置文件的名称
            $xlsName = $fileName.date("_Y.m.d_H.i.s");
            $cellNum = count($expCellName);
            $dataNum = count($expTableData);
            ob_end_clean();
            import('Vendor.PHPExcel.PHPExcel');
            import('Vendor.PHPExcel.Writer.Excel5');
            import('Vendor.PHPExcel.IOFactory.php');

            $objPHPExcel = new \PHPExcel();
            $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z', 'AA', 'AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ', 'AR','AS','AT','AU','AV','AW','AX','AY','AZ');

            $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum -1].'1');//合并单元格
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $fileName);
            for ($i=0;$i < $cellNum; ++$i) {
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
            }

            for ($i=0;$i<$dataNum;$i++) {
                for($j=0;$j<$cellNum;$j++) {
                    $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
                }
            }

            header("pragma:public");
            header('"Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'xls');
            header("Content-Disposition:attachment;filename=$xlsName.xls");//attachment新窗口打印，inline本窗口打印
            $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save("php://output");
            exit;
        }
    }
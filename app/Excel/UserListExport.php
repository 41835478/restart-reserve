<?php
/**
 * Created by PhpStorm.
 * User: yechunan
 * Date: 15/11/24
 * Time: 16:54
 */

namespace app\Excel;

class UserListExport extends \Maatwebsite\Excel\Files\NewExcelFile {

    public function getFilename()
    {
        return '锐思达会员数据';
    }
}
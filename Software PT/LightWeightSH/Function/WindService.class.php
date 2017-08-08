<?php
require_once 'SqlHelper.class.php';
require_once 'Wind.class.php';

class WindService
{
    function GetWind()
    {
        $sql = "select * from wind";
        $sqlHelper = new SqlHelper();
        $arr = $sqlHelper->execute_dql_arr($sql);
        $sqlHelper->close_connect();
        return $arr;
    }
}

?>
<?php
require_once 'SqlHelper.class.php';
require_once 'Light.class.php';

class LightService
{

    function GetLight()
    {
        $sql = "select * from light";
        $sqlHelper = new SqlHelper();
        $arr = $sqlHelper->execute_dql_arr($sql);
        $sqlHelper->close_connect();
        return $arr;
    }

    function SetLight($L_Addr, $L_Tone, $L_Bright)
    {
        $sql = "insert into light (L_Addr,L_Tone,L_Bright) values (" . $L_Addr .",". $L_Tone .",". $L_Bright  . ")";
        $sqlHelper = new SqlHelper();
        if ($sqlHelper->execute_dml($sql) == 0) {
            $sqlHelper->close_connect();
            exit();
        }
        $sqlHelper->close_connect();
    }
}
?>

<?php
require_once 'func/Tools.php';
require_once 'func/Room.class.php';
require_once 'func/SqlHelper.class.php';
utf8();
$sqlHelper=new SqlHelper();
$sql="select * from room where R_Uid=".getSession("uid");
$arr=$sqlHelper->execute_dql_arr($sql);
showArrayUrl($arr,"modify.php?R_Id=");
?>
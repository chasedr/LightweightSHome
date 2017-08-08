<?php
require_once '../Function/StateService.class.php';
require_once '../Commer/Tools.php';
header("Content-type:text/html;charset=utf-8");
if(!empty($_POST["addr"])&&!empty($_POST["starttime"])&&!empty($_POST["endtime"])&&!empty($_POST["issmart"])&&!empty($_POST["fit"])){
    $addr=$_POST["addr"];
    $starttime=$_POST["starttime"];
    $endtime=$_POST["endtime"];
    $issmart=$_POST["issmart"];
    $fit=$_POST["fit"];
    $stateService=new StateService();
    if($stateService->updateStateByAddr($addr, $starttime, $endtime, $issmart, $fit)){
        echo "成功，即将自动跳转！";
       // var_dump($_SERVER);
        header("Refresh:1;url=setInfo.php");
    }else {
        echo "失败，即将返回！";
        header("Refresh:1;".$_SERVER["HTTP_REFERER"]);
    }
    
}
?>
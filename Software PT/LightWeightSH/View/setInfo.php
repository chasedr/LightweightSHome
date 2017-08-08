<?php
require_once '../Function/StateService.class.php';
require_once '../Commer/Tools.php';
header("Content-type:text/html;charset=utf-8");
echo "<h2>配置</h2>";
$stateService=new StateService();
$arr=$stateService->showState();
showArray($arr);




?>
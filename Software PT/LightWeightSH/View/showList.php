<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<?php
require_once '../Function/LightService.class.php';
require_once '../Function/WindService.class.php';
require_once '../Commer/Tools.php';
$lightService=new LightService();
$windService=new WindService();
$arr2=$windService->GetWind();
$arr1=$lightService->GetLight();
echo "<h2>开关灯数据变化</h2>";
showArrayNo($arr1);
echo "<h2>风扇数据变化</h2>";
showArrayNo($arr2);
?>
</head>
</html>
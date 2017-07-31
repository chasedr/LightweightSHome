<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<?php
require_once '../Function/LightService.class.php';
require_once '../Commer/Tools.php';
$lightService=new LightService();
$arr=$lightService->GetLight();
showArray($arr);
?>
</head>
</html>
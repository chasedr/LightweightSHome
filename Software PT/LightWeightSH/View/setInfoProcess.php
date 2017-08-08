<?php
require_once '../Function/StateService.class.php';
require_once '../Commer/Tools.php';
header("Content-type:text/html;charset=utf-8");
if(!empty($_GET["addr"])){
    $addr=$_GET["addr"];
}
$stateService=new StateService();
$arr=$stateService->showStateByAddr($addr);
?>
<html >
<head>
</head>
<body>
<h2><?php 
    if($arr[0][S_Type]=='l') {
        $type="亮度";
        echo "开关灯设置"; 
    }else if($arr[0][S_Type]=='w') {
        echo "风扇设置";
        $type="温度";
    }
    else {
        echo "其他设置";}?></h2>
<form action="set.php" method="post">
设备地址：<input type="text" name="addr" value="<?php echo $arr[0][S_Addr];?>" readonly disabled>
<br/>
开启时间：<input  type="text" name="starttime" value="<?php echo $arr[0][S_Starttime];?>" >
<br/>
关闭时间：<input  type="text" name="endtime" value="<?php echo $arr[0][S_Endtime];?>" >
<br/>
是否开启智能模式：
<input  type="radio" name="issmart" value="1"  <?php if($arr[0][S_Issmart]==1) echo "checked";?> >是
<input  type="radio" name="issmart" value="2" <?php  if($arr[0][S_Issmart]==0)  echo "checked";?> >否
<br/>
适应<?php echo $type;?>：<input  type="text" name="fit" value="<?php echo $arr[0][S_Fit];?>" >
<br/>
<input type="hidden" name="addr" value="<?php echo $addr;?>">
<input type="submit" value="提交">
<input type="reset" value="还原">

</form>
</body>

</html>
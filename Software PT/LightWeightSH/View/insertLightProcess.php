<?php
require_once '../Function/LightService.class.php';
$L_Addr=$_POST["L_Addr"];
$L_Tone=$_POST["L_Tone"];
$L_Bright=$_POST["L_Bright"];
if(!empty($L_Addr)&&!empty($L_Tone)&&!empty($L_Bright)){
     $lightService=new LightService();
     $lightService->SetLight($L_Addr, $L_Tone, $L_Bright);
}
?>


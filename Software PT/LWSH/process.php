<?php
require_once 'func/Tools.php';
require_once 'func/R2r_sta.class.php';
require_once 'func/Infrared.class.php';
require_once 'func/Room.class.php';
require_once 'func/Light.class.php';
// sessionId();
utf8();
checkSessionValidate("name");
checkSessionValidate("uid");
set_time_limit(0);
ob_end_clean();
echo str_pad('', 1024);
// var_dump($_SESSION);
$uid = getSession("uid");
$r2r = new R2r_sta();
$infrared = new Infrared();
$room = new Room();
$light = new Light();

while (1) {
    $count = $r2r->showCountBySta();
    if ($count[0]["count"]) {
        $arr = $r2r->showBySta();
        $r2r->setRSId($arr[0]["RS_Id"]);
        $infrared->setIAddr($arr[0]["RS_Addr"]);
        $arrIO = $infrared->showByAddr();
        
        // 出去
        $out = $arrIO[0]['I_Out'];
        // 进入
        $in = $arrIO[0]["I_In"];
        /*
        if ($light->returnTime($out) == 0 || $light->returnTime($in) == 0) {
            echo "时间未到<br/>";
            $r2r->writeProcess();
            if ($arr[0]["RS_Isout"]) {
                $room->countProcess($out, $in, $uid);
                echo $in . "->" . $out . " ";     
            } else {
                $room->countProcess($in, $out, $uid);
                echo $out . "->" . $in . " ";    
            }
            flush();
            sleep(5);
            continue;
        }*/
        
        if ($arr[0]["RS_Isout"]) {
            $room->countProcess($out, $in, $uid);
            echo $in . "->" . $out . "<br/>";
            $light->setLight($room->havePeople($in), $in);
            $light->setLight($room->havePeople($out), $out);
        } else {
            $room->countProcess($in, $out, $uid);
            echo $out . "->" . $in . "<br/>";
            $light->setLight($room->havePeople($out), $out);
            $light->setLight($room->havePeople($in), $in);
        }
        $r2r->writeProcess();
        flush();
        sleep(5);
    } else {
        echo "no data<br/>";
        flush();
        sleep(5);
    }
}
?>
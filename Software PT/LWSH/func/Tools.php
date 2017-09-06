<?php
function sessionId(){
    @session_id($_GET['sid']);
    @session_start();
    $sid = @session_id();
}
function utf8(){
    header("Content-type:text/html;charset=utf-8");
}
function setSession($value,$string){
    //必须位于HTML 标签之前
    session_start();
    $_SESSION[$string]=$value;
}

function turnToTime($time,$string){
    return date($string,$time);
}

function checkSessionValidate($check)
{
    session_start();
    if (empty($_SESSION[$check])) {
        header("Location:index.php?errorNO='请先登录！'");
        exit();
    }
}

function getSession($string){
    checkSessionValidate($string);
    return $_SESSION[$string];
}

function destroySession($check)
{
    session_start();
    if (!empty($_SESSION[$check])){
        unset($_SESSION[$check]);
    }
}

function showArrayUrl($arr,$url){
    if(sizeof($arr)==0){
        exit("没有任何数据！");
    }else{
        $line="<table style='margin:auto;width:400px; border:solid 1px #000; padding-left: 10px;'>";
        $keys=array_keys($arr[0]);
        $line.="<tr>";
        $line.="<th>".$keys[0]."</th>" ;
        for($n=0;$n<sizeof($keys);$n++){
            $line.="<th>".next($keys)."</th>" ;
        }
        $line.="<th>"."设置"."</th>" ;
        $line.="</tr> <tr>";
        for($i=0;$i<sizeof($arr);$i++){
            $line.="<td>".$arr[$i][$keys[0]]."</td>";
                for($j=0;$j<sizeof($arr[$i]);$j++){
                    $line.="<td>".next ($arr[$i])."</td>";
            }
            $line.="<td>"."<a href=".$url.$arr[$i][$keys[0]].">修改</a>"."</td>";
            $line.="</tr>";
        }
    }
    echo $line."<table/>";

}

function showArray($arr){
    if(sizeof($arr)==0){
        exit("没有任何数据！");
    }else{
        $keys=array_keys($arr[0]);
        $line="<table>";
        $line.="<tr>";
        $line.="<th>".$keys[0]."</th>" ;
        for($n=0;$n<sizeof($keys);$n++){
            $line.="<th>".next($keys)."</th>" ;
        }
        $line.="</tr> <tr>";
        for($i=0;$i<sizeof($arr);$i++){
            $line.="<td>".$arr[$i][$keys[0]]."</td>";
            for($j=0;$j<sizeof($arr[$i]);$j++){
                $line.="<td>".next ($arr[$i])."</td>";
            }
            $line.="</tr>";
        }
    }
    echo $line."<table/>";

}

?>
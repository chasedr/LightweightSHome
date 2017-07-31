<?php
// 获取项关键的值
function GetValue($key)
{
    if (! empty($_COOKIE[$key])) {
        return $_COOKIE[$key];
    }
}

function GetTime()
{
    if (! empty($_COOKIE['lastVisit'])) {
        echo "<p>上次登录日期:   " . $_COOKIE['lastVisit']."</p>" ;
        // 更新登录时间
        setcookie("lastVisit", date("Y-m-d"), time() + 24 * 3600 * 30); //"Y-m-d H:i:s"
    } else {
        echo "<p>首次登陆</P>";
        setcookie("lastVisit", date("Y-m-d"), time() + 24 * 3600 * 30);
    }
}

function checkUserValidate($check)
{
    session_start();
    if (empty($_SESSION[$check])) {
        header("Location:login.php?errorNO=3");
        exit();
    }
}
function showId(){
	checkUserValidate('user');
	return $_SESSION['id'];
}
function destroySession($check)
{
	session_start();
	if (!empty($_SESSION[$check])){
		unset($_SESSION[$check]);
	}
}
function showArray($arr){
    $line="<table>";
    if(sizeof($arr)==0){
        exit("没有任何数据！");
    }else{
        $keys=array_keys($arr[0]);
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
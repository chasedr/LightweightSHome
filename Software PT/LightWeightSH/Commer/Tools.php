<?php
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
        $line.="<th>"."设置"."</th>" ;
        $line.="</tr> <tr>";
        for($i=0;$i<sizeof($arr);$i++){
            $line.="<td>".$arr[$i][$keys[0]]."</td>";
                for($j=0;$j<sizeof($arr[$i]);$j++){
                    $line.="<td>".next ($arr[$i])."</td>";
            }
            $line.="<td>"."<a href='setInfoProcess.php?addr=".$arr[$i][$keys[0]]."'>修改</a>"."</td>";
            $line.="</tr>";
        }
    }
    echo $line."<table/>";

}
function showArrayNo($arr){
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
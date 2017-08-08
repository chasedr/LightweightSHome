<?php
require_once 'SqlHelper.class.php';
require_once 'State.class.php';
class StateService{
    function showState(){
        $sql="select * from state order by S_Type asc";
        //var_dump($sql);
        $sqlHelper=new SqlHelper();
        $arr=$sqlHelper->execute_dql_arr($sql);
        $sqlHelper->close_connect();
        return $arr;
    }
    function showStateByAddr($addr){
        $sql="select * from state where S_Addr='".$addr."'";
        $sqlHelper=new SqlHelper();
        $arr=$sqlHelper->execute_dql_arr($sql);
        $sqlHelper->close_connect();
        return $arr;
    }
    function updateStateByAddr($addr,$starttime,$endtime,$issmart,$fit){
        $sql="update state set S_Starttime='".$starttime."',S_Endtime='".$endtime."',S_Issmart=".$issmart.",S_Fit=".$fit;
        $sql.=" where S_Addr='".$addr."'";
        //var_dump($sql);
        $sqlHelper=new SqlHelper();
        if($sqlHelper->execute_dml($sql)){
            return 1;
        }else return 0;
        
    }
    
}

?>
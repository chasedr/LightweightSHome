<?php
require_once 'SqlHelper.class.php';
class Room{
    private $RId;
    private $RCount;
    private $RUid;
    
    public function countProcess($ridAdd,$ridDec,$uid){
        $sqlAdd="update room set R_Count=R_Count+1 where R_Id=".$ridAdd." and R_Uid=".$uid;
        $sqlDec="update room set R_Count=R_Count-1 where R_Id=".$ridDec." and R_Uid=".$uid;
        $sqlHelper=new SqlHelper();
        $sqlHelper->execute_dml("BEGIN"); 
        $resAdd=$sqlHelper->execute_dml($sqlAdd);
        $resDec=$sqlHelper->execute_dml($sqlDec);        
        if($resAdd&&$resDec){
            $sqlHelper->execute_dml("COMMIT");
        }else{
            $sqlHelper->execute_dml("ROLLBACK");
        }
        $sqlHelper->close_connect();
        return $res;
    }
    
    public function havePeople($RId){
        if($RId==0)
            return 0;
        $sql="select R_Count as count from room where R_Id=".$RId;
        $sqlHelper=new SqlHelper();
        $arr=$sqlHelper->execute_dql_arr($sql);
        $sqlHelper->close_connect();       
        if($arr[0]["count"])
            return 1;
        else 
            return -1;
    }
    
    
    
	/**
     * @return the $RId
     */
    public function getRId()
    {
        return $this->RId;
    }

	/**
     * @return the $RCount
     */
    public function getRCount()
    {
        return $this->RCount;
    }

	/**
     * @return the $RUid
     */
    public function getRUid()
    {
        return $this->RUid;
    }

	/**
     * @param field_type $RId
     */
    public function setRId($RId)
    {
        $this->RId = $RId;
    }

	/**
     * @param field_type $RCount
     */
    public function setRCount($RCount)
    {
        $this->RCount = $RCount;
    }

	/**
     * @param field_type $RUid
     */
    public function setRUid($RUid)
    {
        $this->RUid = $RUid;
    }

    
}

?>
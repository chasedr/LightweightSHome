<?php
require_once 'SqlHelper.class.php';
class Infrared{
    private $IAddr;
    private $IIn;
    private $IOut;
    
    public function showByAddr(){
        $sql="select * from infrared where I_Addr=".$this->IAddr;
        $sqlHelper=new SqlHelper();
        $arr=$sqlHelper->execute_dql_arr($sql);
        $sqlHelper->close_connect();
        return $arr;
    }
  
    
	/**
     * @return the $IAddr
     */
    public function getIAddr()
    {
        return $this->IAddr;
    }

	/**
     * @return the $IIn
     */
    public function getIIn()
    {
        return $this->IIn;
    }

	/**
     * @return the $IOut
     */
    public function getIOut()
    {
        return $this->IOut;
    }

	/**
     * @param field_type $IAddr
     */
    public function setIAddr($IAddr)
    {
        $this->IAddr = $IAddr;
    }

	/**
     * @param field_type $IIn
     */
    public function setIIn($IIn)
    {
        $this->IIn = $IIn;
    }

	/**
     * @param field_type $IOut
     */
    public function setIOut($IOut)
    {
        $this->IOut = $IOut;
    }

    
}

?>
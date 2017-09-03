<?php
require_once 'SqlHelper.class.php';
class R2r_sta
{

    private $RSId;

    private $RSAddr;

    private $RSIsout;

    private $RSTime;

    private $RSSta;

    public function showBySta(){ 
        $sql="select * from r2r_sta where RS_Sta=0 order by RS_Id asc limit 0,1";
        $sqlHelper=new SqlHelper();
        $arr=$sqlHelper->execute_dql_arr($sql);
        $sqlHelper->close_connect();
        return $arr;
    }
     public function showCountBySta(){
         $sql="select count(RS_Id) as count from r2r_sta where RS_Sta=0";
         $sqlHelper=new SqlHelper();
         $count=$sqlHelper->execute_dql_arr($sql);
         $sqlHelper->close_connect();
         return $count;
     }
    public function writeProcess(){
        $sql="update r2r_sta set RS_Sta=1 where RS_Id=".$this->RSId;
        $sqlHelper=new SqlHelper();
        if($sqlHelper->execute_dml($sql)){
            echo "id=".$this->RSId." Opreate OK！<br/>";
        }else{
            echo "id=".$this->RSId." Opreate ERR！..........trying again..........<br/>";
        }
        $sqlHelper->close_connect();
    }
    

    /**
     *
     * @return the $RSId
     */
    public function getRSId()
    {
        return $this->RSId;
    }

    /**
     *
     * @return the $RSAddr
     */
    public function getRSAddr()
    {
        return $this->RSAddr;
    }

    /**
     *
     * @return the $RSIsout
     */
    public function getRSIsout()
    {
        return $this->RSIsout;
    }

    /**
     *
     * @return the $RSTime
     */
    public function getRSTime()
    {
        return $this->RSTime;
    }

    /**
     *
     * @return the $RSSta
     */
    public function getRSSta()
    {
        return $this->RSSta;
    }

    /**
     *
     * @param field_type $RSId            
     */
    public function setRSId($RSId)
    {
        $this->RSId = $RSId;
    }

    /**
     *
     * @param field_type $RSAddr            
     */
    public function setRSAddr($RSAddr)
    {
        $this->RSAddr = $RSAddr;
    }

    /**
     *
     * @param field_type $RSIsout            
     */
    public function setRSIsout($RSIsout)
    {
        $this->RSIsout = $RSIsout;
    }

    /**
     *
     * @param field_type $RSTime            
     */
    public function setRSTime($RSTime)
    {
        $this->RSTime = $RSTime;
    }

    /**
     *
     * @param field_type $RSSta            
     */
    public function setRSSta($RSSta)
    {
        $this->RSSta = $RSSta;
    }
}
?>
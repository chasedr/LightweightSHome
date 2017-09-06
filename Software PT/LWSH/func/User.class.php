<?php
require_once 'SqlHelper.class.php';
class User{
    private $UId;
    private $UNum;
    private $UPasswd;
    // 提供验证用户是否合法的方法
  
    
    public function checkUser()
    {
        if($this->UId==""||$this->UPasswd==""){
            return '0';
        }
        $sql = "select U_Passwd as password,U_Name as name from user where U_Id=".$this->UId;
        // 创建一个sqlhelper对象
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dql($sql);
        if ($row = mysqli_fetch_assoc($res)) {
            // if (md5($password) == $row['password'])
            if ($this->UPasswd== $row['password'])
            return $row['name'];
        }
        mysqli_free_result($res);
        $sqlHelper->close_connect();
        return '0'; // php双引号为假
    }
	/**
     * @return the $UId
     */
    public function getUId()
    {
        return $this->UId;
    }

	/**
     * @return the $UNum
     */
    public function getUNum()
    {
        return $this->UNum;
    }

	/**
     * @return the $UPasswd
     */
    public function getUPasswd()
    {
        return $this->UPasswd;
    }

	/**
     * @param field_type $UId
     */
    public function setUId($UId)
    {
        $this->UId = $UId;
    }

	/**
     * @param field_type $UNum
     */
    public function setUNum($UNum)
    {
        $this->UNum = $UNum;
    }

	/**
     * @param field_type $UPasswd
     */
    public function setUPasswd($UPasswd)
    {
        $this->UPasswd = $UPasswd;
    }
    
    
    
    
    
}
?>
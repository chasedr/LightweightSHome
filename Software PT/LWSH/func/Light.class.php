<?php
require_once 'SqlHelper.class.php';
require_once 'Tools.php';
require_once 'R2r_sta.class.php';
require_once 'Infrared.class.php';
require_once 'Room.class.php';
require_once 'Light.class.php';

class Light
{

    private $LAddr;

    private $LRid;

    private $LTime;

    public function returnTime($rid)
    {
        $sql = "select L_Time from light where L_Rid=" . $rid . " limit 0,1";
        $sqlHelper = new SqlHelper();
        $arr = $sqlHelper->execute_dql_arr($sql);
        $sqlHelper->close_connect();
        if ((int) turnToTime(time(), 's') < (int) $arr[0]["L_Time"])
            return 0;
        else
            return 1;
    }

    public function setLight($count, $rid)
    {
        $sql = "select * from light where L_Rid=" . $rid. " limit 0,1";
        $sqlHelper = new SqlHelper();
        $arr = $sqlHelper->execute_dql_arr($sql);
        $sqlHelper->close_connect();
        switch ($count) {
            case 0:
                echo "0操作<br/>";
                break;
            case 1:
                $r=shell_exec("./setlampopt.py -address".$arr[0]["L_Rid"]." -speed 1");
                echo "房间    ".$rid."    有人，    ".$arr[0]["L_Addr"]."    开灯，操作    ".$r."<br/>";
                break;
            case - 1:
                $r=shell_exec("./setlampopt.py -address".$arr[0]["L_Rid"]." -speed 0");
                echo "房间    ".$rid."    没有人，    ".$arr[0]["L_Addr"]."    关灯，操作    ".$r."<br/>";
                //echo "setfanopt.py -address" . $arr[$i]["L_Addr"] . " -speed 0" . "</br>";
                break;
        }
    }
    public function doLight(){
        $sql = "select * from light,room where room.R_Id=light.L_Rid";
        $sqlHelper = new SqlHelper();
        $arr = $sqlHelper->execute_dql_arr($sql);
        $sqlHelper->close_connect();
        for($i=0;$i<sizeof($arr);$i++){
            if($arr[$i]["R_Count"]>0&&turnToTime(time(),"s")>(int)$arr[$i][L_Time]){           
                $r=shell_exec("setfanopt.py -address".$arr[$i]["L_Rid"]." -speed 1");
                echo "房间    ".$R_Id."    有人，    ".$arr[$i]["L_Addr"]."    开灯，操作    ".$r."<br/>";
            }
            else if(turnToTime(time(),"s")<(int)$arr[$i][L_Time]){
                echo "时间未到！";
            }
            else{
                $r=shell_exec("setfanopt.py -address".$arr[$i]["L_Rid"]." -speed 0");
                echo "房间    ".$R_Id."    无人，    ".$arr[$i]["L_Addr"]."    关灯，操作    ".$r."<br/>";
            }
        }
        
    }

    /**
     *
     * @return the $LAddr
     */
    public function getLAddr()
    {
        return $this->LAddr;
    }

    /**
     *
     * @return the $LRid
     */
    public function getLRid()
    {
        return $this->LRid;
    }

    /**
     *
     * @return the $LTime
     */
    public function getLTime()
    {
        return $this->LTime;
    }

    /**
     *
     * @param field_type $LAddr
     */
    public function setLAddr($LAddr)
    {
        $this->LAddr = $LAddr;
    }

    /**
     *
     * @param field_type $LRid
     */
    public function setLRid($LRid)
    {
        $this->LRid = $LRid;
    }

    /**
     *
     * @param field_type $LTime
     */
    public function setLTime($LTime)
    {
        $this->LTime = $LTime;
    }
}
?>
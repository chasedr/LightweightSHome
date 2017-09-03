<?php
// 这是一个工具类，完成对数据库的操作
class SqlHelper
{

    private $conn;

    private $dbname = "lightweight1.0";

    private $username = "root";

    private $password = "321708..";

    private $host = "localhost";

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
        if (! $this->conn) {
            die(mysqli_error($this->conn));
        }
    }
    
    // 执行dql语句
    public function execute_dql($sql)
    {
        $res = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return $res;
    }
    
    // 执行dql语句并且以数组返回，释放资源
    public function execute_dql_arr($sql)
    {
        $arr = array();
        $res = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        // 数据存到数组
        while ($row = mysqli_fetch_assoc($res)) {
            $arr[] = $row;
        }
        // 释放资源
        mysqli_free_result($res);
        return $arr;
    }
    // 执行dml语句
    public function execute_dml($sql)
    {
        $b = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        if (! $b) {
            return 0;
        } else {
            if (mysqli_affected_rows($this->conn) > 0)
                return 1;
            else
                return 2;
        }
    }
    
    // 关闭连接
    public function close_connect()
    {
        if (! empty($this->conn)) {
            mysqli_close($this->conn);
        }
    }
    // 分页封装
    public function exectue_dql_pagebreak($sql1, $sql2, $pageBreak)
    {
        $res = mysqli_query($this->conn, $sql1) or die(mysqli_error($this->conn));
        $arr = array();
        
        while ($row = mysqli_fetch_assoc($res)) {
            $arr[] = $row;
        }
        mysqli_free_result($res);
        // if($arr[0]==""){
        // header("Location:error.php");
        // }
        $res = mysqli_query($this->conn, $sql2) or die(mysqli_error($this->conn));
        if ($row = mysqli_fetch_row($res)) {
            $pageBreak->pageCount = ceil($row[0] / $pageBreak->pageSize);
            $pageBreak->rowCount = $row[0];
        }
        mysqli_free_result($res);
        
        // 分页
        
        if ($pageBreak->pageNow > 1) {
            $prePage = $pageBreak->pageNow - 1;
            $navigate = "<br/><a href='{$pageBreak->gotoUrl}?pageNow=$prePage'>上一页</a>&nbsp";
        } else
            $navigate = "<br/><a>上一页</a>";
        if ($pageBreak->pageNow > 5)
            $index = $pageBreak->pageNow - 5;
        else
            $index = 1;
        for ($start = $index; $start < $index + 10; $start ++) {
            if ($start == $pageBreak->pageCount + 1)
                break;
            if ($start == $pageBreak->pageNow) {
                $navigate .= "<a>[$pageBreak->pageNow]</a>";
                continue;
            }
            $navigate .= "<a href='{$pageBreak->gotoUrl}?pageNow=$start'>" . "[$start]" . "</a>&nbsp";
        }
        if ($pageBreak->pageNow < $pageBreak->pageCount) {
            $nextPage = $pageBreak->pageNow + 1;
            $navigate .= "<a href='{$pageBreak->gotoUrl}?pageNow=$nextPage'>下一页</a>&nbsp";
        } else
            $navigate .= "&nbsp;&nbsp;下一页&nbsp;&nbsp;";
        $navigate .= "当前页&nbsp;" . $pageBreak->pageNow . "&nbsp;/&nbsp;共&nbsp;" . $pageBreak->pageCount . "&nbsp;页";
        
        $pageBreak->res_array = $arr;
        $pageBreak->navigate = $navigate;
    }
}
?>
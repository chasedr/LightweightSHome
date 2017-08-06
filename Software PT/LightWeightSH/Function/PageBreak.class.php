<?php
// 分页信息类
class PageBreak
{

    public $pageSize = 10;

    public $res_array;
 // 数组显示数据
    public $rowCount;
 // 数据库获取
    public $pageNow;
 // 当前页
    public $pageCount;
 // 计算得到
    public $navigate;
 // 分页串
    public $gotoUrl; // 提交页面
}
?>
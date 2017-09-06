<?php
require_once 'func/User.class.php';
require_once 'func/Tools.php';
utf8();
if (! empty($_POST['check'])) {
    session_start();
    if (strtolower($_POST["check"]) == strtolower($_SESSION['checkcode'])) {
        if (! empty($_POST['id']) && ! empty($_POST['passwd'])) {
            $user = new User();
            $user->setUId($_POST['id']);
            $user->setUPasswd($_POST[passwd]);
            if (($name=$user->checkUser()) == '0') {
                echo "<center>用户检索登陆失败!</center>";
                header("refresh:1;url=index.php");
                exit();
            }else{
                setSession($name,"name");
                setSession($_POST["id"],"uid");
               $sid=@session_id();
                header("refresh:1;url=process.php?sid=".$sid);
            }
        } else {
            echo "<center>输入不能为空，登陆失败!</center>";
            header("refresh:3;url=index.php");
            exit();
        }
    } else {
        echo "<center>验证码错，误登陆失败!</center>";
       header("refresh:3;url=index.php");
        exit();
    }
}

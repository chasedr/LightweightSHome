<?php
    //使用php绘图技术画出验证码
    $checkcode="";
    //存在session
    $image=imagecreatetruecolor(110, 30); 
    $grey  =  imagecolorallocate ( $image ,  205 ,  205 ,  205 );
    imagefill ( $image ,  0 ,  0 ,  $grey);
    for($i=0;$i<5;$i++){
        $color=imagecolorallocate($image, rand(0,100),rand(0,100),rand(0,100));
        switch((rand(0,3)%3)){
            case 1: $codestring=chr(rand(48,57));
                break;
            case 2: $codestring=chr(rand(65,90));
                break;
            case 0:$codestring=chr(rand(97,122));
                break;
        }
        $checkcode.=$codestring;
      imagestring($image, rand(5,10), rand($i*15+10,($i+1)*15+5), rand(0,15), $codestring, $color);
    }
    header("content-type:image/png");
    imagepng($image);
    imagedestroy($image);
    session_start();
    $_SESSION["checkcode"]=$checkcode;
?>
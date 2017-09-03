<?php
require_once 'func/Tools.php';
utf8();
?>
<html>
<body style="margin:auto;width:400px; border:solid 1px #000; padding-left: 10px;">
	<form action="login.php" method="post">
		<p>
			账号：<input type="text" name="id"  >
		</p>
		<p>
			密码：<input type="password" name="passwd"  >
		</p>
		<p>
			验证：<input type="text" name="check" > <img
				src="func/checkcode.php"
				onclick="this.src='func/checkcode.php?check='+Math.random()" />
		</p>
		<p>
		
		<input type="submit" value="登陆" >
		
		</p>

	</form>

</body>
</html>
<?php
//C#ถหตฤตวยฝผ์ฒโฃป
		$account = $_GET['account'];
		$shop_password= $_GET['shop_password'];
		$mysql = new SaeMysql();
		$check_sql="select * from shop where account = '$account' and shop_password ='$shop_password'";
		$res = $mysql->getData($check_sql);
		if($res)
			echo "ok";
		else
			echo "fail";
?>
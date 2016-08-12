<?php
//android端注册。
//如果用户名已存在，返回0。如果注册成功，返回1。如果注册失败，返回2。
		$customer_name = $_GET['customer_name'];
		$customer_password= $_GET['customer_password'];
		$mysql = new SaeMysql();
		$check_sql="select * from customer where customer_name =".$customer_name;
		$res = $mysql->getData($check_sql);
		if($res)
		{
			echo 0;
		}else{
				$register_sql="INSERT INTO  `app_ququcoupon`.`customer` (`customer_name` ,`customer_password`) VALUES ('$customer_name' , $customer_password)";
				$res = $mysql->runSql($register_sql);
				if($res)
					echo '1';
				else
					echo '2';
		}	
?>
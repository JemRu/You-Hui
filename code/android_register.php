<?php
//android��ע�ᡣ
//����û����Ѵ��ڣ�����0�����ע��ɹ�������1�����ע��ʧ�ܣ�����2��
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
<?php
//��׿���û���¼ʱ�ļ����֤��
	
	$customer_name = $_GET['customer_name'];
	$customer_password = $_GET['customer_password'];
	$check_sql = "select * from customer where `customer_name`='$customer_name' and `customer_password`='$customer_password' ";
	$mysql= new SaeMysql();
	$res = $mysql->getData($check_sql);
	if($res)
	{
		echo "ok";
	}
	else
		echo "fail"; 
?>
<?php
	//用来处理用户使用优惠劵之后进行数据库的更新，包括优惠劵状态码更改，添加使用时间
	$customer_name = $_GET['customer_name'];
	$coupon_id = $_GET['coupon_id'];
	$use_time = date('Y-m-d');
	$mysql = new SaeMysql();
	$now_time = strtotime(date('Y-m-d h:i:s'));//得到当前时间的时间戳
	//更新数据库，使已过期的优惠劵的使用状态调整为2
	$select_sql = "select end_time from coupons natural join user_coupons where coupon_id = $coupon_id";
	$end_time = $mysql->getVar($select_sql);
	if($end_time){
		//判断是否过期
		if($now_time >= strtotime($end_time.' 24:00:00'))
		{
			$update_sql = "update app_ququcoupon.user_coupons set coupon_state=2  where coupon_id = $coupon_id";
			$update_res = $mysql->runSql($update_sql);
			if(!$update_res)
				echo "error";//数据库报错
		}
		$get_sql = "select customer_id from customer where customer_name = '$customer_name'";
		$customer_id = $mysql->getVar($get_sql);
		$select_sql2 = "select coupon_state from user_coupons where `customer_id`=$customer_id and `coupon_id`=$coupon_id ";
		$coupon_state = $mysql->getVar($select_sql2);
		if($customer_id )
		{
			if( $coupon_state==0){
				$update_sql = "UPDATE  `app_ququcoupon`.`user_coupons` SET  `use_time` =  '$use_time' ,`coupon_state` =1 WHERE `customer_id` = $customer_id and `coupon_id` = $coupon_id and `coupon_state` = 0";
				$res = $mysql->runSql($update_sql);
				if($res)
					echo '1';//成功使用
				else
					echo '2';//使用失败
			}else if( $coupon_state == 1)		
				echo '3';//优惠劵已使用
			else if( $coupon_state == 2 )
				echo '4';//优惠劵已过期
			else 
				echo 'error';//数据库报错
		}else
			echo '5';//customer_name 不存在  
	}else{
		echo "0";// coupon_id不存在 或 该用户下没有获取到该优惠劵 
	}
	
	
	
	
	
	
?>
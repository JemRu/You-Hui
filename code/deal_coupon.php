<?php
	//���������û�ʹ���Ż݄�֮��������ݿ�ĸ��£������Ż݄�״̬����ģ����ʹ��ʱ��
	$customer_name = $_GET['customer_name'];
	$coupon_id = $_GET['coupon_id'];
	$use_time = date('Y-m-d');
	$mysql = new SaeMysql();
	$now_time = strtotime(date('Y-m-d h:i:s'));//�õ���ǰʱ���ʱ���
	//�������ݿ⣬ʹ�ѹ��ڵ��Ż݄���ʹ��״̬����Ϊ2
	$select_sql = "select end_time from coupons natural join user_coupons where coupon_id = $coupon_id";
	$end_time = $mysql->getVar($select_sql);
	if($end_time){
		//�ж��Ƿ����
		if($now_time >= strtotime($end_time.' 24:00:00'))
		{
			$update_sql = "update app_ququcoupon.user_coupons set coupon_state=2  where coupon_id = $coupon_id";
			$update_res = $mysql->runSql($update_sql);
			if(!$update_res)
				echo "error";//���ݿⱨ��
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
					echo '1';//�ɹ�ʹ��
				else
					echo '2';//ʹ��ʧ��
			}else if( $coupon_state == 1)		
				echo '3';//�Ż݄���ʹ��
			else if( $coupon_state == 2 )
				echo '4';//�Ż݄��ѹ���
			else 
				echo 'error';//���ݿⱨ��
		}else
			echo '5';//customer_name ������  
	}else{
		echo "0";// coupon_id������ �� ���û���û�л�ȡ�����Ż݄� 
	}
	
	
	
	
	
	
?>
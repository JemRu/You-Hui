<?php
	//�û���ȡ�Ż݄����Ż݄���������һ�������û��Ż݄�������µ����ݣ��������ݿ����
	//����ֵ��1��ʾ��ȡ�ɹ���2��ʾ��ȡʧ�ܣ�3��ʾ�˿��ѵõ������Ż݄���4��ʾcustomer_name��coupon_id�����ڻ��Ż݄�����Ϊ0
	$customer_name = $_GET['customer_name'];
	$coupon_id = $_GET['coupon_id'];
	$get_time = date('Y-m-d');
	$mysql = new SaeMysql();
	$get_sql = "select customer_id from customer where customer_name = '$customer_name'";
	$customer_id = $mysql->getVar($get_sql);
	//�жϹ˿��Ƿ��ѻ�ȡ�����Ż݄���ÿ���Ż݄���ÿ���˿�ֻ�ܻ�ȡһ��
	$check_sql = "select count(*) from user_coupons where coupon_id = '$coupon_id' and customer_id = '$customer_id'";
	$check_res = $mysql->getVar($check_sql);//����Sql,���ؽ������һ����¼�ĵ�һ���ֶ�ֵ
	//�жϸ��Ż݄��Ƿ���ڣ��Ҹ��Ż݄���������0
	$check_sql2 = "select count(*)  from coupons where coupon_id = '$coupon_id' and coupons_amount>0";
	$check_res2 = $mysql->getVar($check_sql2);
	//�ж�customer_id�Ƿ����
	$check_sql3 = "select count(*)  from customer where customer_id = '$customer_id'";
	$check_res3 = $mysql->getVar($check_sql3);
	if($customer_id && $check_res2>0 && $check_res3>0 )
	{
		if($check_res == 0){
			//�˿ͻ�ȡ�Ż݄�ʱ���Ż݄�������һ
			$update_sql = "UPDATE app_ququcoupon.coupons SET coupons_amount = coupons_amount-1  where `coupon_id`=$coupon_id";
			$res = $mysql->runSql($update_sql);
			if($res)
			{	
				//�˿ͻ�ȡ�Ż݄�
				$insert_sql = "INSERT INTO  `app_ququcoupon`.`user_coupons` (`coupon_id` ,`customer_id`,`get_time`) VALUES ('$coupon_id' , '$customer_id','$get_time')";
				$res2 = $mysql->runSql($insert_sql);
				if($res2)
				{
					echo "1";//��ȡ�ɹ�
				}else{
					echo '2';//��ȡʧ��
					//����ʧ�ܺ󣬽��Ż݄�������ԭ
					$update_sql = "UPDATE app_ququcoupon.coupons SET coupons_amount = coupons_amount+1  where `coupon_id`=$coupon_id";
					$mysql->runSql($update_sql);
				}
				
			}else{
				echo '2';//��ȡʧ��
			}
		}else{
			echo "3";//�˿��ѵõ������Ż݄�
		}
	}else{
		echo "4";//customer_name��coupon_id�����ڻ��Ż݄�����Ϊ0
	}
	
?>	
 
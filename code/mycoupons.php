<?php
//�����ض��û���δʹ�õ��Ż݄��������Ż݄����ݣ��Ż݄���ʼʱ�䣬�Ż݄���ֹʱ�䣬�Ż݄�ʣ���������Ż݄�ͼƬURL���Żݼ۸�ԭ�ۣ�
//�����ʾ�url,�������֣����̵�ַ�����̵绰����,�Ż݄���ȡʱ�䣬�Ż݄�ʹ��ʱ�䣬�Ż݄�״̬ 
	date_default_timezone_set("Asia/Shanghai");
	$time = strtotime(date('Y-m-d h:i:s'));
	$customer_name = $_GET['customer_name'];
	$mysql = new SaeMysql();
	$coupons;$i=0;
	$now_time = strtotime(date('Y-m-d h:i:s'));//�õ���ǰʱ���ʱ���
	//�������ݿ⣬ʹ�ѹ��ڵ��Ż݄���ʹ��״̬����Ϊ2
	$select_sql = "select coupon_id, end_time from coupons natural join user_coupons";
	$select_res = $mysql->getData($select_sql);
	if($select_res){
		foreach($select_res as $item)
		{
			//�ж��Ƿ����
			if($now_time >= strtotime($item['end_time'].' 24:00:00'))
			{
				$coupon_id = $item['coupon_id'];
				$update_sql = "update app_ququcoupon.user_coupons set coupon_state=2  where coupon_id = $coupon_id";
				$update_res = $mysql->runSql($update_sql);
				if(!$update_res)
					echo "error";//�������ݿⱨ��
			}
		}
	}else{
		echo "error";//�������ݿⱨ��
	}
	$sql = "select coupon_id,coupon_content,start_time,end_time,coupons_amount,img_url,questionnaire_url,favourable_price,
		original_price,shop_name,shop_address,phone_num,get_time,use_time,coupon_state 
		from customer natural join user_coupons natural join coupons natural join shop 
		where `customer_name` = '$customer_name' order by `get_time`";
	$res = $mysql->getData($sql);
	if($res)
	{
		foreach($res as $coupon){
			$coupon["coupon_content"]=urlencode($coupon['coupon_content']);  
			$coupon["shop_name"]=urlencode($coupon['shop_name']);  
			$coupon["shop_address"]=urlencode($coupon['shop_address']); 
			$coupons[$i] = $coupon;
			$i++;
		}
		echo urldecode(json_encode($coupons));
	}else{
		echo 0;//��ʾû���Ż݄�
	}
	$mysql->closeDb();//�ر����ݿ�
?>
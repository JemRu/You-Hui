<?php
//返回特定用户的未使用的优惠劵，包括优惠劵内容，优惠劵开始时间，优惠劵截止时间，优惠劵剩余数量，优惠劵图片URL，优惠价格，原价，
//调查问卷url,店铺名字，店铺地址，店铺电话号码,优惠劵获取时间，优惠劵使用时间，优惠劵状态 
	date_default_timezone_set("Asia/Shanghai");
	$time = strtotime(date('Y-m-d h:i:s'));
	$customer_name = $_GET['customer_name'];
	$mysql = new SaeMysql();
	$coupons;$i=0;
	$now_time = strtotime(date('Y-m-d h:i:s'));//得到当前时间的时间戳
	//更新数据库，使已过期的优惠劵的使用状态调整为2
	$select_sql = "select coupon_id, end_time from coupons natural join user_coupons";
	$select_res = $mysql->getData($select_sql);
	if($select_res){
		foreach($select_res as $item)
		{
			//判断是否过期
			if($now_time >= strtotime($item['end_time'].' 24:00:00'))
			{
				$coupon_id = $item['coupon_id'];
				$update_sql = "update app_ququcoupon.user_coupons set coupon_state=2  where coupon_id = $coupon_id";
				$update_res = $mysql->runSql($update_sql);
				if(!$update_res)
					echo "error";//更新数据库报错
			}
		}
	}else{
		echo "error";//更新数据库报错
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
		echo 0;//表示没有优惠劵
	}
	$mysql->closeDb();//关闭数据库
?>
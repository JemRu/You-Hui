<?php
//android端推送优惠劵.
//自动返回未截止的优惠劵的所有信息。包括优惠劵id，优惠劵内容，优惠劵开始时间，优惠劵截止时间，优惠劵剩余数量，优惠劵图片URL，优惠价格，
//        原价，调查问卷URL，店铺名字，店铺地址，店铺电话号码
	date_default_timezone_set("Asia/Shanghai");
	$time = strtotime(date('Y-m-d h:i:s'));

	$mysql = new SaeMysql();
//	$coupons_sql="select coupon_id,coupon_content,start_time,end_time,coupons_amount,img_url,favourable_price,
//		original_price,questionnaire_url,shop_name,shop_address,phone_num 
//		from coupons natural join shop where coupons_amount >0 order by end_time";
	$coupons_sql = "select coupon_id, coupon_content, start_time, end_time, coupons_amount, img_url, questionnaire_url, favourable_price, shop_name, shop_address, phone_num,original_price from coupons natural join shop where coupons_amount >0 order by end_time";
	$res = $mysql->getData($coupons_sql);
	$coupons;
	$i=0;
	if($res)
	{
		foreach($res as $coupon){
			if($time <= strtotime($coupon['end_time'].' 24:00:00'))
			{
				$i++;
			}
		}
		$page = isset($_GET['page']) ? $_GET['page'] : 1; //获取当前页码 没有的话 就是第一页 
		$pageSize = 10;        //每页多少条
		$count = $i;        //返回记录总条数
		$no_of_paginations = ceil( $count/$pageSize );  //计算出总页数 ,ceil函数的作用是求不小于给定实数的最小整数。
		if($page > $no_of_paginations) 
		{
			//$page = $no_of_paginations;        //如果请求页码大于总页数 默认最后一页
			echo "fail";
		}else{
			$start = ($page - 1) * $pageSize;        //sql查询起始位置
			$i = $n = 0;
			foreach($res as $coupon){
				$n++;
				if($time <= strtotime($coupon['end_time'].' 00:00:00') && $i<$pageSize && $n>=$start)
				{
					$coupon["coupon_content"]=urlencode($coupon['coupon_content']);  
					$coupon["shop_name"]=urlencode($coupon['shop_name']);  
					$coupon["shop_address"]=urlencode($coupon['shop_address']);   
					$coupons[$i] = $coupon;
					$i++;
				}
			}
			echo urldecode(json_encode($coupons));
		
//		$array = array(
//				"count" => $count,        //总条数
//				"pageSize" => $pageSize,        //每页条数
//				"pageCount" => $no_of_paginations,  //总页数
//				"thisPage" => $page,//当前页码
//				"list" => $arrList        //列表
//		);
		

		}	
	}else{
		echo "fail";//表示没有优惠劵
	}
			
			
			
?>
<?php
//android�������Ż݄�.
//�Զ�����δ��ֹ���Ż݄���������Ϣ�������Ż݄�id���Ż݄����ݣ��Ż݄���ʼʱ�䣬�Ż݄���ֹʱ�䣬�Ż݄�ʣ���������Ż݄�ͼƬURL���Żݼ۸�
//        ԭ�ۣ������ʾ�URL���������֣����̵�ַ�����̵绰����
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
		$page = isset($_GET['page']) ? $_GET['page'] : 1; //��ȡ��ǰҳ�� û�еĻ� ���ǵ�һҳ 
		$pageSize = 10;        //ÿҳ������
		$count = $i;        //���ؼ�¼������
		$no_of_paginations = ceil( $count/$pageSize );  //�������ҳ�� ,ceil��������������С�ڸ���ʵ������С������
		if($page > $no_of_paginations) 
		{
			//$page = $no_of_paginations;        //�������ҳ�������ҳ�� Ĭ�����һҳ
			echo "fail";
		}else{
			$start = ($page - 1) * $pageSize;        //sql��ѯ��ʼλ��
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
//				"count" => $count,        //������
//				"pageSize" => $pageSize,        //ÿҳ����
//				"pageCount" => $no_of_paginations,  //��ҳ��
//				"thisPage" => $page,//��ǰҳ��
//				"list" => $arrList        //�б�
//		);
		

		}	
	}else{
		echo "fail";//��ʾû���Ż݄�
	}
			
			
			
?>
<?php
	//用户获取优惠劵，优惠劵的数量减一，并把用户优惠劵表插入新的数据，进行数据库更新
	//返回值：1表示获取成功，2表示获取失败，3表示顾客已得到该类优惠劵，4表示customer_name和coupon_id不存在或优惠劵数量为0
	$customer_name = $_GET['customer_name'];
	$coupon_id = $_GET['coupon_id'];
	$get_time = date('Y-m-d');
	$mysql = new SaeMysql();
	$get_sql = "select customer_id from customer where customer_name = '$customer_name'";
	$customer_id = $mysql->getVar($get_sql);
	//判断顾客是否已获取该类优惠劵，每类优惠劵，每个顾客只能获取一张
	$check_sql = "select count(*) from user_coupons where coupon_id = '$coupon_id' and customer_id = '$customer_id'";
	$check_res = $mysql->getVar($check_sql);//运行Sql,返回结果集第一条记录的第一个字段值
	//判断该优惠劵是否存在，且该优惠劵数量大于0
	$check_sql2 = "select count(*)  from coupons where coupon_id = '$coupon_id' and coupons_amount>0";
	$check_res2 = $mysql->getVar($check_sql2);
	//判断customer_id是否存在
	$check_sql3 = "select count(*)  from customer where customer_id = '$customer_id'";
	$check_res3 = $mysql->getVar($check_sql3);
	if($customer_id && $check_res2>0 && $check_res3>0 )
	{
		if($check_res == 0){
			//顾客获取优惠劵时，优惠劵数量减一
			$update_sql = "UPDATE app_ququcoupon.coupons SET coupons_amount = coupons_amount-1  where `coupon_id`=$coupon_id";
			$res = $mysql->runSql($update_sql);
			if($res)
			{	
				//顾客获取优惠劵
				$insert_sql = "INSERT INTO  `app_ququcoupon`.`user_coupons` (`coupon_id` ,`customer_id`,`get_time`) VALUES ('$coupon_id' , '$customer_id','$get_time')";
				$res2 = $mysql->runSql($insert_sql);
				if($res2)
				{
					echo "1";//获取成功
				}else{
					echo '2';//获取失败
					//插入失败后，将优惠劵数量还原
					$update_sql = "UPDATE app_ququcoupon.coupons SET coupons_amount = coupons_amount+1  where `coupon_id`=$coupon_id";
					$mysql->runSql($update_sql);
				}
				
			}else{
				echo '2';//获取失败
			}
		}else{
			echo "3";//顾客已得到该类优惠劵
		}
	}else{
		echo "4";//customer_name和coupon_id不存在或优惠劵数量为0
	}
	
?>	
 
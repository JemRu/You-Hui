<?php
//сц╩╖и╬ЁЩсе╩щ└╩
$customer_name = $_GET['customer_name'];
$coupon_id = $_GET['coupon_id'];
$mysql = new SaeMysql();
$get_sql = "select customer_id from customer where customer_name = '$customer_name'";
$customer_id = $mysql->getVar($get_sql);
$del_sql = "delete from `app_ququcoupon`.`user_coupons` where customer_id = '$customer_id' and coupon_id = '$coupon_id'"
$res = $mysql->runSql($del_sql);
if($customer_id && $res)
{
	echo "1";
}else {
	echo "0";
}

?>
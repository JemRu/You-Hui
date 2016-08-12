<?php
class Sae_sql_model extends CI_Model
{
	var $mysql;
	var $sql;
	//构造函数；  
	function __construct()
	{
		parent::__construct();
		//初始化SAE的MySQL对象
		$this->mysql = new SaeMysql();
	}
	
	
/*
*MySQL的INSERT的插入函数，函数的参数为数组new_coupon，数组包含shop_id,start_time,end_time,coupon_content,coupon_amount,coupon_price,img_url
*返回执行结果，创建成功返回1，创建失败返回0
*/
	function handle_create_coupon($new_coupon)
	{
		$shop_id = $new_coupon['shop_id'];
		$coupon_content = $new_coupon['coupon_content'];
		$start_time =$new_coupon['start_time'];
		$end_time = $new_coupon['end_time'];
		$coupons_amount = $new_coupon['coupons_amount'];
		$coupon_price = $new_coupon['coupon_price'];
		$img_url = $new_coupon['img_url'];
		$this->sql = "INSERT INTO app_ququcoupon.coupons (shop_id, coupon_content,start_time,end_time,coupons_amount,coupon_price,img_url) VALUES ('$shop_id', '$coupon_content','$start_time','$end_time','$coupons_amount','$coupon_price','$img_url')";
		$res = $this->mysql->runSql($this->sql);
		if($res)
			return 1;
		else
			return 0;
	}
	
	
/*
*MySQL的INSERT查询函数，函数的参数为数组shop_info，数组包含商店id，商店名称，商店地址，电话号码
*返回成功1或失败0
*/
	function set_shop_info($shop_info)
	{
		$shop_id = $shop_info['shop_id'];
		$shop_name = $shop_info['shop_name'];
		$shop_address = $shop_info['shop_address'];
		$phone_num = $shop_info['phone_num'];
		$this->sql = "update shop set shop_name = '$shop_name',shop_address = '$shop_address', phone_num = '$phone_num' where shop_id = '$shop_id' ";
		$res = $this->mysql->runSql($this->sql);
		if($res)
			return 1;
		else
			return 0;
	}
	
/*
*MySQL的SELECT查询函数，函数的参数为数组shop_id
*返回查询结果数组
*/
	function get_shop_info($shop_id)
	{
		$this->sql = "select * from shop where shop_id = '$shop_id'";		
		$res = $this->mysql->getData($this->sql);
		return $res;
	}
	
}
	 
?>
<?php
class Sae_sql_model extends CI_Model
{
	var $mysql;
	var $sql;
	//���캯����  
	function __construct()
	{
		parent::__construct();
		//��ʼ��SAE��MySQL����
		$this->mysql = new SaeMysql();
	}
	
	
/*
*MySQL��INSERT�Ĳ��뺯���������Ĳ���Ϊ����new_coupon���������shop_id,start_time,end_time,coupon_content,coupon_amount,coupon_price,img_url
*����ִ�н���������ɹ�����1������ʧ�ܷ���0
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
*MySQL��INSERT��ѯ�����������Ĳ���Ϊ����shop_info����������̵�id���̵����ƣ��̵��ַ���绰����
*���سɹ�1��ʧ��0
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
*MySQL��SELECT��ѯ�����������Ĳ���Ϊ����shop_id
*���ز�ѯ�������
*/
	function get_shop_info($shop_id)
	{
		$this->sql = "select * from shop where shop_id = '$shop_id'";		
		$res = $this->mysql->getData($this->sql);
		return $res;
	}
	
}
	 
?>
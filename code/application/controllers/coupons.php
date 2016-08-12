<?php session_start(); 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Coupons extends CI_Controller {

	 function __construct()
	{
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('sae_sql_model','sql_model');
	}
	
	
	
	public function index()
	{
	
		
		redirect('/coupons/create_coupon/');
	}
	
	//��ʾ�����Ż݄�ҳ��
	public function create_coupon()
	{
		$data['base'] = $this->config->item('base_url');  
		$data['css'] = $this->config->item('css');
		$data['create_result'] = null;
		$this->load->view('create_coupon',$data);
			
	}
	
	//�����µ��Ż݄�
	public function handle_create_coupon()
	{
		$data['base'] = $this->config->item('base_url');  
		$data['css'] = $this->config->item('css');
	//	$arr['shop_id'] = $_SESSION['shop_id'];
		$arr['shop_id'] =  2222;
		$arr['start_time'] = $_POST['start_time'];
		$arr['end_time'] = $_POST['end_time'];
		$arr['coupon_content'] = $_POST['coupon_content'];
		$arr['coupons_amount'] = $_POST['coupons_amount'];
		$arr['coupon_price'] = $_POST['coupon_price'];
	
		$filename = 'filename';
		$files = $_FILES[$filename];
		$name= 'Coupons-'.time().'.jpg';
		$form_data =$files['tmp_name'];
		$s2 = new SaeStorage();
		$img = new SaeImage();
		$img_data = file_get_contents($form_data);//��ȡ�����ϴ���ͼƬ����
		$img->setData($img_data);
		$img->resize(200,310); //ͼƬ����Ϊ200*310
		$img->improve();//���ͼƬ�����ĺ���
		$new_data = $img->exec(); // ִ�д������ش����Ķ���������
		$s2->write('coupons',$name,$new_data);//��xxx�޸�Ϊ�Լ���storage ����
		$arr['img_url'] = $s2->getUrl('coupons',$name);//����URL
		
		$res = $this->sql_model->handle_create_coupon($arr);
		$data['create_result'] = $res;
		$this->load->view('create_coupon', $data);
	}

	public function mycoupons()
	{
		//��ʾ�ҵ��Ż݄��б�
//		$account = $_SESSION['account'];
		$account = "admin";
		$mysql = new SaeMysql();
		$sql = "select * from coupons natural join shop where account = '$account'";
		$res = $mysql->getData($sql);
		//Ϊ��ת���Ż݄��б�ҳ��������׼����
		$data['res'] = $res;
		$data['base'] = $this->config->item('base_url');  
		$data['css'] = $this->config->item('css');
		$this->load->view('coupon_list',$data);
	}
	public function coupon_detail($coupon_id){
		//��ʾ�Ż݄�����
		$data['coupon_id'] = $coupon_id;
		$mysql = new SaeMysql();
		$sql = "select * from coupons where coupon_id = $coupon_id";
		$res = $mysql->getLine($sql);
		//Ϊ������ת��ҳ���ṩ����
		$data['base'] = $this->config->item('base_url');  
		$data['css'] = $this->config->item('css');
		$data['res'] = $res;
		$this->load->view('coupon_detail',$data);
	} 
	
	public function del_coupon()
	{
		$coupon_id = $_POST['coupon_id'];
		$mysql = new SaeMysql();
		$sql = "delete from app_ququcoupon.coupons where coupon_id = $coupon_id";
		$res = $mysql->runSql($sql);
		$data['delete_result'] = $res;
		$this->load->view('coupon_list',$data);
	}
	
	
	
	//��ʾ�̵���Ϣҳ��
	public function myinfo()
	{
		//	$shop_id = $_SESSION['shop_id'];
		$shop_id =  2222;
		$data['base'] = $this->config->item('base_url');
		$data['css'] = $this->config->item('css');
		$res = $this->sql_model->get_shop_info($shop_id);
		if($res)
		{
			foreach($res as $item)
			{
				$data['shop_name'] = $item['shop_name'];
				$data['shop_address'] = $item['shop_address'];
				$data['phone_num'] = $item['phone_num'];
			}
		}else{
			$data['shop_name'] = null;
			$data['shop_address'] = null;
			$data['phone_num'] = null;
		}
		$this->load->view('myinfo',$data);
	}
	
	public function set_myinfo()
	{
		//	$shop_id = $_SESSION['shop_id'];
		$shop_id = 2222;
		$shop_info['shop_id'] =  $shop_id;
		$shop_info['shop_name'] = $_POST['shop_name'];
		$shop_info['shop_address'] = $_POST['shop_address'];
		$shop_info['phone_num'] = $_POST['phone_num'];
		$set_result = $this->sql_model->set_shop_info($shop_info);
		if($res == 1)
			$data['set_result'] = 1;
		else if($res == 0)
			$data['set_result'] = 0;
		redirect('/coupons/myinfo');
	}
	
	public function questionnaires()
	{
	}
}
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>user_create</title>
		<link rel="stylesheet" href="../../css/bootstrap.css" />
		
		<style type="text/css">
		body
		{
			font-family: "微软雅黑";
			background-color: #F9F9F9;
		}
		.container
		{
			height: 1000px;
			padding: 90px 0px 0px 0px;
		}
		.nav-right
		{
			height: 500px;
			border-right-style: solid;
			border-right-color: #CFCFCF;
			border-right-width: 3px;
			padding: 0px 0px 0px 185px;
		}
		.btn-active
		{
		    margin-bottom: 15px;
			background-color: #e64746;
			color: #FFFFFF;
			width: 175px;
			font-family: "微软雅黑";
		}
		.btn-mine
		{
			margin-bottom: 15px;
			background-color: #CFCFCF;
			color: #FFFFFF;
			width: 175px;
			font-family: "微软雅黑"
		}
		.btn-red
		{
			background-color: #e64746;
			color: #FFFFFF;
		}	
		.btn-gray
		{
			background-color: #CFCFCF;
			color: #FFFFFF;
		}
		.p-color
		{
			color: #CFCFCF;
			margin-right: 10px;
		}
		.mar-l
		{
			margin-left: 23px;
		}
		.mar-r
		{
			margin-left: 42px;
		}
		</style>
	</head>
	<body>
<?php
	if(isset($delete_result) )
	{
		if($delete_result == 0)
		{
		   echo "<script language=\"javascript\"> ";
		   echo "alert(\"删除失败！\");";
		   echo "</script>";
		}else if($delete_result == 1){
			echo "<script language=\"javascript\"> ";
		   echo "alert(\"删除成功！\");";
		   echo "</script>";
		}
	}
?>
		<div class="container row">
			<div class="col-lg-4 col-md-4">
				<nav class="nav-right">
					<a href="/coupons/create_coupon/" type="button" class="btn btn-mine btn-lg">创建优惠券</a>
					<a type="button" href="/coupons/mycoupons/" class="btn btn-active btn-lg">我的优惠劵</a>
					<a href="/coupons/myinfo/"  type="button" class="btn btn-mine btn-lg">我的信息</button>
					<a href="/coupons/questionnaires/" type="button" class="btn btn-mine btn-lg">我的问卷</a>
				</nav>
			</div>
			<div class="col-lg-8 col-md-8">
				<div class="row">
<?php
if(isset($res))
{
	foreach($res as $item)
	{
?>
					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
							
								<img style="width: 220px;height:140px" src="<?php echo $item['img_url'];?>" data-src="holder.js/300x300" alt="...">
						
							<div class="caption">
								<p align="center"><?php  
									if(strlen($item['coupon_content']) > 20) 
										echo substr($item['coupon_content'],0,20)."...";
									else 
										echo $item['coupon_content'];
									?></p>
								<p align="center"><span class="p-color">截止日期：</span><?php echo $item['end_time'];?></p>
								<p>
									<a href="<?php echo "/coupons/coupon_detail/".$item['coupon_id'];?>" class="btn btn-red mar-l" role="button">详情</a> 
									<a href="<?php echo "/coupons/del_coupon/".$item['coupon_id'];?>" class="btn btn-gray mar-r" role="button">删除</a>
								</p>
							</div>
						</div>
					</div><!--1-->
<?php 
	}
}
?>				
				

				  
				</div>
			</div>
		</div><!--container-->
	</body>
</html>

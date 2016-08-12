<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>user_info</title>
		<base href="<?php echo"$base";?>">  
		<link rel="stylesheet"  href="<?php echo"$base/$css";?>">
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
		.btn-save
		{
			background-color: #CFCFCF;
			color: #FFFFFF;
			width: 120px;
			margin-top: 20px;
		}
		.form-horizontal
		{
			padding-top: 55px;
		}
		.input-group-addon
		{
			background-color: #CFCFCF;
			color: #FFFFFF;
		}
		</style>
	</head>
	<body>
	<?php
	if(isset($set_result))
	{
		if($set_result == 0)
		{
		   echo "<script language=\"javascript\"> ";
		   echo "alert(\"设置失败！\");";
		   echo "</script>";
		}else if($set_result == 1)
		{
			echo "<script language=\"javascript\"> ";
		   echo "alert(\"设置成功！\");";
		   echo "</script>";
		}
	}
?>
		<div class="container row">
			<div class="col-lg-4 col-md-4">
				<nav class="nav-right">
					<a href="/coupons/create_coupon"type="button" class="btn btn-mine btn-lg">创建优惠券</a>
					<a href="/coupons/mycoupons/" type="button" class="btn btn-mine btn-lg">我的优惠劵</a>
					<a type="button" class="btn btn-active btn-lg">我的信息</button>
					<a href="user_que.html" type="button" class="btn btn-mine btn-lg">我的问卷</a>
				</nav>
			</div>
			<div class="col-lg-8 col-md-8">
				<form class="form-horizontal" role="form" method="post" action="/coupons/set_myinfo">
					<div class="form-group">
						<label class="col-sm-3 control-label">商家名称：</label>
    					<div class="col-sm-3">
      						<div class="input-group input-group-sm">
 								<input type="text"  name ="shop_name" class="form-control" value="<?php echo $shop_name?>">
 								<span class="input-group-addon glyphicon glyphicon-list-alt"></span>
							</div>
    					</div><!--col-sm-3-->
  					</div><!--form-group-->
  					<div class="form-group">
						<label class="col-sm-3 control-label">商家地址：</label>
    					<div class="col-sm-3">
      						<div class="input-group input-group-sm">
 								<input type="text" name ="shop_address"  class="form-control" value="<?php echo $shop_address?>">
 								<span class="input-group-addon glyphicon glyphicon-flag"></span>
							</div>
    					</div><!--col-sm-3-->
  					</div><!--form-group-->
  					<div class="form-group">
						<label class="col-sm-3 control-label">商家电话：</label>
    					<div class="col-sm-3">
      						<div class="input-group input-group-sm">
 								<input type="text"  name ="phone_num" class="form-control" value="<?php echo $phone_num?>">
 								<span class="input-group-addon glyphicon glyphicon-phone-alt"></span>
							</div>
    					</div><!--col-sm-3-->
  					</div><!--form-group-->
  					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
    					<div class="col-sm-6">
      						<button type="submit"  class="btn btn-sm btn-save">保存</button>
    					</div><!--col-sm-6-->
  					</div><!--form-group-->
				</form>	
			</div>
		</div><!--container-->
	</body>
</html>

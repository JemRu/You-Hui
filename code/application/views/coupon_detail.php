<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<base href="<?php echo"$base";?>">  
		<link rel="stylesheet"  href="<?php echo"$base/$css";?>">
		<title>detail</title>
		<style type="text/css">
		.list-size
		{
			margin-right: 30px;
			margin-left: 80px;
			width: 160px;
		}
		.form-size
		{
			padding-right: 65px;
			padding-top: 30px;
			width: 700px;
		}
		.c-name
		{
			margin-left: 535px;
			font-size: 20px;
		}		
		</style>
        <script src="<?php echo $base."/js/bootstrap.min.js"?>"></script>
	</head>
	<body>
		<div class="container background">
			<div class="list-group list-size col-sm-4">
			  	<a href="/coupons/create_coupons" class="list-group-item">创建优惠券</a>
			  	<a class="list-group-item active">我的优惠券</a>
			  	<a href="/coupons/myinfo/" class="list-group-item">我的信息</a>
			</div><!--list-group list-size col-sm-4-->
			<form class="form-horizontal" role="form">
				<div class="form-horizontal form-size panel panel-default col-sm-8">
					<span class="c-name"><a href="information.html">公司名称</a></span>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label text-primary">开始日期：</label>
						<div class="col-sm-3">
							<p><?php echo $res['start_time'];?></p>
						</div><!--col-sm-3-->
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label text-primary">结束日期：</label>
						<div class="col-sm-3">
							<p><?php echo $res['end_time'];?></p>
						</div><!--col-sm-3-->
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label text-primary">活动内容：</label>
						<div class="col-sm-9">
							<p><?php echo $res['coupon_content'];?></p>
						</div><!--col-sm-9-->
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label text-primary">优惠券数量:</label>
						<div class="col-sm-3">	
							<p><?php echo $res['coupons_amount']."张";?></p>
						</div><!--col-sm3-->
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label text-primary">优惠价格：</label>
						<div class="col-sm-3">
							<p><?php echo $res['favourable_price']."元";?></p>					
						</div><!--col-sm-3-->
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label text-primary">附加条件</label>
						<div class="col-sm-6">
							<label class="checkbox-inline">
							    <input type="checkbox" id="inlineCheckbox1" value="option1" checked> 获得顾客电话
							</label>
							<label class="checkbox-inline">
							    <input type="checkbox" id="inlineCheckbox2" value="option2" checked> 获得顾客邮箱
							</label>
						</div><!--col-sm-6-->
					</div><!--form-group-->
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label text-primary">已添加图片</label>
						<div class="col-sm-3">
							<img src="<?php echo $res['img_url'];?>" id="add" style="width: 50px;height: 50px;">
						</div><!--col-sm-3-->
					</div><!--form-group-->
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<div class="but-group">
					    		<button type="button" class="btn btn-info" style="width: 80px;"><a href="/coupons/mycoupons/">返回</a></button>
								<button type="button" class="btn btn-warning" style="width: 80px;">删除</button>
					    	</div><!--but-gro-->
						</div><!--col-sm-offset-3 col-sm-9-->
					</div><!--form-group-->
				</div>
			</form>
		</div><!--container-->
	</body>
</html>
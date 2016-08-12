<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<base href="<?php echo"$base";?>">  
		<link rel="stylesheet"  href="<?php echo"$base/$css";?>">
		<link rel="stylesheet" href="../../css/bootstrap.css" />
		<link rel="stylesheet" href="../../css/bootstrap-datetimepicker.css" />
		<title>优惠劵</title>
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
		.btn-add
		{
			color: #FFFFFF;
			background-color: #CFCFCF;
		}
		.btn-creat
		{
			color: #FFFFFF;
			background-color: #E64746;
			width: 95px;
			margin-right: 15px;
		}
		.btn-giveup
		{
			color: #FFFFFF;
			background-color: #ec6c20;
			width: 95px;
		}
		.input-group-addon
		{
			background-color: #CFCFCF;
			color: #FFFFFF;
		}
		.date
		{
			width: 150px;
		}
		</style>
	</head>
	<body>
	<?php
	if(isset($create_result))
	{
		if($create_result == 0)
		{
		   echo "<script language=\"javascript\"> ";
		   echo "alert(\"创建失败！\");";
		   echo "</script>";
		}else if($create_result == 1){
			echo "<script language=\"javascript\"> ";
		   echo "alert(\"创建成功！\");";
		   echo "</script>";
		}
	}
?>
		<div class="container row">
			<div class="col-lg-4 col-md-4">
				<nav class="nav-right">
					<a type="button" class="btn btn-active btn-lg">创建优惠券</a>
					<a href="/coupons/mycoupons/"  type="button" class="btn btn-mine btn-lg">我的优惠劵</a>
					<a href="/coupons/myinfo/"  type="button" class="btn btn-mine btn-lg">我的信息</button>
					<a href="user_que.html" type="button" class="btn btn-mine btn-lg">我的问卷</a>
				</nav>
			</div><!--col-lg-4 col-md-4-->
			<div class="col-lg-8 col-md-8">
				<form class="form-horizontal" role="form"  action="/coupons/handle_create_coupon" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-sm-3 control-label">开始日期</label> 
    					<div class="col-sm-3">
      		
                				<div class="input-group input-group-sm date form_date1" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    				<input class="form-control" name="start_time"  size="16" type="text" value="" id="pass1"  required>
                    				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                				</div>
								
    
    					</div><!--col-sm-3-->
  					</div><!--form-group-->
  					<div class="form-group">
						<label class="col-sm-3 control-label">截止日期</label>
    					<div class="col-sm-3">
      						
                				<div class="input-group input-group-sm date form_date2" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    				<input class="form-control"  name="end_time"  size="16" type="text" value="" required>
                    				<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                				</div>
								
           					
    					</div><!--col-sm-3-->
  					</div><!--form-group-->
  					<div class="form-group">
						<label class="col-sm-3 control-label">活动内容</label>
    					<div class="col-sm-7">
      						<textarea class="form-control" name ="coupon_content" rows="8" value="" required></textarea>
    					</div><!--col-sm-10-->
  					</div><!--form-group-->
  					<div class="form-group">
						<label class="col-sm-3 control-label">优惠卷数量</label>
    					<div class="col-sm-2">
      						<div class="input-group input-group-sm">
 								<input type="text" name="coupons_amount" class="form-control" required>
								<span class="input-group-addon">张</span>
							</div>
    					</div><!--col-sm-2-->
  					</div><!--form-group-->
					<div class="form-group">
						<label class="col-sm-3 control-label">原价</label>
    					<div class="col-sm-2">
      						<div class="input-group input-group-sm">
 								<input type="text" name="original_price" class="form-control" required>
								<span class="input-group-addon">元</span>
							</div>
    					</div><!--col-sm-2-->
  					</div><!--form-group-->
  					<div class="form-group">
						<label class="col-sm-3 control-label">优惠价格</label>
    					<div class="col-sm-2">
      						<div class="input-group input-group-sm">
 								<input type="text" name="favourable_price" class="form-control" required>
								<span class="input-group-addon">元</span>
							</div>
    					</div><!--col-sm-2-->
  					</div><!--form-group-->
  					<div class="form-group">
						<label class="col-sm-3 control-label">附加条件</label>
    					<div class="col-sm-3">
      						<div class="radio">
						        <label>
						        	<input type="radio">添加调查问卷	
						        </label>
					      	</div>
    					</div><!--col-sm-3-->
  					</div><!--form-group-->
  					<div class="form-group">
						<label class="col-sm-3 control-label">添加图片</label>
    					<div class="col-sm-3">
      						<input  class="btn-add" type="file" name="filename" required></input>
    					</div><!--col-sm-3-->
  					</div><!--form-group-->
  					<div class="form-group">
						<label class="col-sm-3 control-label"></label>
    					<div class="col-sm-6">
      						<button type="submit"  class="btn btn-creat">创建</button>
      						<button type="button" class="btn btn-giveup">丢弃</button>
    					</div><!--col-sm-6-->
  					</div><!--form-group-->
  				</form>	
			</div><!--col-lg-8 col-md-8-->
		</div><!--container-->
		<script type="text/javascript" src="../js/jquery-1.8.3.min.js" charset="UTF-8"></script>
		<script type="text/javascript" src="../js/bootstrap.js"></script>
		<script type="text/javascript" src="../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
		<script type="text/javascript" src="../js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
		<script type="text/javascript">
			  
		
			$('.form_date1').datetimepicker({
		        language:  'fr',
		        weekStart: 1,
		        todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0
		    });
		    
		    $('.form_date2').datetimepicker({
		        language:  'fr',
		        weekStart: 1,
		        todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0
		    });
		
		</script>
	</body>
</html>

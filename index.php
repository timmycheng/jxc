<?php
session_start();

if(!isset($_SESSION['passwd'])){
	header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>JXC</title>
	<link rel="stylesheet" href="css/pintuer.css">
	<script src="js/jquery.1.11.min.js"></script>
	<script src="js/pintuer.js"></script>
	<script src="js/respond.js"></script>
	<script src="js/page.js"></script>
</head>
<body>
	<div class="container padding-big-top padding-big-bottom">
		<!-- header -->
		<div class="line">
			<div class="x9">
				<h1>JXC</h1>
			</div>
			<div class="x3 padding-top">
				<div id="log" class="text-right">
					<input type="button" value="注销" class="button button-little" id="logout">
				</div><!-- log end -->
			</div>
			<div class="x12">
				<hr/>
			</div>
		</div><!-- header end -->

		<!-- main content -->
		<div class="line-middle">
			<div class="x3">
				<!-- add orders -->
				<div id="add-ord">
					<form action="source/add-ord.php" method="post" id="add-ord-form" class="form-auto">
						<div class="form-group">
							<div class="field">
								<label for="order-date">日期：</label>
								<input type="date" name="order-date" id="order-date" class="input" data-validate="required:必填">
							</div>
						</div>
						<div class="form-group">
							<label for="ord-name">名称：</label>
							<select name="ord-name" id="ord-name"  class="input">		
							</select>
						</div>
						<div class="form-group">
							<label for="ord-cate">类型：</label>
							<select name="ord-cate" id="ord-cate"  class="input">
								<option value="1">订单</option>
								<option value="2">出库</option>
								<option value="3">盘点</option>
							</select>
						</div>
						<div class="form-group">
							<div class="field">
								<label for="ord-num">数量：</label>
								<input type="text" name="ord-num" id="ord-num" class="input" data-validate="required:必填,number:年龄只能填写数字">
							</div>
						</div>
						<div class="form-group">
							<label for="ord-price">金额：</label>
							<input type="text" name="ord-price" id="ord-price" class="input">
						</div>
						<div class="form-group">
							<label for="ord-com">备注：</label>
							<textarea name="ord-com" id="ord-com" cols="30" rows="5" class="input"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="增加" class="button">
							<input type="reset" value="重置" class="button form-reset">
						</div>
					</form>
				</div>
				<!-- add orders end -->
				
				<hr>

				<!-- add products -->
				<div id="add-pro">
					<form action="source/add-pro.php" method="post" id="add-pro-form" class="form-auto">
						<div class="form-group">
							<label for="pro-name">名称：</label>
							<input type="text" name="pro-name" id="pro-name" class="input">
						</div>
						<div class="form-group">
							<label for="pro-price">单价：</label>
							<input type="text" name="pro-price" id="pro-price" class="input">
						</div>
						<div class="form-group">
							<label for="pro-num">初始数量：</label>
							<input type="text" name="pro-num" id="pro-num" class="input">
						</div>
						<div class="form-group">
							<input type="submit" value="增加" class="button">
						</div>
					</form>
				</div>
				<!-- add products end -->
			</div>
			<div class="x6">
				<!-- list orders -->
				<div id="list-ord">
					
				</div>
				<!-- list orders end -->
			</div>
			<div class="x3">
				<!-- list products -->
				<div id="list-pro">
					
				</div>
				<!-- list products end -->
			</div>
		</div>
		<!-- main content end -->


	</div><!-- container end -->
</body>
</html>
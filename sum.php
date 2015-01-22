<?php
session_start();

if(!isset($_SESSION['passwd'])){
	header('Location:login.php');
}
if($_SESSION['type']=='sale'){
	header('Location:sell.php');
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
			<div class="x6">
				
			</div>
			<div class="x6">
				
			</div>
		</div>
		<!-- main content end -->


	</div><!-- container end -->
</body>
</html>
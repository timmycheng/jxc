<?php 
session_start();
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
	<div class="container">
		<div id="header">
			<div class="keypoint bg text-center">
				<h1>JXC</h1>
				<form class="form-auto" id="login-form" method="post" action="source/login.php">
					<div class="form-group">
						<input type="password" name="passwd" id="passwd" class="input">
						<input type="submit" value="确定" class="button">
					</div>
				</form>
			</div>
			
		</div>
		<!-- login-prevent abuse -->
		
		<!-- login-end -->
	</div>
</body>
</html>
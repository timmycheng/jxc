<?php

include 'db_connect.php';

session_start();

if (!isset($_SESSION['passwd'])) {

	$password=md5(stripcslashes(trim($_POST['passwd'])));
	if("21232f297a57a5a743894a0e4a801fc3"==$password){
		echo "admin";
		$_SESSION['type']="admin";
	}elseif ("8325324b47e1e62a1c2998a640cbdc72"==$password) {
		echo "sale";
		$_SESSION['type']="sale";
	}
	$_SESSION['passwd']=$password;
}else
{
	session_destroy();
	echo "out";
}

// header('Location:../index.php');

?>
<?php

include 'db_connect.php';

session_start();

if (!isset($_SESSION['passwd'])) {

	$password=md5(stripcslashes(trim($_POST['passwd'])));
	if("202cb962ac59075b964b07152d234b70"==$password){
		$_SESSION['passwd']=$password;
		echo "in";
	}

}else
{
	session_destroy();
	echo "out";
}

// header('Location:../index.php');

?>
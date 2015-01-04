<?php
include_once 'db_connect.php';

$name=$_POST['pro-name'];
$num=$_POST['pro-num'];
$price=$_POST['pro-price'];

db_connect();


// echo $date.$name.$cate.$num.$price.$com;

$sql="insert into pro3_jxc_products values (null,'$name',$num,$price)";

$ret=mysql_query($sql) or die("Invalid query: " . mysql_error());

echo mysql_affected_rows();
?>
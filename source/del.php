<?php
include_once 'db_connect.php';

// $date=$_POST['order-date'];
// $name=$_POST['ord-name'];
// $cate=$_POST['ord-cate'];
// $num=$_POST['ord-num'];
// $price=$_POST['ord-price'];
// $com=$_POST['ord-com'];
$id=$_GET['id'];
// $type=$_GET['type'];

db_connect();

$sql="delete from pro3_jxc_orders where id=$id";
// $price==''?$price=0:$price;
// echo $date.$name.$cate.$num.$price.$com;

// $sql="insert into pro3_jxc_orders values (null,'$date',$name,$cate,$num,$price,'$com',null)";

echo $sql;

$ret=mysql_query($sql) or die("Invalid query: " . mysql_error());

echo mysql_affected_rows();
?>
<?php
session_start();
include 'db_connect.php';
$type=$_GET['type'];
// $user=$_SESSION['type'];
// $month=$_GET['month'];
db_connect();

$sql1="
select 
DATE_FORMAT(date,'%Y-%m') yearmonth,
sum(price) sumprice
from pro3_jxc_orders
group by DATE_FORMAT(date,'%Y-%m');
";

$sql2="
select 
DATE_FORMAT(a.date,'%Y-%m') date,
b.`name`,
sum(a.num) sum,
sum(a.price) price
from pro3_jxc_orders a
left join pro3_jxc_products b on a.pro_id=b.id
where cate=1
group by b.name,DATE_FORMAT(a.date,'%Y-%m')
";

if ($type=='1') {
	$ret=mysql_query($sql1);

	echo "<table class='table'>";
    echo "	<tr>";
    echo "		<th>月份</th>";
    echo "		<th>金额</th>";
    echo "	</tr>";
    while ($row=mysql_fetch_array($ret)) {
    	echo "<tr><td>";
    	echo $row['yearmonth'];
    	echo "</td><td>";
    	echo $row['sumprice'];
    	echo "</td></tr>";
    }

}elseif ($type=='2') {
	$ret=mysql_query($sql2);
	echo "<table class='table'>";
	echo "	<tr>";
	echo "		<th>月份</th>";
	echo "		<th>品名</th>";
	echo "		<th>数量</th>";
	echo "		<th>金额</th>";
	echo "	</tr>";
	while ($row=mysql_fetch_array($ret)) {
		echo "<tr><td>";
		echo $row['date'];
		echo "</td><td>";
		echo $row['name'];
		echo "</td><td>";
		echo $row['sum'];
		echo "</td><td>";
		echo $row['price'];
		echo "</td></tr>";
	}

}

// echo is_int($action);

// if ($type=="pro") {

// 	$sql="
// 	select 
// 	a.id,
// 	a.`name`,
// 	IFNULL(SUM(case when b.cate<>3 then b.num else 0 end),0) sell,
// 	IFNULL(SUM(case when b.cate=3 then b.num else 0 end),0) buy,
// 	a.num+IFNULL(SUM(case when b.cate=3 then b.num else 0 end),0)-IFNULL(SUM(case when b.cate<>3 then b.num else 0 end),0) num
// 	from pro3_jxc_products a 
// 	left join pro3_jxc_orders b on a.id=b.pro_id
// 	group by a.id,a.`name`,a.num
// 	";
// 	$ret=mysql_query($sql);

// 	echo "<table class='table'>";
// 	echo "	<tr>";
// 	echo "		<th>商品</th>";
// 	echo "		<th>已出</th>";
// 	echo "		<th>已入</th>";
// 	echo "		<th>库存</th>";
// 	echo "	</tr>";
// 	while ($row=mysql_fetch_array($ret)) {
// 		echo "<tr><td>";
// 		echo $row['name'];
// 		echo "</td><td>";
// 		echo $row['sell'];
// 		echo "</td><td>";
// 		echo $row['buy'];
// 		echo "</td><td>";
// 		echo $row['num'];
// 		echo "</td></tr>";
// 	}

// }elseif ($type=='ord') {
	
// 	$sql="
// 	select
// 	date,
// 	case cate when 1 then '订单'
// 			  when 2 then '出库'
// 			  when 3 then '盘点'
// 	end cate,
// 	name,
// 	a.num,
// 	ifnull(a.price,0) price,
// 	comment,
// 	flg,
// 	a.id,
// 	a.user
// 	from pro3_jxc_orders a
// 	left join pro3_jxc_products b on a.pro_id=b.id
// 	";
// 	$user=='sale'?$sql=$sql."where a.user='$user'":$sql;
// 	$ret=mysql_query($sql);

// 	echo "<table class='table'>";
// 	echo "	<tr>";
// 	echo "		<th>日期</th>";
// 	echo "		<th>分类</th>";
// 	echo "		<th>商品</th>";
// 	echo "		<th>数量</th>";
// 	echo "		<th>金额</th>";
// 	echo "		<th>备注</th>";
// 	echo "		<th>确认/删除</th>";
// 	echo "	</tr>";
// 	while ($row=mysql_fetch_array($ret)) {
// 		if ($row['flg']==1) {
// 			echo "<tr class='blue'>";
// 		}else{
// 			echo "<tr>";
// 		}
// 		echo "<td>";
// 		echo $row['date'];
// 		echo "</td><td>";
// 		echo $row['cate'];
// 		echo "</td><td>";
// 		echo $row['name'];
// 		echo "</td><td>";
// 		echo $row['num'];
// 		echo "</td><td>";
// 		echo $row['price'];
// 		echo "</td><td>";
// 		echo $row['comment'];
// 		echo "</td><td>";
// 		if ($row['flg']==0) {
// 			echo "<a href='source/update.php?type=1&id=".$row['id']."' id='upd'><span class='icon-circle-o'></span></a>";
// 		}else{
// 			echo "<a href='source/update.php?type=0&id=".$row['id']."' id='upd'><span class='icon-check-circle-o'></span></a>";
// 		}
// 		echo "   / <a href='source/del.php?id=".$row['id']."' id='del'><span class='icon-times'></span></a>";

// 		if ($_SESSION['type']=='admin' && $row['user']!='admin') {
// 			echo "   /  <span class='icon-asterisk'></span>";
// 		}

// 		echo "</td></tr>";

// 	}
// 	echo "</table>";

// }elseif ($type=='pro-list') {

// 	$ret_arr=array();
	
// 	$sql="select distinct id,name from pro3_jxc_products";
// 	$ret=mysql_query($sql);
// 	while($row=mysql_fetch_array($ret)){
// 		array_push($ret_arr, $row);
// 	}
// 	echo json_encode($ret_arr);
// }

?>
<?php
include 'db_connect.php';
$type=$_GET['type'];
db_connect();

// echo is_int($action);

if ($type=="pro") {

	$sql="
	select 
	a.id,
	a.`name`,
	ifnull(sum(b.num),0) sell,
	a.num-ifnull(sum(b.num),0) num
	from pro3_jxc_products a
	left join pro3_jxc_orders b on a.id=b.pro_id
	group by a.id,a.`name`,a.num
	";
	$ret=mysql_query($sql);

	echo "<table class='table'>";
	echo "	<tr>";
	echo "		<th>商品</th>";
	echo "		<th>已出</th>";
	echo "		<th>库存</th>";
	echo "	</tr>";
	while ($row=mysql_fetch_array($ret)) {
		echo "<tr><td>";
		echo $row['name'];
		echo "</td><td>";
		echo $row['sell'];
		echo "</td><td>";
		echo $row['num'];
		echo "</td></tr>";
	}

}elseif ($type=='ord') {
	
	$sql="
	select
	date,
	case cate when 1 then '订单'
			  when 2 then '出库'
			  when 3 then '盘点'
	end cate,
	name,
	a.num,
	ifnull(a.price,0) price,
	comment
	from pro3_jxc_orders a
	left join pro3_jxc_products b on a.pro_id=b.id
	";
	$ret=mysql_query($sql);

	echo "<table class='table'>";
	echo "	<tr>";
	echo "		<th>日期</th>";
	echo "		<th>分类</th>";
	echo "		<th>商品</th>";
	echo "		<th>数量</th>";
	echo "		<th>金额</th>";
	echo "		<th>备注</th>";
	echo "	</tr>";
	while ($row=mysql_fetch_array($ret)) {
		echo "<tr><td>";
		echo $row['date'];
		echo "</td><td>";
		echo $row['cate'];
		echo "</td><td>";
		echo $row['name'];
		echo "</td><td>";
		echo $row['num'];
		echo "</td><td>";
		echo $row['price'];
		echo "</td><td>";
		echo $row['comment'];
		echo "</td></tr>";

	}
	echo "</table>";

}elseif ($type=='pro-list') {

	$ret_arr=array();
	
	$sql="select distinct id,name from pro3_jxc_products";
	$ret=mysql_query($sql);
	while($row=mysql_fetch_array($ret)){
		array_push($ret_arr, $row);
	}
	echo json_encode($ret_arr);
}

?>
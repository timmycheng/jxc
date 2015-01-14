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
	IFNULL(SUM(case when b.cate<>3 then b.num else 0 end),0) sell,
	IFNULL(SUM(case when b.cate=3 then b.num else 0 end),0) buy,
	a.num+IFNULL(SUM(case when b.cate=3 then b.num else 0 end),0)-IFNULL(SUM(case when b.cate<>3 then b.num else 0 end),0) num
	from pro3_jxc_products a 
	left join pro3_jxc_orders b on a.id=b.pro_id
	group by a.id,a.`name`,a.num
	";
	$ret=mysql_query($sql);

	echo "<table class='table'>";
	echo "	<tr>";
	echo "		<th>商品</th>";
	echo "		<th>已出</th>";
	echo "		<th>已入</th>";
	echo "		<th>库存</th>";
	echo "	</tr>";
	while ($row=mysql_fetch_array($ret)) {
		echo "<tr><td>";
		echo $row['name'];
		echo "</td><td>";
		echo $row['sell'];
		echo "</td><td>";
		echo $row['buy'];
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
	comment,
	flg,
	a.id
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
	echo "		<th>确认</th>";
	echo "	</tr>";
	while ($row=mysql_fetch_array($ret)) {
		if ($row['flg']==1) {
			echo "<tr class='blue'>";
		}else{
			echo "<tr>";
		}
		echo "<td>";
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
		echo "</td><td>";
		if ($row['flg']==0) {
			echo "<a href='source/update.php?type=1&id=".$row['id']."' id='upd'><span class='icon-check'></span></a>";
		}else{
			echo "<a href='source/update.php?type=0&id=".$row['id']."' id='upd'><span class='icon-times'></span></a>";
		}
		
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
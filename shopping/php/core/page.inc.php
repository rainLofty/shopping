<?php
require_once 'mysql.func.php';

//获取该数据多少条,参数：计算那个表的数据
function getTotalData($table){
    $sql="select * from {$table}";
    $totalData=getResultNum($sql);
	return $totalData;
}
//获取多少页的数据,参数：page:当前页码数   pageSize:每页数据条数    
function getDataByPage($table,$page,$pageSize){
	$sql="select * from {$table}";
	global $totalRows;
	$totalRows=getResultNum($sql);
	global $totalPage;
	$totalPage=ceil($totalRows/$pageSize);
	if($page<1||$page==null||!is_numeric($page)){
		$page=1;
	}
	if($page>=$totalPage)$page=$totalPage;
	$offset=($page-1)*$pageSize;
	$sql="select * from {$table} limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);
	return $rows;
}



?>
<?php
//链接数据库
function connect(){
	$link=mysql_connect(DB_HOST,DB_USER,DB_PWD) or die("数据库连接失败Error:".mysql_errno().":".mysql_error());
	mysql_set_charset(DB_CHARSET);
    mysql_select_db(DB_DBNAME) or die("指定数据库打开失败");
	return $link;
}

/**
 * @desc:插入数据
 * @param $table  表名
 * @param $array  数据
 * @return: 返回id
 */
function insert($table,$array){
	$keys=join(",",array_keys($array));
	$vals="'".join("','",array_values($array))."'";
	$sql="insert {$table}($keys) values({$vals})";
	mysql_query($sql);
	return mysql_insert_id();
}
/**
 * @desc: 更新数据
 * @param $table 表名 
 * @param $array 数据 
 * @param $where 条件 可选参数
 * @return: 返回受影响的条数
 */
function update($table,$array,$where=null){
	$str = '';
	foreach($array as $key=>$val){
		if($str==''){
			$sep="";
		}else{
			$sep=",";
		}
		$str.=$sep.$key."='".$val."'";
	}
		$sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
		$result=mysql_query($sql);
		
		if($result){
			return mysql_affected_rows();
		}else{
			return false;
		}
}
/**
 * @desc: 删除数据
 * @param $table 表名 
 * @param $where 条件 可选参数
 * @return: 返回受影响的条数
 */
function delete($table,$where=null){
	$where=$where==null?null:" where ".$where;
	$sql="delete from {$table} {$where}";
	mysql_query($sql);
	return mysql_affected_rows();
}
/**
 * @desc: 得到指定一条记录
 * @param $sql sql语句 
 * @return:  返回该条数据
 */
function fetchOne($sql,$result_type=MYSQL_ASSOC){
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result,$result_type);
	return $row;
}

/**
 * @desc: 得到结果集中所有记录
 * @param  $sql sql语句 
 * @return: 返回所有数据
 */
function fetchAll($sql,$result_type=MYSQL_ASSOC){
	$result=mysql_query($sql);
	while(@$row=mysql_fetch_array($result,$result_type)){
		$rows[]=$row;
	}
	return $rows;
}

/**
 * @desc: 获取结果的条数
 * @param $sql sql语句
 * @return: 返回数量
 */
function getResultNum($sql){
	$result=mysql_query($sql);
	return mysql_num_rows($result);
}

/**
 * @desc: 得到上一步插入记录的ID号
 * @return: 
 */
function getInsertId(){
	return mysql_insert_id();
}



?>
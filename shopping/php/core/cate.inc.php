<?php
/**
 * 添加分类的操作
 * @return string
 */
function addCate(){
	$arr=$_POST;
	if(insert("cate",$arr)){
		returnWeb(1,'添加成功');
	}else{
		returnWeb(0,'添加成功');
	}
}
/**
 * 得到所有分类
 * @return array
 */
function getAllCate(){
	$sql="select id,cName from cate order by id ";
	$rows=fetchAll($sql);
    if($rows){
        returnWeb(1,'获取列表成功',$rows);
    }else{
        returnWeb(0,'没有分类,请添加');
    }
}

/**
 * 修改分类的操作
 * @param string $where
 * @return string
 */
function editCate($where){
	$arr=$_POST;
	if(update("cate", $arr,$where)){
		returnWeb(1,'修改成功');
	}else{
		returnWeb(0,'修改失败');
	}
}


/**
 * 根据ID得到指定分类信息
 * @param int $id
 * @return array
 */
function getCateById($id){
	$sql="select id,cName from cate where id={$id}";
    $row=fetchOne($sql);
    if($row){
        returnWeb(1,'获取成功',$row);
    }else{
        returnWeb(0,'获取失败');
    }
}

/**
 *删除分类
 * @param string $where
 * @return string
 */
function delCate($id){
	$where="id=".$id;
    if(delete("cate",$where)){
        returnWeb(1,'删除成功');
    }else{
        returnWeb(0,'删除失败');
    }
}
/**
 *根据分类id获取该分类名称
 * @param string $where
 * @return string
 */
function getCateNameBycId($cId){
    $sql="select id from cate where id={$cId}";
    $row=fetchOne($sql);
    if($row){
        return $row['cName'];
    }else{
        return '';
    }
}











?>
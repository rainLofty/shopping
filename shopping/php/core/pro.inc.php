<?php
/**
 * 添加商品
 * @return string
 * uploads 是上传的源文件    
 */
function addPro(){
	$arr=$_POST;
	$arr['pubTime']=date('Y-m-d', time());
	$path="../uploads";
	$uploadFiles=uploadFile($path);
	$isGoon =  is_array($uploadFiles)&&$uploadFiles;
	if($isGoon){
		foreach($uploadFiles as $key=>$uploadFile){
			if($uploadFile['error'] == 0){
				thumb($path."/".$uploadFile['name'],"../image_60/".$uploadFile['name'],60,60);

				thumb($path."/".$uploadFile['name'],"../image_420/".$uploadFile['name'],420,420);
			}
		}
	}
	$res=insert("product",$arr);
	$pid=getInsertId();
	if($res&&$pid){
		foreach($uploadFiles as $uploadFile){
			if($uploadFile['error'] == 0){
				$arr1['pid']=$pid;
				$arr1['albumPath']=$uploadFile['name'];
				addAlbum($arr1);
			}
		}
		$mes="<p>添加成功!</p><a href='javascript:history.back();'>返回</a>";
	}else{
		foreach($uploadFiles as $uploadFile){
			if($uploadFile['error'] == 0){
				$file1 = "../image_60/".$uploadFile['name'];
				if(file_exists($file1)){
					unlink($file1);
				}
				$file2 = "../image_420/".$uploadFile['name'];
				if(file_exists($file2)){
					unlink($file2);
				}
			}
		}
		$mes="<p>添加失败!</p><a href='javascript:history.back();'>返回</a>";
	}
	echo $mes;
	return $mes;
}
/*获取所有商品*/
function getPros($where){
	$sql="select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from product as p join cate c on p.cId=c.id ".$where;
	
	$result=mysql_query($sql);
	while(@$row=mysql_fetch_array($result,MYSQL_ASSOC)){
		$re = fetchOne("select * from album where Pid=".$row['id']." limit 1");
		$row['albumPath']='http://192.168.1.67/shopping/image_60/'.$re['albumPath'];
		$rows[]=$row;
	}
	if($rows){
        returnWeb(1,'获取列表成功',$rows);
    }else{
        returnWeb(0,'没有商品,请添加');
    }
}
/*上架*/
function upPro($id){
	$where="id={$id}";
	$arr =  [
        'isShow' => 1
    ];
	if(update("product",$arr,$where)){
		returnWeb(1,'上架成功');
	}else{
		returnWeb(0,'上架失败');
	}
}
/*下架*/
function downPro($id){
	$where="id={$id}";
	$arr =  [
        'isShow' => 0
    ];
	if(update("product",$arr,$where)){
		returnWeb(1,'下架成功');
	}else{
		returnWeb(0,'下架失败');
	}
}
/*删除商品*/
function delPro($id){
	$where="id={$id}";
	$res=delete("product",$where);
	$proImgs=getAllImgByProId($id);
	
	$where1="pid={$id}";
	$res1=delete("album",$where1);
	if($res&&$res1){
		if($proImgs&&is_array($proImgs)){
			foreach($proImgs as $proImg){
				if(file_exists("../uploads/".$proImg['albumPath'])){
					unlink("../uploads/".$proImg['albumPath']);
				}
				if(file_exists("../image_60/".$proImg['albumPath'])){
					unlink("../image_60/".$proImg['albumPath']);
				}
				if(file_exists("../image_420/".$proImg['albumPath'])){
					unlink("../image_420/".$proImg['albumPath']);
				}
			}
		}
		returnWeb(1,'删除成功');
	}else{
		returnWeb(0,'删除失败');
	}
}
/**
 *根据商品id得到商品图片
 */
function getAllImgByProId($id){
	$sql="select a.albumPath from album a where pid={$id}";
	$rows=fetchAll($sql);
	return $rows;
}
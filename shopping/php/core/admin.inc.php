<?php
/**
 * @desc: 检查管理员是否存在
 * @param $username 用户名 
 * @param $password  密码 
 * @return: 
 */
function checkAdmin($username,$password){
    $sql="select * from admin where username='{$username}' and password='{$password}'";
    $row = fetchOne($sql);
    return $row;
}
/**
 * @description: 检测是否有管理员登陆,用途：如果没有登录的话需要回到登录页
 * @param {type} 
 * @return: 登录成功返回1  没有登录返回0
 */
function checkLogined(){
    if(isset($_SESSION['adminId'])){
        if($_SESSION['adminId']==""){
            returnWeb(0,'请登录');
        }else{
            returnWeb(1,'',['username' => $_SESSION['adminName']]);
        }
    }else{
        returnWeb(0,'请登录');
    }
}
/**
 * 注销管理员
 */
function logout(){
    $_SESSION=array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),"",time()-1);
    }
    session_destroy();
	returnWeb(1,'注销成功');
}
/**
 * 添加管理员
 */
function addAdmin(){
	$arr=$_POST;
	$username = $_POST['username'];
	$email = $_POST['email'];
	$isHaveUsername = getResultNum("select * from admin where username='{$username}'");
	$isHaveEmail = getResultNum("select * from admin where email='{$email}'");

	if($isHaveUsername > 0){
		returnWeb(0,'该用户名已经被注册');
	}else if($isHaveEmail > 0){
		returnWeb(0,'该邮箱已经被占用');
	}else{
		$arr['password']=md5($_POST['password']);
		if(insert("admin",$arr)){
			returnWeb(1,'添加成功');
		}else{
			returnWeb(0,'添加失败');
		}
	}
}
/**
 * 得到所有的管理员
 */
function getAllAdmin(){
	$sql="select id,username,email from admin order by id ";
	$rows=fetchAll($sql);
	if($rows){
        returnWeb(1,'获取列表成功',$rows);
    }else{
        returnWeb(0,'没有管理员,请添加');
    }
}
/**
 * 得到id为n的管理员的所有信息
 */
function getAdminById($id){
	$sql="select id,username,email from admin where id=".$id;
	$rows=fetchOne($sql);
	if($rows){
        returnWeb(1,'获取列表成功',$rows);
    }else{
        returnWeb(0,'没有该管理员');
    }
}
/**
 * 编辑管理员
 * @param int $id
 * @return string
 */
function editAdmin($id){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	if(update("admin", $arr,"id={$id}")){
		returnWeb(1,'修改成功');
	}else{
		returnWeb(0,'修改失败');
	}
}
/**
 * 删除管理员的操作
 */
function delAdmin($id){
	if(delete("admin","id={$id}")){
		returnWeb(1,'删除成功');
	}else{
		returnWeb(0,'删除失败');
	}
}






?>
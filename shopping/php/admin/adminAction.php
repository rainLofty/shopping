<?php
require_once "../include.php";

if(isset($_REQUEST['act'])){
    $act=$_REQUEST['act'];
}
$id = '';
if(isset($_POST['id'])){
    $id=$_POST['id'];
}

if($act=="check"){
    checkLogined();
}else if($act=="logout"){
    logout();
}else if($act=="addAdmin"){
	$mes=addAdmin();
}else if($act=="getAdmin"){
    getAllAdmin();
}else if($act=="getAdminById"){
    if($id){
        getAdminById($id);
    }else{
        returnWeb(0,'请传递id值');
    }
}elseif($act=="editAdmin"){
    if($id){
        $mes=editAdmin($id);
    }else{
        returnWeb(0,'请传递id值');
    }
}else if($act=="delAdmin"){
    if($id){
        delAdmin($id);
    }else{
        returnWeb(0,'请传递id值');
    }
}else if($act=="addCate"){
    addCate();
}else if($act=="getAllCates"){
     getAllCate();
}else if($act=="editCate"){
    if($id){
        $where="id={$id}";
        editCate($where);
    }else{
        returnWeb(0,'请传递id值');
    }
}else if($act=="getCateById"){
    getCateById($id);
}else if($act=="delCate"){
    delCate($id);
}else if($act=="addPro"){
    addPro();
}else if($act=="getPros"){
    if(isset($_POST['isShow'])){
        $isShow = $_POST['isShow'];
        $where="where isShow={$isShow}";
    }else{
        $where = '';
    }
    getPros($where);
}else if($act=="upPro"){
    upPro($id);
}else if($act=="downPro"){
    downPro($id);
}else if($act=="delPro"){
    delPro($id);
}










?>
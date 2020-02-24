<?php
require_once "../include.php";

//后台管理员登录
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['verify'])){
    //前台传递的数据
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $verify = $_POST['verify'];

    $verify_session = '';
    if(isset($_SESSION["verify"])){
        $verify_session = $_SESSION["verify"];//本地储存的验证码
    }
    if($verify_session == ''){
        returnWeb(0,'验证码没传递');
        die();
    }
    if($verify_session == $verify){
        //验证用户名 密码是否正确
        $row = checkAdmin($username,$password);
        //登录成功
        if($row){
            returnWeb(1,'登录成功');
            //将用户名和id保存到session里面
            $_SESSION['adminName']=$row['username'];
            $_SESSION['adminId']=$row['id'];
            
        }else{
            returnWeb(0,'用户名或密码错误');
        }
    }else{
        returnWeb(0,'验证码错误',$verify_session);
    }
}else{
    returnWeb(0,'用户名密码验证码必须传递');
}












?>
<?php 

header("Content-Type: text/html; charset=utf-8");//防止界面乱码
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE'); // 允许请求的类型
header('Access-Control-Allow-Credentials: true'); // 设置是否允许发送 cookies
header('Access-Control-Allow-Headers: Content-Type,Content-Length,Accept-Encoding,X-Requested-with, Origin');

session_start();
date_default_timezone_set('PRC');

define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
require_once 'mysql.func.php';
require_once 'image.func.php';
require_once 'common.func.php';
require_once 'string.func.php';
require_once 'upload.func.php';
require_once "configs.php";
require_once 'admin.inc.php';
require_once 'page.inc.php';
require_once 'cate.inc.php';
require_once 'pro.inc.php';
require_once 'album.inc.php';
// require_once 'upload.func.php';
// require_once 'user.inc.php';
connect();

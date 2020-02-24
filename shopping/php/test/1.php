<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    请选择上传文件：<input type="file"  name="myFile"  /><br/>
    <input type="submit" value="上传"/>
</form>
<?php
date_default_timezone_set('PRC');
$arr['pubTime']=date('Y-m-d', time());
var_dump($arr);
?>
</body>
</html>
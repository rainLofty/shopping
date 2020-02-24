## 1.图片验证码url地址
http://192.168.1.67/shopping/admin/verifyImg.php
```
<img src="http://192.168.1.67/shopping/admin/verifyImg.php" alt="">
```

## 2.登录
#### 请求信息
```
url:'http://192.168.1.67/shopping/admin/login.php'
method:'post'
data:{
    username:'',
    password:'',
    verify:''
}
```

#### 返回参数
```
{
    status:0||1,
    message:'',
    result:null
}
```

## 3.验证是否登录过
#### 请求信息
```
url:'http://192.168.1.67/shopping/admin/adminAction.php?act=check'
method:'get'
data: 无
```

#### 返回参数
```
{
    status:0||1,
    message:'',
    result:{
        username: "用户名"
    }
}
```

## 4.注销登陆
#### 请求信息
```
url:'http://192.168.1.67/shopping/admin/adminAction.php?act=logout'
method:'get'
data: 无
```

#### 返回参数
```
{
    status:0||1,
    message:'',
}
```

## 5.添加管理员
#### 请求信息
```
url:'http://192.168.1.67/shopping/admin/adminAction.php?act=addAdmin'
method:'post'
data: {
    username:'',
    password:'',
    email:'',
}
```

#### 返回参数
```
{
    status:0||1,
    message:'',
}
```

## 6.获取管理员列表
#### 请求信息
```
url:'http://192.168.1.67/shopping/admin/adminAction.php?act=getAdmin'
method:'get'
data: 无
```

#### 返回参数
```
{
    status:0||1,
    message:'',
    result:{
       
    }
}
```

## 7.通过id获取管理员列表
#### 请求信息
```
url:'http://192.168.1.67/shopping/admin/adminAction.php?act=getAdminById'
method:'post'
data: {
    id:'',//该管理员的id值
}
```

#### 返回参数
```
{
    status:0||1,
    message:'',
    result:[]
}
```

## 8.修改管理员
#### 请求信息
```
url:'http://192.168.1.67/shopping/admin/adminAction.php?act=editAdmin'
method:'post'
data: {
    id:'',//该管理员的id值
    username:'',
    password:'',
    email:'',
}
```

#### 返回参数
```
{
    status:0||1,
    message:'',
}
```

## 9.删除管理员
#### 请求信息
```
url:'http://192.168.1.67/shopping/admin/adminAction.php?act=delAdmin'
method:'post'
data: {
    id:'',//该管理员的id值
}
```
#### 返回参数
```
{
    status:0||1,
    message:'',
}
```


## 10.添加分类
#### 请求信息
```
url:'http://192.168.1.67/shopping/admin/adminAction.php?act=addCate'
method:'post'
data: {
    cName:'分类名称' ,
}
```
#### 返回参数
```
{
    status:0||1,
    message:'',
}
```

## 11.获取所有分类列表
#### 请求信息
```
url:'http://192.168.1.67/shopping/admin/adminAction.php?act=getAllCates'
method:'get'
data:无
```
#### 返回参数
```
{
    status:0||1,
    message:'',
}
```

## 12.修改分类信息
#### 请求信息
```
url:'http://192.168.1.67/shopping/admin/adminAction.php?act=editCate'
method:'post'
data:{
    id:'分类id' ,
    cName:'分类名称' ,
}
```
#### 返回参数
```
{
    status:0||1,
    message:'',
}
```

## 13.根据id获取分类信息
#### 请求信息
```
url:'http://192.168.1.67/shopping/admin/adminAction.php?act=getCateById'
method:'post'
data:{
    id:'分类id' ,
}
```
#### 返回参数
```
{
    status:0||1,
    message:'',
}
```

## 14.删除分类
#### 请求信息
```
url:'http://192.168.1.67/shopping/admin/adminAction.php?act=delCate'
method:'post'
data:{
    id:'分类id' ,
}
```
#### 返回参数
```
{
    status:0||1,
    message:'',
}
```

## 15.发布商品
#### 请求信息
```
url:'http://192.168.1.67/shopping/admin/adminAction.php?act=addPro'
method:'post'
```

## 16.获取所有商品
#### 请求信息
```
url:'http://192.168.1.67/shopping/admin/adminAction.php?act=getPros'
method:'post'
data:{
isShow:1|2, 1->已上架的商品  0->未上架商品    不传参-> 表示所有商品
}
```
#### 返回参数
```
{
    status:0||1,
    message:'',
}
```
## 17.上架商品
#### 请求信息
```
url:'http://192.168.1.67/shopping/admin/adminAction.php?act=upPro'
method:'post'
data:{
    id:商品id
}
```
#### 返回参数
```
{
    status:0||1,
    message:'',
}
```

## 18.下架商品
#### 请求信息
```
url:'http://192.168.1.67/shopping/admin/adminAction.php?act=downPro'
method:'post'
data:{
    id:商品id
}
```
#### 返回参数
```
{
    status:0||1,
    message:'',
}
```

## 19.删除商品
#### 请求信息
```
url:'http://192.168.1.67/shopping/admin/adminAction.php?act=delPro'
method:'post'
data:{
    id:商品id
}
```
#### 返回参数
```
{
    status:0||1,
    message:'',
}
```









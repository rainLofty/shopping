//打开首页的时候需要验证是否登录过，没有登录的话回到登录页
$.ajax({
    url:'http://192.168.1.67/shopping/admin/adminAction.php?act=check',
    dataType:'json',
    success:function(data){
        console.log(data);
        if(data.status == 0){
            window.location.href = 'loginReg/login.html';
        }else{
            $('.username').html(data.result.username);
        }
    }
})
//点击退出系统按钮
var isOuting = false;
$('.logout').click(function(){
    if(isOuting){
        return;
    }
    $.myConfirm({
        message:'确定要退出系统吗',
        callback:function(){
            isOuting = true;
            $.ajax({
                url:'http://192.168.1.67/shopping/admin/adminAction.php?act=logout',
               dataType:'json',
               success:function(data){
                   console.log(data);
                   isOuting = false;
                   if(data.status){
                        window.location.href="loginReg/login.html";
                   }
               },
           })
        }
    })
})


//点击左侧菜单
$('.content .left li li').click(function(){
    if($(this).hasClass('current')){
        return;
    }
    //排他
    $('.content .left li li').removeClass('current');
    $(this).addClass('current');
    //修改右侧标题
    var title = $(this).find('a').html();
    $('.brand_nav span').html(title);
    //修改iframe的路径
    var src = 'iframe/'+$(this).attr('data-src')+'.html';
    $('.iframe_div iframe').attr('src',src);
})

// 后退  
$('.houtui').click(function(){
    var subWin = window.frames['subFrame'].contentWindow;
    subWin.history.back();
    getHref();
})
// 刷新
$('.shuaxin').click(function(){
    var subWin = window.frames['subFrame'].contentWindow;
    subWin.location.reload();
})
//前进
$('.qianjin').click(function(){
    var subWin = window.frames['subFrame'].contentWindow;
    subWin.history.forward();
    getHref();
})
//获取子窗口的当天href值
function getHref(){
    var subWin = window.frames['subFrame'].contentWindow;
    var href = subWin.location.pathname;
    console.log(href);
    var arr = href.split('/');
    var src = arr[arr.length-1];
    src = src.split('.')[0];
    navConnect(src);
}
//导航和当前子窗口互联
function navConnect(currentSrc){
    $('.content .left li li').each(function(index,element){
        var src = $(this).attr('data-src');
        console.log(src,currentSrc)
        if(currentSrc == src){
            $('.content .left li li').removeClass('current');
            $(this).addClass('current');
            return;
        }
    })
}









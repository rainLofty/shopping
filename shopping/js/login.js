
//登录
var isLogining = false;
//键盘回车登录
$('.verify').keydown(function(e){
    if(e.keyCode == 13){
        $('.login_btn').click();   
    }
})
//点击登录按钮登录
$('.login_btn').click(function(){
    if(isLogining){
        return;
    }
    var remember = $('.remember').prop('checked');
    var username = $('.username').val().trim();
    var password = $('.password').val().trim();
    var verify = $('.verify').val().trim();
    if(username == '' || password == ''){
        $.myToast('用户名和密码不能为空');
        return;
    }else if(verify == ''){
        $.myToast('请输入验证码');
        return;
    }
    isLogining = true;
    $.myLoadding('');
    $.ajax({
        url:'http://192.168.1.67/shopping/admin/login.php',
        dataType:'json',
        data:{
            username:username,
            password:password,
            verify:verify,
        },
        method:'POST',
        success:function(data){
            console.log(data);
            if(data.status){
                //登录成功,将用户名和密码保存起来
                if(remember){
                    var userinfo = {
                        username:username,
                        password:password,
                    }
                    localStorage.setItem('userinfo',JSON.stringify(userinfo));
                }else{
                    localStorage.removeItem('userinfo');
                }
                window.location.href="../index.html";
            }else{
                $.myToast(data.message);
            }
        },
        complete:function(data){
            console.log(data.responseText);
            isLogining = false;
            $.removeModa();
        }
    })
})
//记住密码
var userinfo = localStorage.getItem('userinfo');
if(userinfo){
    userinfo = JSON.parse(userinfo);
    $('.username').val(userinfo.username);
    $('.password').val(userinfo.password);
}

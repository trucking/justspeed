/**
 * Created by Administrator on 19-8-1.
 */
$(document).ready(function() {
    $('#sumit').click(function(){
        var $username = $('#username').val();
        var $password = $('#password').val();
        if($username == '' || $password == '')
        {
            alert('用户名或密码不能为空！');
        }else
        {
            $.post(
                'index.php/index/index/checkLogin',
                {
                    'username':$username,
                    'password':$password
                },
                function(data){
                    alert(data);
                    if(data == true)
                    {
                        alert('登陆成功')
                    }else
                    {
                        alert('用户名或密码错误')
                    }
                }

            );
        }
    });
});

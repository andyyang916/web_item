<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Sign in &laquo; Admin</title>
  <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../static/assets/css/admin.css">
  <script src="../static/assets/vendors/jquery/jquery.min.js"></script>
  <script>
    $(function () {
      $('#email').on('blur', function () {
          var email = $('#email').val();
          var reg = /^\w+@\w+[\.]\w+$/;
          if (!reg.test(email)) {
            // 提示用户
            $('#msg').text('您输入的邮箱格式有误，请重新输入！')
            $('.alert').show();
            return;
          } else {
            $('.alert').hide();
          }        
      });
      $('#password').on('blur', function () {
        var password = $('#password').val();
        var reg1 = /\w{6,}/;
        if (!reg1.test(password)) {
            // 提示用户
            $('#msg').text('请输入6位以上的密码！');
            $('.alert').show();
            return;
        } else {
            $('.alert').hide();
          }  
      });
      $('.btn').on('click', function () {
        $.ajax({
          type: 'post',
          url: './api/_userLogin.php',
          data: $('.login-wrap').serialize(),
          dataType: 'json',
          success: function (res) {
            // console.log(res);
            if (res.code == 1) {
                location.href = "index.php";
            } 
          }
        });
      });
    });
  </script>
</head>
<body>
  <div class="login">
    <form class="login-wrap">
      <img class="avatar" src="../static/assets/img/default.png">
      <!-- 有错误信息时展示 -->
      <div class="alert alert-danger" style="display: none">
        <strong>错误！</strong><span id="msg">用户名或密码错误</span>
      </div>
      <div class="form-group">
        <label for="email" class="sr-only">邮箱</label>
        <input id="email" type="email" class="form-control" placeholder="邮箱" autofocus name="email">
      </div>
      <div class="form-group">
        <label for="password" class="sr-only">密码</label>
        <input id="password" type="password" class="form-control" placeholder="密码" name="password">
      </div>
      <span class="btn btn-primary btn-block" >登 录</span>
    </form>
  </div>
</body>
</html>

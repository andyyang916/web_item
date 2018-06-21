<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Categories &laquo; Admin</title>
  <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../static/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../static/assets/css/admin.css">
  <script src="../static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <!-- <nav class="navbar">
      <button class="btn btn-default navbar-btn fa fa-bars"></button>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.html"><i class="fa fa-user"></i>个人中心</a></li>
        <li><a href="login.html"><i class="fa fa-sign-out"></i>退出</a></li>
      </ul>
    </nav> -->
    <?php require_once './public/_navbar.php' ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>分类目录</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <div class="alert alert-danger " style="display:none;">
        <strong>错误！</strong><span class="msg">发生XXX错误</span>
      </div>
      <div class="row">
        <div class="col-md-4">
          <form id="addForm">
            <h2>添加新分类目录</h2>
            <div class="form-group">
              <label for="name">名称</label>
              <input id="name" class="form-control" name="name" type="text" placeholder="分类名称" >
            </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
              <p class="help-block">https://zce.me/category/<strong>slug</strong></p>
            </div>
            <div class="form-group">
              <label for="classname">类名</label>
              <input id="classname" class="form-control" name="classname" type="text" placeholder="classname">
              <p class="help-block">https://zce.me/category/<strong>classname</strong></p>  
            </div>            
            <div class="form-group">
            <button class="btn btn-primary" id="btn-add" type="button">添加</button>
            <button class="btn" id="btn-edit" type="button" style="display:none;">编辑完成</button>
            <button class="btn" id="btn-cancel" type="button" style="display:none;">编辑取消</button>
            </div>
          </form>
        </div>
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a class="btn btn-danger btn-sm" id="del_tr" href="javascript:;" style="display: none">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th>名称</th>
                <th>Slug</th>
                <th>classname</th>                
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
            <tbody>
              <!-- <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <td>uncategorized</td>                
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <td>uncategorized</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <td>uncategorized</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr> -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="aside">
    <div class="profile">
      <img class="avatar" src="../static/uploads/avatar.jpg">
      <h3 class="name">布头儿</h3>
    </div>
    <ul class="nav">
      <li>
        <a href="index.html"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>
      <li class="active">
        <a href="#menu-posts" data-toggle="collapse">
          <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-posts" class="collapse in">
          <li><a href="posts.html">所有文章</a></li>
          <li><a href="post-add.html">写文章</a></li>
          <li class="active"><a href="categories.html">分类目录</a></li>
        </ul>
      </li>
      <li>
        <a href="comments.html"><i class="fa fa-comments"></i>评论</a>
      </li>
      <li>
        <a href="users.html"><i class="fa fa-users"></i>用户</a>
      </li>
      <li>
        <a href="#menu-settings" class="collapsed" data-toggle="collapse">
          <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-settings" class="collapse">
          <li><a href="nav-menus.html">导航菜单</a></li>
          <li><a href="slides.html">图片轮播</a></li>
          <li><a href="settings.html">网站设置</a></li>
        </ul>
      </li>
    </ul>
  </div> -->  
  <?php $current_page = 'categories'; ?>
  <?php require_once './public/_aside.php' ?>
  <script src="../static/assets/vendors/jquery/jquery.min.js"></script>
  <script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
  <script>
    $(function () {
      $.ajax({
        type: "post",
        url: "api/_getCategoryData.php",
        success: function (response) {
          // console.log(response);
          var str = "";
          if (response.code == 1) {
          $.each(response.cateRes, function (i, e) {
            str += `<tr category-id="${e.id}">
              <td class="text-center"><input type="checkbox"></td>
              <td>${e.name}</td>
              <td>${e.slug}</td>
              <td>${e.classname}</td>
              <td class="text-center">
                <a href="javascript:;" class="btn btn-info btn-xs" id="edit" category-id="${e.id}">编辑</a>
                <a href="javascript:;" class="btn btn-danger btn-xs" id="delete" >删除</a>
              </td>
            </tr>`
          });
          $(str).appendTo($('tbody'));
          }
        }
      });

      $('#btn-add').on('click', function () {
        var name = $('#name').val();
        var slug = $('#slug').val();
        var classname = $('#classname').val();
          if (name == "") {
            $('.msg').text('分类名为空，请重新输入！')
            $('.alert').show();
            return;
          } else {
            $('.alert').hide(); 
          }         
          if (slug == "") {
            $('.msg').text('别名为空，请重新输入！')
            $('.alert').show();
          return;
          } else {
            $('.alert').hide();  
          }        
            if (classname == "") {
            $('.msg').text('类名为空，请重新输入！')
            $('.alert').show();
            return;
          } else {
            $('.alert').hide();          
          }
          $.ajax({
            type: "post",
            url: "api/_addCategory.php",
            data: $('#addForm').serialize(),
            success: function (response) {
              if (response.code == 1) {
                // location.reload();
              var str = `<tr category-id="${response.id}">
              <td class="text-center"><input type="checkbox"></td>
              <td>${name}</td>
              <td>${slug}</td>
              <td>${classname}</td>
              <td class="text-center">
                <a href="javascript:;" class="btn btn-info btn-xs" id="edit" category-id="${response.id}">编辑</a>
                <a href="javascript:;" class="btn btn-danger btn-xs" id="delete" >删除</a>
              </td>
              </tr>`
              $(str).appendTo($('tbody'));     
              $('#btn-add').hide();
              $('#btn-edit').show();
              $('#btn-cancel').show();
              $('#name').val('');
              $('#slug').val('');
              $('#classname').val('');                      
              }
            }
          });
      });

      var currentRow;      
      $('tbody').on('click', '#edit', function () {
        currentRow = $(this).parents('tr');
        $('#btn-add').hide();
        $('#btn-edit').show();
        $('#btn-cancel').show();
        $('#name').val($(this).parents('tr').children().eq(1).text());
        $('#slug').val($(this).parents('tr').children().eq(2).text());
        $('#classname').val($(this).parents('tr').children().eq(3).text());
        var categoryId = $(this).attr('category-id');
        $('#btn-edit').attr('categoryId', categoryId);
      });


      $('#btn-edit').on('click', function () {
        var categoryId = $(this).attr('categoryId');        
        // console.log($('#addForm').serialize() + '&categoryId=' + categoryId); 
        var data = $('#addForm').serialize() + '&categoryId=' + categoryId;
        $.ajax({
          type: "post",
          url: "./api/_updateCategory.php",
          data: data,
          dataType: "json",
          success: function (response) {
            if (response.code == 1) {
              $('#btn-add').show();
              $('#btn-edit').hide();
              $('#btn-cancel').hide();  
              var name = $('#name').val();
              var slug = $('#slug').val();
              var classname = $('#classname').val();   
              $('#name').val('');
              $('#slug').val('');
              $('#classname').val('');         
              currentRow.children().eq(1).text(name);
              currentRow.children().eq(2).text(slug);
              currentRow.children().eq(3).text(classname);
            }
          }
        });
      });
      
      $('#btn-cancel').on('click', function () {
        $('#btn-add').show();
        $('#btn-edit').hide();
        $('#btn-cancel').hide();
        $('#name').val('');
        $('#slug').val('');
        $('#classname').val('');        
      });

      $('tbody').on('click', '#delete', function () {
        var row = $(this).parents('tr');
        var categoryId = row.attr('category-id');
        // console.log(categoryId);
        $.ajax({
          type: "post",
          url: "./api/_deleteCategory.php",
          // data: "categoryId=" + categoryId,
          data: {categoryId: categoryId},
          dataType: "json",
          success: function (response) {
            if (response.code == 1) {
              row.remove();
            }
          }
        });
      });
    });

      $('thead input[type=checkbox]').on('change', function () {
        var all = $(this).prop('checked');
        $('tbody input[type=checkbox]').prop('checked', all);
        if (all) {
          $('#del_tr').show();
        } else {
          $('#del_tr').hide();
        }
      });

      $('tbody').on('change', 'input[type=checkbox]', function () {
        var all = $('thead input[type=checkbox]');
        var cks = $('tbody input[type=checkbox]');

        // 这句是if优化方法， prop属性设置 'checked', true 或 'checked', false
        all.prop('checked', cks.size() == $('tbody input[type=checkbox]:checked').size())

        if ($('tbody input[type=checkbox]:checked').size() >= 2) {
          $('#del_tr').show();          
        } else {
          $('#del_tr').hide();          
        }
      });

      $('#del_tr').on('click', function () {
        var cks = $('tbody input[type=checkbox]:checked');
        var cksRow = cks.parents('tr');
        // console.log(cks);
        // console.log(cksRow);
        var ids = [];
        $.each(cks, function (index, el) {
          var id = $(el).parents('tr').attr('category-id');
          ids.push(id);
        }) 
        // console.log(ids);
        $.ajax({
          type: "post",
          url: "api/_delcategories.php",
          data: {ids: ids},
          dataType: "json",
          success: function (response) {
            if (response.code == 1) {
              // location.reload();
              cksRow.remove();
            }
          }
        });
      });


  </script>
</body>
</html>

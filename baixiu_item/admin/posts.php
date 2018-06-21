<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Posts &laquo; Admin</title>
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
        <h1>所有文章</h1>
        <a href="post-add.html" class="btn btn-primary btn-xs">写文章</a>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="page-action">
        <!-- show when multiple checked -->
        <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
        <form class="form-inline">
          <select id="category" name="" class="form-control input-sm">
            <option value="all">所有分类</option>
            <!-- <option value="">未分类</option> -->
          </select>
          <select id="status" name="" class="form-control input-sm">
            <option value="all">所有状态</option>
            <option value="drafted">草稿</option>
            <option value="published">已发布</option>
            <option value="trashed">已作废</option>           
          </select>
          <!-- <button class="btn btn-default btn-sm">筛选</button> -->
          <input type="button" class="btn btn-default btn-sm" value="筛选" id="btn-filt">         
        </form>
        <ul class="pagination pagination-sm pull-right">
          <!-- <li><a href="#">上一页</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">下一页</a></li> -->
        </ul>
      </div>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" width="40"><input type="checkbox"></th>
            <th>标题</th>
            <th>作者</th>
            <th>分类</th>
            <th class="text-center">发表时间</th>
            <th class="text-center">状态</th>
            <th class="text-center" width="100">操作</th>
          </tr>
        </thead>
        <tbody>
          <!-- <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>随便一个名称</td>
            <td>小小</td>
            <td>潮科技</td>
            <td class="text-center">2016/10/07</td>
            <td class="text-center">已发布</td>
            <td class="text-center">
              <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr>
          <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>随便一个名称</td>
            <td>小小</td>
            <td>潮科技</td>
            <td class="text-center">2016/10/07</td>
            <td class="text-center">已发布</td>
            <td class="text-center">
              <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr>
          <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>随便一个名称</td>
            <td>小小</td>
            <td>潮科技</td>
            <td class="text-center">2016/10/07</td>
            <td class="text-center">已发布</td>
            <td class="text-center">
              <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr> -->
        </tbody>
      </table>
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
          <li class="active"><a href="posts.html">所有文章</a></li>
          <li><a href="post-add.html">写文章</a></li>
          <li><a href="categories.html">分类目录</a></li>
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
  <?php $current_page = 'posts' ?>
  <?php require_once './public/_aside.php' ?>
  <script src="../static/assets/vendors/jquery/jquery.js"></script>
  <script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
  <script>
      // var dataStatus = {
      // drafted: '草稿',
      // published: '已发布',
      // trashed: '已作废'
      // };
  //  动态生成分页结构
  //   保存多少条数据
      

    // makePageButton();
    // function makePageButton() {
    //   var start = currentPage - 2;
    //   if (start < 1) {
    //   start = 1;
    //   }      
    //   if (currentPage == 1) {
    //     end = currentPage + 4;
    //   } else if (currentPage == 2) {
    //     end = currentPage + 3;
    //   } else {
    //     end = currentPage + 2;        
    //   }
    //   if (end > pageCount) {
    //     end = pageCount;
    //   }
    //   var html = "";
    //   if (currentPage != 1) {
    //     html += '<li class="item" data-page="'+ (currentPage - 1) +'"><a href="javascript:;">上一页</a></li>';
    //   }
    //   for (var i = start; i <= end; i++) {
    //     if (i == currentPage) {
    //       html += '<li class="item active" data-page="'+ i +'"><a href="javascript:;">'+ i + '</a></li>';
    //     } else {
    //       html += '<li class="item" data-page="'+ i +'"><a href="javascript:;">'+ i + '</a></li>';
    //     }
    //   }
    //   if (currentPage != pageCount) {
    //     html += '<li class="item" data-page="'+ (currentPage + 1) +'"><a href="javascript:;">下一页</a></li>';
    //   }
    //   // console.log(html);
    //   $('.pagination').html(html);
    // }

    //   function makeTable(data) {
    //     $('tbody').empty();
    //     // console.log(data);
    //     var dataArr = [];
    //     $.each(data, function (index, val) {
    //       var status = data[index].status;
    //       var finalStatus = dataStatus[status];
    //       // console.log(dataStatus);
    //       dataArr.push(`<tr>
    //       <td class="text-center"><input type="checkbox"></td>
    //       <td>${data[index].title}</td>
    //       <td>${data[index].nickname}</td>
    //       <td>${data[index].name}</td>
    //       <td class="text-center">${data[index].created}</td>
    //       <td class="text-center">${finalStatus}</td>
    //       <td class="text-center">
    //         <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
    //         <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
    //       </td>
    //     </tr>`);
    //     });
    //     // console.log(dataArr);
    //     var str = $(dataArr.join(''));
    //     str.appendTo($('tbody'));
    //   }

    // $(function () {
    //   $.ajax({
    //     type: "post",
    //     url: "api/_getPostsCategories.php",
    //     success: function (response) {
    //       // console.log(response);
    //       if (response.code == 1) {
    //         var cate = response.cate;
    //         // console.log(cate);
    //         $.each(cate, function (ind, el) {
    //           var html = '<option value="'+ el.id +'">'+ el.name +'</option>';
    //           $(html).appendTo('#categories');
    //         });
    //       }
    //     }
    //   });

    //   // 进入页面发送ajax请求
    //   $.ajax({
    //     type: "post",
    //     url: "api/_getPostsData.php",
    //     data: {
    //       currentPage: currentPage,
    //       pageSize: pageSize
    //     },
    //     dataType: "json",
    //     // success: function (response) {
    //     //   if (response.code == 1) {
    //     //     // console.log(response);
    //     //     pageCount = response.pageCount;
    //     //     makePageButton();
    //     //     // 渲染页面
    //     //     var data = response.postsRes;
    //     //     var dataArr = [];
    //     //     $.each(data, function (index, val) {
    //     //       var status = data[index].status;
    //     //       var finalStatus = dataStatus[status];
    //     //       // console.log(dataStatus);
    //     //       dataArr.push(`<tr>
    //     //       <td class="text-center"><input type="checkbox"></td>
    //     //       <td>${data[index].title}</td>
    //     //       <td>${data[index].nickname}</td>
    //     //       <td>${data[index].name}</td>
    //     //       <td class="text-center">${data[index].created}</td>
    //     //       <td class="text-center">${finalStatus}</td>
    //     //       <td class="text-center">
    //     //         <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
    //     //         <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
    //     //       </td>
    //     //     </tr>`);
    //     //     });
    //     //     // console.log(dataArr);
    //     //     var str = $(dataArr.join(''));
    //     //     str.appendTo($('tbody'));            
    //     //   }
    //     // }
    //     success: function (response) {
    //       if (response.code == 1) {
    //         console.log(response);
    //         var data = response.postsRes;
    //         pageCount = response.pageCount;
    //         makePageButton();
    //         makeTable(data);

    //         // $.each(data, function (index, val) {
    //         // var str = '<tr>\
    //         // <td class="text-center"><input type="checkbox"></td>\
    //         // <td>'+ val.title +'</td>\
    //         // <td>'+ val.nickname +'</td>\
    //         // <td>'+ val.name +'</td>\
    //         // <td class="text-center">'+ val.created +'</td>\
    //         // <td class="text-center">'+ dataStatus[val.status] +'</td>\
    //         // <td class="text-center">\
    //         //   <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>\
    //         //   <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>\
    //         // </td>\
    //         // </tr>';
    //         //   $(str).appendTo('tbody');
    //         // });
    //     //   }
    //     // }
    //   // });

    //   $('.pagination').on('click','.item', function () {
    //   currentPage = parseInt($(this).attr('data-page'));
    //   console.log(currentPage);
    //     $.ajax({
    //     type: "post",
    //     url: "api/_getPostsData.php",
    //     data: {
    //       currentPage: currentPage,
    //       pageSize: pageSize
    //     },
    //     dataType: "json",
    //     success: function (response) {
    //       console.log(response);
    //       if (response.code == 1) {
    //         var data = response.postsRes;
    //         pageCount = response.pageCount;
    //         makePageButton();
    //         makeTable(data);
    //       }
    //     }
    //   });        
    // });



    // 筛选注册点击事件
    // $('#data-filt').on('click', function () {
    //   status = $('#status').val();
    //   categoryId = $('#category').val();
    //   console.log(status);
    //   $.ajax({
    //     type: "post",
    //     url: "api/_getPostsData.php",
    //     data: {
    //       currentPage: currentPage,
    //       pageSize: pageSize,
    //       status: status,
    //       categoryId: categoryId
    //     },
    //     dataType: "json",
    //     success: function (response) {
    //       console.log(response);
    //     }
    //   });
    // });


      // var pageSize = 50;
      // var currentPage = 1;
      // var pageCount = 4;




    // $(function () {
    //   var status = {
    //   drafted: '草稿',
    //   published: '已发布',
    //   trashed: '已作废'
    //   };
    //   // $.ajax({
    //   //   type: "post",
    //   //   url: "api/_getPostsData.php",
    //   //   dataType: "json",
    //   //   success: function (response) {
    //   //     // console.log(response);
    //   //     var data = response.postsRes;
    //   //     // console.log(data);
    //   //     var dataArr = [];
    //   //     $.each(data, function (index, val) {
    //   //       dataArr.push(`<tr>
    //   //       <td class="text-center"><input type="checkbox"></td>
    //   //       <td>${data[index].title}</td>
    //   //       <td>${data[index].nickname}</td>
    //   //       <td>${data[index].name}</td>
    //   //       <td class="text-center">${data[index].created}</td>
    //   //       <td class="text-center">${status[data[index].status]}</td>
    //   //       <td class="text-center">
    //   //         <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
    //   //         <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
    //   //       </td>
    //   //     </tr>`);
    //   //     });
    //   //     // console.log(dataArr);
    //   //     var str = $(dataArr.join(''));
    //   //     str.appendTo($('tbody'));
    //   //   }
    //   });


    //   $('.pagination').on('click','.item', function () {
    //     // 根据当前页码获取数据
    //     // currentPage = parseInt($(this).attr('data-page'));
    //     // $.ajax({
    //     //   type: "post",
    //     //   url: "api/_getPostsData.php",
    //     //   data: {
    //     //     currentPage: currentPage,
    //     //     PageSize: pageSize,
    //     //   },
    //     //   dataType: "json",
    //     //   success: function (response) {
    //     //     console.log(response);
    //     //   }
    //     // });

    //     $.ajax({
    //     type: "post",
    //     // url: "api/_getPostsData.php",
    //     dataType: "json",
    //     success: function (response) {
    //       // console.log(response);
    //       var data = response.postsRes;
    //       // console.log(data);
    //       var dataArr = [];
    //       $.each(data, function (index, val) {
    //         dataArr.push(`<tr>
    //         <td class="text-center"><input type="checkbox"></td>
    //         <td>${data[index].title}</td>
    //         <td>${data[index].nickname}</td>
    //         <td>${data[index].name}</td>
    //         <td class="text-center">${data[index].created}</td>
    //         <td class="text-center">${status[data[index].status]}</td>
    //         <td class="text-center">
    //           <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
    //           <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
    //         </td>
    //       </tr>`);
    //       });
    //       // console.log(dataArr);
    //       var str = $(dataArr.join(''));
    //       str.appendTo($('tbody'));
    //     }
    //   });

    // // 动态生成分页结构
    // // 保存多少条数据
    // $(function () {
    //   var pageSize = 10;
    //   var currentPage = 1;
    //   var pageCount = 4;
    //   var start = currentPage - 2;
    //   var end = currentPage + 4;

    // // 最大的页码页码数 ceil(文章总数 / 每页显示条数)

    // if (start < 1) {
    //   start = 1;
    // }
    // if (end > pageCount) {
    //   end = pageCount;
    // }
    // var html = "";
    // if (currentPage != 1) {
    //   html += '<li class="item" data-page="'+ (currentPage - 1) +'"><a href="javascript:;">上一页</a></li>';
    // }
    // for (var i = start; i <= end; i++) {
    //   if (i == currentPage) {
    //     html += '<li class="item active" data-page="'+ i +'"><a href="javascript:;">'+ i + '</a></li>';
    //   } else {
    //     html += '<li class="item" data-page="'+ i +'"><a href="javascript:;">'+ i + '</a></li>';
    //   }
    // }
    // if (currentPage != pageCount) {
    //   html += '<li class="item" data-page="'+ (currentPage + 1) +'"><a href="javascript:;">下一页</a></li>';
    // }
    // // console.log(html);
    // $('.pagination').html(html);
    // })
    //   function makePageButton() {
    //     var currentPage = 1;
    //     var start = currentPage - 2;
    //     var end = currentPage + 4;
    //     if (start < 1) {
    //       start = 1;
    //     }
    //     if (end > pageCount) {
    //       end = pageCount;
    //     }
    //     var lis = [];
    //     if (currentPage != 1) {
    //       lis.push(`<li class="item" ><a href="#">上一页</a></li>`);
    //     }
    //     console.log(lis);
    //     for (var i = start; i <= end; i++) {
    //         if (i == currentPage) {
    //           lis.push(`<li class="item active" data-page=${i}><a href="#">${i}</a></li>`);            
    //         } else {
    //           lis.push(`<li class="item" data-page=${i}><a href="#">${i}</a></li>`);
    //         }
    //     }
    //     if (currentPage != pageCount) {
    //       lis.push(`<li class="item"><a href="#">下一页</a></li>`);
    //     }
    //     console.log(lis);
    //     var lisStr = $(lis.join(''));
    //     lisStr.appendTo($('.pagination'));
    //   }
    // });
  </script>
  <script>
    var dataStatus = {
    drafted: '草稿',
    published: '已发布',
    trashed: '已作废'
    };

    // 入口函数，在普通js代码或外部js代码执行完毕后再执行里面的代码
    $(function () {
      $.ajax({
        type: "post",
        url: "api/_getPostsData.php",
        data: {
            currentPage: currentPage,
            pageSize: pageSize,
            status: $('#status').val(),
            categoryId: $('#category').val()
        },
        dataType: "json",
        success: function (res) {
          // console.log(res, 999);
          var data = res.data;
          if (res.code == 1) {
            pageCount = res.pageCount;
            makePageButton();
            makeTable(data);
          }
        }
      });

      // 给每个li注册委托点击事件
      $('.pagination').on('click', '.item', function () {
          currentPage = parseInt($(this).attr('data-page'));
          // console.log(currentPage);
          $.ajax({
            type: "post",
            url: "api/_getPostsData.php",
            data: {
              currentPage: currentPage,
              pageSize: pageSize,
              status: $('#status').val(),
              categoryId: $('#category').val()
            },
            dataType: "json",
            success: function (res) {
              // console.log(res, 888);  
              if (res.code == 1) {
                console.log(currentPage);
                var data = res.data;
                pageCount = res.pageCount;
                // console.log(data);
                // console.log(pageCount, 8888);
                makePageButton();
                makeTable(data);                
              }
            }
          });
      });


      // 先加载所有的分类数据
      $.ajax({
        type: "post",
        url: "api/_getCategoryData.php",
        dataType: "json",
        success: function (res) {
          // console.log(res);
          if (res.code == 1) {
            var data = res.cateRes;
            // console.log(data);
            $.each(data, function (i, e) {
              var html = `<option value=${e.id}>${e.name}</option>`;
              $(html).appendTo('#category');
            })
          }
        }
      });

      //筛选按钮注册点击事件
      $('#btn-filt').on('click', function () {
        var status = $('#status').val();
        var categoryId = $('#category').val();
        // console.log(status);
        $.ajax({
          type: "post",
          url: "api/_getPostsData.php",
          data: {
            currentPage: currentPage,
            pageSize: pageSize,
            status: status,
            categoryId: categoryId
          },
          dataType: "json",
          success: function (res) {
            // console.log(res);
            if (res.code == 1) {
              var data = res.data;
              pageCount = res.pageCount;
              makePageButton();
              makeTable(data);
            }
          }
        });
      })

    });



    var currentPage = 1;
    var pageCount = 4;
    var pageSize = 10;
    function makePageButton() {
      var start = currentPage - 2;
      if (start < 1) {
        start = 1;
      }
      var end = currentPage + 2;
      if (currentPage == 1 || currentPage == 2) {
        end = 5;
      } 
      if (end > pageCount) {
        end = pageCount;
      }
      var html = ""
      if (currentPage != 1) {
        html += `<li class="item" data-page="${currentPage - 1}"><a href="javascript:;">上一页</a></li>`;
      }
      for (var i = start; i <= end; i++) {
        if (i == currentPage) {
          html += `<li class="item active" data-page="${i}"><a href="javascript:;">${i}</a></li>`;          
        } else {
          html += `<li class="item" data-page="${i}"><a href="javascript:;">${i}</a></li>`;
        }
      }
      if (currentPage != pageCount) {
        html += `<li class="item" data-page="${currentPage + 1}"><a href="javascript:;">下一页</a></li>`
      }
      $('.pagination').html(html);
    }


    function makeTable(data) {
      $('tbody').empty();
      $.each(data, function (index, value) {
        var str = `<tr data-id="${value.id}">
        <td class="text-center"><input type="checkbox"></td>
        <td>${value.title}</td>
        <td>${value.nickname}</td>
        <td>${value.name}</td>  
        <td class="text-center">${value.created}</td>
        <td class="text-center">${dataStatus[value.status]}</td>
        <td class="text-center">
          <a href="javascript:;" class="btn btn-default btn-xs" data-id="${value.id}">编辑</a>
          <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
        </td>
        </tr>`;
        $(str).appendTo('tbody');
      });
    }
  </script>
</body>
</html>

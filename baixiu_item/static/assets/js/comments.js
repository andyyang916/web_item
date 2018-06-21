
// 1.配置模块
require.config({
    paths: {
        "jquery": "/static/assets/vendors/jquery/jquery",
        "template": "/static/assets/vendors/art-template/template-web",
        "pagination": "/static/assets/vendors/twbs-pagination/jquery.twbsPagination",
        "bootstrap": "/static/assets/vendors/bootstrap/js/bootstrap"
    },
    shim: {
        "pagination": {
            deps: ["jquery"]
        },
        "bootstrap": { 
            deps:["jquery"]
        }
    }
});

// 2.引入模块
require(["jquery", "template", "pagination", "bootstrap"], function ($, template, pagination, bootstrap) {

    $(function () {
    var currentPage = 1;
    var pageSize = 10;
    var pageCount;
      
      getCommentsData();
      function getCommentsData() {
        $.ajax({
        type: "post",
        url: "api/_getCommentsData.php",
        data: {
          currentPage: currentPage,
          pageSize: pageSize
        },
        dataType: "json",
        success: function (res) {
          // console.log(res);
          if (res.code == 1) {
            pageCount = res.pageCount;
            // console.log(pageCount);
            // var data = res.data;
          //   $.each(data, function (i, e) {
          //     var html = `<tr class="danger">
          //   <td class="text-center"><input type="checkbox"></td>
          //   <td>${e.author}</td>
          //   <td>${e.content}</td>
          //   <td>《${e.title}》</td>
          //   <td>${e.created}</td>
          //   <td>${e.status}</td>
          //   <td class="text-center">
          //     <a href="post-add.html" class="btn btn-info btn-xs">批准</a>
          //     <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
          //   </td>
          // </tr>`
          var html = template("template", res);
          // console.log(html);
          // console.log(res.data);
          $('tbody').html(html);
          // $('tbody').append(html);
            // });

          $('.pagination').twbsPagination({
          totalPages: pageCount,
          visiblePages: 7,
          onPageClick: function (event, page) {
            currentPage = page;
            getCommentsData();
        }
      });
          }
        }
      });
      };

    });


    
})

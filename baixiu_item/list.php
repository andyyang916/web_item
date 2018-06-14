<?php
    header('content-type:text/html;charset=utf-8');
    require_once './static/config.php';
      // 最新发布功能
  // echo $_GET['catagoryId'];
  $catagoryId = $_GET['catagoryId'];
  include './static/select.php';
  // $sql = "SELECT p.title, p.feature, p.created, p.content, p.views, p.likes, c.`name`, u.`nickname` FROM posts p LEFT JOIN 
  // categories c ON c.`id` = p.`category_id` LEFT JOIN users u ON u.id = p.`user_id` WHERE p.`category_id` != 1 ORDER BY p.`created` DESC LIMIT 5";

  $sql = "SELECT p.id, p.title, p.feature, p.created, p.content, p.views, p.likes, c.`name`, u.`nickname`, (SELECT COUNT(id) FROM comments WHERE post_id= p.id) AS commentsCount FROM posts p LEFT JOIN 
  categories c ON c.`id` = p.`category_id` LEFT JOIN users u ON u.id = p.`user_id` WHERE p.`category_id` = {$catagoryId} ORDER BY p.`created` DESC LIMIT 10";
  $getArr = select($sql);
  // print_r($getArr);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>阿里百秀-发现生活，发现美!</title>
  <link rel="stylesheet" href="static/assets/css/style.css">
  <link rel="stylesheet" href="static/assets/vendors/font-awesome/css/font-awesome.css">
  <style>
    /* 加载更多 */
    .loadmore{
      text-align: center;
      padding: 50px 0px;
    }
    .loadmore .btn{
        border: 1px  solid #ccc;
        border-radius: 7px;
        padding:10px 20px;
        cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="topnav">
      <ul>
        <li><a href="javascript:;"><i class="fa fa-glass"></i>奇趣事</a></li>
        <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
        <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
        <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li>
      </ul>
    </div>
    <!-- <div class="header">
      <h1 class="logo"><a href="index.html"><img src="static/assets/img/logo.png" alt=""></a></h1>
      <ul class="nav">
        <li><a href="javascript:;"><i class="fa fa-glass"></i>奇趣事</a></li>
        <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
        <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
        <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li>
      </ul>
      <div class="search">
        <form>
          <input type="text" class="keys" placeholder="输入关键字">
          <input type="submit" class="btn" value="搜索">
        </form>
      </div>
      <div class="slink">
        <a href="javascript:;">链接01</a> | <a href="javascript:;">链接02</a>
      </div>
    </div> -->
    <?php include_once "./public/_header.php"; ?>
    <!-- <div class="aside">
      <div class="widgets">
        <h4>搜索</h4>
        <div class="body search">
          <form>
            <input type="text" class="keys" placeholder="输入关键字">
            <input type="submit" class="btn" value="搜索">
          </form>
        </div>
      </div>
      <div class="widgets">
        <h4>随机推荐</h4>
        <ul class="body random">
          <li>
            <a href="javascript:;">
              <p class="title">废灯泡的14种玩法 妹子见了都会心动</p>
              <p class="reading">阅读(819)</p>
              <div class="pic">
                <img src="static/uploads/widget_1.jpg" alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <p class="title">可爱卡通造型 iPhone 6防水手机套</p>
              <p class="reading">阅读(819)</p>
              <div class="pic">
                <img src="static/uploads/widget_2.jpg" alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <p class="title">变废为宝！将手机旧电池变为充电宝的Better</p>
              <p class="reading">阅读(819)</p>
              <div class="pic">
                <img src="static/uploads/widget_3.jpg" alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <p class="title">老外偷拍桂林芦笛岩洞 美如“地下彩虹”</p>
              <p class="reading">阅读(819)</p>
              <div class="pic">
                <img src="static/uploads/widget_4.jpg" alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <p class="title">doge神烦狗打底南瓜裤 就是如此魔性</p>
              <p class="reading">阅读(819)</p>
              <div class="pic">
                <img src="static/uploads/widget_5.jpg" alt="">
              </div>
            </a>
          </li>
        </ul>
      </div>
      <div class="widgets">
        <h4>最新评论</h4>
        <ul class="body discuz">
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="static/uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="static/uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="static/uploads/avatar_2.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="static/uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="static/uploads/avatar_2.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="static/uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div> -->
    <?php include_once './public/_aside.php' ?>
    <div class="content">
      <div class="panel new">
      <h3><?php echo $getArr[0]['name']; ?></h3>
        <?php foreach($getArr as $key => $value): ?>
        <div class="entry">
          <div class="head">
            <a href="detail.php?postId=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a>
          </div>
          <div class="main">
            <p class="info"><?php echo $value['nickname']; ?> 发表于 <?php echo $value['created']; ?></p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(<?php echo $value['views']; ?>)</span>
              <span class="comment">评论(<?php echo $value['commentsCount']; ?>)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(<?php echo $value['likes']; ?>)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span><?php echo $value['name']; ?></span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="static/uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div>
        <?php endforeach; ?>
        
        <div class="loadmore">
           <span class="btn">加载更多</span>
        </div>
        <!-- <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="static/uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div> -->
        <!-- <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="static/uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div> -->
      </div>
      <!-- <div class="loadmore">
          <span class="btn">加载更多</span>
      </div> -->
    </div>
    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>
  <script src="static/assets/vendors/jquery/jquery.min.js"></script>
  <script>
    $(function () {
      var currentPage = 1;
      $('.loadmore .btn').on('click', function () {
        var catagoryId = location.search.split('=')[1];
        // console.log(catagoryId);
        currentPage++;
          $.ajax({
            type: "post",
            url: "api/_getMorePost.php",
            data: {
              currentPage: currentPage,
              pageSize: 10,
              catagoryId: catagoryId
            },
            dataType: "json",
            success: function (response) {
              console.log(response);

            if (response.code == 1) {
              var data = response.data;
              // console.log(data);
              var dataArr = [];
              $.each(data, function (index, value) {
                dataArr.push(`<div class="entry">
                <div class="head">
                  <a href="detail.php?postId=${value['id']}">${value['title']}</a>
                </div>
                <div class="main">
                  <p class="info">${value['nickname']} 发表于 ${value['content']}</p>
                  <p class="brief">${value['title']}</p>
                  <p class="extra">
                    <span class="reading">阅读(${value['views']})</span>
                    <span class="comment">评论(${value['commentsCount']})</span>
                    <a href="javascript:;" class="like">
                      <i class="fa fa-thumbs-up"></i>
                      <span>赞(${value['likes']})</span>
                    </a>
                    <a href="javascript:;" class="tags">
                      分类：<span>${value['name']}</span>
                    </a>
                  </p>
                  <a href="javascript:;" class="thumb">
                    <img src="static/uploads/hots_2.jpg" alt="">
                  </a>
                </div>
                </div>`);
              });

            // console.log(dataArr);
            var dataStr = $(dataArr.join(''));
            // console.log(dataStr);
            dataStr.insertBefore('.loadmore'); 
            console.log(response);
            var maxPage = Math.ceil(response.getCount / 100);
              if (currentPage == maxPage){
                $('.loadmore .btn').hide();
              }  
            }
            }  
          });
      });      
    });
  </script>
  <!-- <script>
    $(function () {
      var currentPage = 1;
      $('.loadmore .btn').on('click', function () {
        var catagoryId = location.search.split('=')[1];
        currentPage++;
        $.ajax({
          type: 'post',
          url: 'api/_getMorePost.php',
          data: {
            currentPage: currentPage,
            pageSize: 10,
            catagoryId: catagoryId
          },
          dataType: 'json',
          success: function (response) {
            if (response.code == 1) {
              var data = response.data;
              var dataArr = [];
              $.each(data, function (index, value)) {
                dataArr.push(`<div class="entry">
                <div class="head">
                  <a href="detail.php?postId=${value['id']}">${value['title']}</a>
                </div>
                <div class="main">
                  <p class="info">${value['nickname']} 发表于 ${value['content']}</p>
                  <p class="brief">${value['title']}</p>
                  <p class="extra">
                    <span class="reading">阅读(${value['views']})</span>
                    <span class="comment">评论(${value['commentsCount']})</span>
                    <a href="javascript:;" class="like">
                      <i class="fa fa-thumbs-up"></i>
                      <span>赞(${value['likes']})</span>
                    </a>
                    <a href="javascript:;" class="tags">
                      分类：<span>${value['name']}</span>
                    </a>
                  </p>
                  <a href="javascript:;" class="thumb">
                    <img src="static/uploads/hots_2.jpg" alt="">
                  </a>
                </div>
                </div>`);
              });
              var dataStr = $(dataArr.join(''));
              dataStr.inserBefore('.loadmore');
              console.log(response);
              var maxPage = Math.ceil(response.getCount / 100);
                if (currentPage == maxPage) {
                  $('.loadmore .btn').hide();
                }
            }
          }
        });
      });
    });
  </script> -->
</body>
</html>
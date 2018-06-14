<?php
  include_once '../static/config.php';
  include_once '../static/select.php';
  // print_r($_POST);
  $catagoryId = $_POST['catagoryId'];
  $currentPage = $_POST['currentPage'];
  $pageSize = $_POST['pageSize'];
  $start = ($currentPage - 1) * $pageSize;
  $sql = "SELECT p.id, p.title, p.feature, p.created, p.content, p.views, p.likes, c.`name`, u.`nickname`, (SELECT COUNT(id) FROM comments WHERE post_id= p.id) AS commentsCount FROM posts p LEFT JOIN 
  categories c ON c.`id` = p.`category_id` LEFT JOIN users u ON u.id = p.`user_id` WHERE p.`category_id` = {$catagoryId} ORDER BY p.`created` DESC LIMIT $start, $pageSize";
 
  $getMoreArr = select($sql);
  $sql1 = "SELECT COUNT(id) AS pageCount FROM posts WHERE category_id = {$catagoryId}";
  $getCount = select($sql1)[0]['pageCount'];
  // echo $getCount;
  $response = ["code" => 0, "msg" => "操作失败"];
  if ($getMoreArr) {
      $response["code"] = 1;
      $response["msg"] = "操作成功";
      $response["getCount"] = $getCount;      
      $response['data'] = $getMoreArr;
  }
  header('content-type:application/json;charset=utf-8');
  echo json_encode($response);
?>
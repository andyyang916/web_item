<?php
    require_once '../../static/config.php';
    require_once '../../static/select.php';

    // print_r($_POST);
    // 获取当前页码数
    $currentPage = $_POST['currentPage'];
    $pageSize = $_POST['pageSize'];
    $offset = ($currentPage - 1) * $pageSize;
    // 编写sql查询语句
    $sql = "SELECT c.id, c.author, c.content, p.title, c.created, c.status FROM comments c 
    LEFT JOIN posts p ON c.post_id = p.id LIMIT {$offset}, {$pageSize}";
    $data = select($sql);

    $countSql = "select count(id) as count from Comments";
    $countArr = select($countSql);
    $count = $countArr[0]['count'];
    $pageCount = ceil($count / $pageSize);
    $response = ['code' => 0, 'msg' => '操作失败'];
    // 判断是否有数据，如果有将数据返回给前台
    if ($data) {
        $response['code'] = 1;
        $response['msg'] = '操作成功';
        $response['data'] = $data;
        $response['pageCount'] = $pageCount;
    }
    header('content-type:application/json');
    echo json_encode($response);

?>
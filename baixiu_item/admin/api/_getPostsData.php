<?php 
    // require_once '../../static/config.php';
    // require_once '../../static/select.php';

    // print_r($_POST);
    // $currentPage = $_POST['currentPage'];
    // $pageSize = $_POST['pageSize'];
    // $status = $_POST['status'];
    // $categoryId = $_POST['catagoryId'];

    // $where = "where 1=1";
    // if ($status != "all") {
    //     $where.= " and p.status = '{$status}'";
    // }
    // if ($category != "all") {
    //     $where.= "and p.category_id = '{$status}'";
    // }
    // $offset = ($currentPage - 1) * $pageSize;
//     $sql = "SELECT p.`id`, p.`title`, u.`nickname`, c.`name`, p.`created`, p.`status` FROM posts p
//     LEFT JOIN users u ON p.`user_id` = u.`id`
// LEFT JOIN categories c ON p.`category_id` = c.`id`";
    // $sql = "SELECT p.`id`, p.`title`, u.`nickname`, c.`name`, p.`created`, p.`status` FROM posts p
    // LEFT JOIN users u ON p.`user_id` = u.`id`
// -- LEFT JOIN categories c ON p.`category_id` = c.`id` LIMIT {$currentPage}, {$pageSize}";
// // $sql = "SELECT p.`id`, p.`title`, u.`nickname`, c.`name`, p.`created`, p.`status` FROM posts p
// LEFT JOIN users u ON p.`user_id` = u.`id`
// LEFT JOIN categories c ON p.`category_id` = c.`id` 
// ". $where ."
// LIMIT {$currentPage}, {$pageSize}";

    
    // $postsRes = select($sql);

    // $countSql="select count(*) as count from posts";
    // $countArr = select($countSql);
    // $postCount = $countArr[0]['count'];
    // $pageCount = ceil($postCount / $pageSize);
    // // print_r($loginRes);
    // $response = ['code' => 0, 'msg' => '操作失败'];
    // if ($postsRes) {
    //     $response['code'] = 1;
    //     $response['msg'] = '操作成功';
    //     $response['postsRes'] = $postsRes;
    //     $response['pageCount'] = $pageCount;
    // }
    // header('content-type:application/json');
    // echo json_encode($response);
?>
<?php
    require_once '../../static/config.php';
    require_once '../../static/select.php';
    // 获取点击li按钮传递过来的参数
    // print_r($_POST);
    $currentPage = $_POST['currentPage'];
    $pageSize = $_POST['pageSize'];

    $status = $_POST['status'];
    $categoryId = $_POST['categoryId'];

    $offset = ($currentPage - 1) * $pageSize;

    $where = "where 1 = 1";

    if ($status != 'all') {
        $where .= " and p.`status` = '{$status}'";
    }

    if ($categoryId != 'all') {
        $where .= " and p.`category_id` = '{$categoryId}'";
    }

    // 查询所有文章项目
    $sql = "SELECT p.`id`, p.`title`, u.`nickname`, c.`name`, p.`created`, p.`status` FROM posts p
    LEFT JOIN users u ON p.`user_id` = u.`id`
    LEFT JOIN categories c ON p.`category_id` = c.`id` ".$where." LIMIT {$offset}, {$pageSize}";

    // $sqlCount = "SELECT COUNT(*) AS count FROM posts";
    // $countArr = select($sqlCount);
    // $pageCount = ceil($countArr[0]['count'] / $pageSize);
    // echo $pageCount;
    $data = select($sql);

    // 计算满足条件文章的总条数 这种方法可以实时算出筛选文章的总
    $sqlCount = "SELECT p.`id`, p.`title`, u.`nickname`, c.`name`, p.`created`, p.`status` FROM posts p
    LEFT JOIN users u ON p.`user_id` = u.`id`
    LEFT JOIN categories c ON p.`category_id` = c.`id` ".$where."";
    $countArr = select($sqlCount);
    $pageCount = ceil(count($countArr) / $pageSize);


    $response =['code' => 0, 'msg' => '操作失败'];  
    if ($data) {
        $response['code'] = 1;
        $response['msg'] = '操作成功';
        $response['data'] = $data;
        $response['pageCount'] = $pageCount;
    }
    header('content-type:application/json');
    echo json_encode($response);
?>
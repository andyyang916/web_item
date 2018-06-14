<?php
    require_once '../../static/config.php';
    require_once '../../static/select.php';

    // print_r($_POST);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users where `email` = '{$email}' AND `password` = '{$password}' AND `status` = 'activated'";
    $loginRes = select($sql);
    // print_r($loginRes);
    $response = ['code' => 0, 'msg' => '操作失败'];
    if ($loginRes) {
        session_start();
        $_SESSION['isLogin'] = 1;
        $_SESSION['user_id'] = $loginRes[0]['id']; // 记录用户id值

        $response['code'] = 1;
        $response['msg'] = '操作成功';
    }
    header('content-type:application/json');
    echo json_encode($response);
?>
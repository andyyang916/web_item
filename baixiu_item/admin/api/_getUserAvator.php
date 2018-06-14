<?php
    require_once '../../static/config.php';
    require_once '../../static/select.php';
    session_start();
    $userId = $_SESSION['user_id'];
    // echo $userId;
    $sql = "select * from users where `id` = {$userId}";
    $res = select($sql);
    // print_r($res);
    $response = ['code' => 0, 'msg' => '操作失败'];
    if ($res) {
        $response['code'] = 1;
        $response['msg'] = '操作成功';
        $response['nickname'] = $res[0]['nickname'];
        $response['avatar'] = $res[0]['avatar'];
    }
    header('content-type:application/json;charset=utf-8');
    echo json_encode($response);
?>
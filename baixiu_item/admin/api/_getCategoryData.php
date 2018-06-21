<?php 
    require_once '../../static/config.php';
    require_once '../../static/select.php';

    $sql = "SELECT * FROM categories";
    $cateRes = select($sql);
    // print_r($loginRes);
    $response = ['code' => 0, 'msg' => '操作失败'];
    if ($cateRes) {
        $response['code'] = 1;
        $response['msg'] = '操作成功';
        $response['cateRes'] = $cateRes;
    }
    header('content-type:application/json');
    echo json_encode($response);
?>

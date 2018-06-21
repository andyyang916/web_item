<?php
    require_once '../../static/config.php';
    require_once '../../static/select.php';  
    
    $sql = "DELETE FROM categories WHERE `id` IN  ('".implode("','", $_POST['ids'])."')";
    $res = opt($sql);
    $response = ['code' => 0, 'msg' => '操作失败'];
    if ($res) {
        $response['code'] = 1;
        $response['msg'] = '操作成功';
    }
    header('content-type:application/json');
    echo json_encode($response);
?>
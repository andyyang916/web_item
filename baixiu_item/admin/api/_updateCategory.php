<?php
    require_once '../../static/config.php';
    require_once '../../static/select.php';  
    
    $sql = "update categories set `name` = '{$_POST['name']}' , `slug` = '{$_POST['slug']}' , `classname` = '{$_POST['classname']}' where id = '{$_POST['categoryId']}'";
    $res = opt($sql);
    $response = ['code' => 0, 'msg' => '操作失败'];
    if ($res) {
        $response['code'] = 1;
        $response['msg'] = '操作成功';
    }
    header('content-type:application/json');
    echo json_encode($response);
?>
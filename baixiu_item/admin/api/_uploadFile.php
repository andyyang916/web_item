<?php
    // print_r($_FILES);
    // 获取文件扩展名
    $file = $_FILES['file'];
    // print_r($file);
    $ext = strrchr($file['name'], '.');
    // echo $ext;
    $fileName = time() . rand(1000, 9999) . $ext;
    // echo $fileName;
    // 创建唯一的文件名  时间戳 + 随机数 + 扩展名

    // 将临时文件存放到本地文件目录下
    $bool = move_uploaded_file($file['tmp_name'], '../../static/uploads/'.$fileName);
    // 如果上传成功，将图片显示在前台页面
    $response = ['code' => 0, 'msg' => '操作失败'];
    if ($bool) {
        $response['code'] = 1;
        $response['msg'] = '操作成功';
        $response['src'] = '/static/uploads/'.$fileName;
    }

    // 以json格式返回
    header('content-type:application/json');
    echo json_encode($response);
?>
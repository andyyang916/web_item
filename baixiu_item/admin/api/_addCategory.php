<?php
    require_once '../../static/config.php';
    require_once '../../static/select.php';  
    $name = $_POST['name'];
    $sql = "SELECT count(*) as count FROM categories  where `name` = '{$name}'";
    $cateRes = select($sql);
    // print_r($cateRes);
    $response = ['code' => 0, 'msg' => '操作失败'];
    if ($cateRes[0]['count'] > 0) {
        $response['msg'] = '分类名称已经存在,请重新添加';
    } else {
        $keys = array_keys($_POST);
        $values = array_values($_POST);
        $sql1 = "insert into categories (".implode(',', $keys).") values ('".implode("','", $values)."')";
        // $sql1 = "INSERT INTO categories (`name`, slug, classname) VALUES ('{$_POST['name']}', '{$_POST['slug']}', '{$_POST['classname']}')";
        // $sql1 = "INSERT INTO categories (`name`, slug, classname) VALUES ('敲', 'uu', 'fc-uu')";
        // $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);        
        // $res = mysqli_query($conn, $sql1);
        $res1 = opt($sql1);

        $sql2 = "SELECT `id` FROM categories  where `name` = '{$name}'";
        $res2 = select($sql2);
        // var_dump($res2);
        // var_dump($res);
        if ($res1) {
            $response['code'] = 1;
            $response['msg'] = '操作成功';
            $response['id'] = $res2[0]['id'];
        }

    }
    header('content-type:application/json');
    echo json_encode($response);
?>
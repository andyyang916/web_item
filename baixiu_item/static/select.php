<?php
    function select($sql) {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
        if (!$conn) {
            die('could not connect:'. mysqli_error());
        }
        mysqli_set_charset($conn, 'utf8');
        $res = mysqli_query($conn, $sql);
        if (!$res) {
            die('未搜索到结果');
        } else if ($res && mysqli_num_rows($res) == 0) {
            die('暂无数据');
        } else {
            $arr = [];
            while ($row = mysqli_fetch_assoc($res)) {
                $arr[] = $row;
            }
            // print_r($arr);
        };
        return $arr;
    }
    function opt($sql) {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
        if (!$conn) {
            die('could not connect:'. mysqli_error());
        }
        mysqli_set_charset($conn, 'utf8');
        $res = mysqli_query($conn, $sql);
        return $res;
    }
    function checkLogin() {
        session_start();
        if (!isset($_SESSION) || $_SESSION['isLogin'] != 1) {
            header('location:login.php');
        }
    }
?>
<?php

session_start();
include('database/connect.php');

// code của settings
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['change_pass'])) {
    $partten = "/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/";
    $current_password = $_POST['current-password'];
    $new_password = $_POST['new-password'];
    $verify_password = $_POST['verify-password'];
    // kiểm tra mật khẩu có hợp lệ
    if (preg_match($partten, $current_password)) {
        if ($new_password == $verify_password) {
            if ($current_password != $verify_password) {
                $ret = mysqli_query($con, "SELECT * FROM accounts where password='" . $current_password . "' and account_id='" . $_SESSION['account_id'] . "';");
                $num = mysqli_fetch_array($ret);
                if ($num > 0) {
                    $ret1 = mysqli_query($con, "UPDATE accounts SET password='" . $new_password . "' WHERE account_id='" . $_SESSION['account_id'] . "';");
                    $num1 = mysqli_fetch_array($ret);
                    if ($num > 0) {
                        echo "<script>alert('Cập nhật mật khẩu thành công!');</script>";
                        header("location:settings.php");
                    } else {
                        echo "<script>alert('Cập nhật mật khẩu không thành công!');</script>";
                    }
                } else {
                    echo "<script>alert('Mật khẩu cũ không chính xác!');</script>";
                }
            } else {
                echo "<script>alert('Mật khẩu mới phải khác mật khẩu cũ!');</script>";
            }
        } else {
            echo "<script>alert('Mật khẩu mới không khớp!');</script>";
        }
    } else {
        echo "<script>alert('Mật khẩu không đúng định dạng!');</script>";
    }
}
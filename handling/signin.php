<?php

session_start();
$_SESSION['demo']='template.min.css';
include('database/connect.php');

// code của login
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['login'])) {
    $email = test_input($_POST['email']);
    // kiểm tra email có hợp lệ
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $password = test_input($_POST['password']);
        $ret = mysqli_query($con, "SELECT account_id, account_name FROM accounts WHERE email='$email' and password='$password';");
        $num = mysqli_fetch_array($ret);
        if ($num > 0) {
            $_SESSION['account_id'] = $num['account_id'];
            $_SESSION['account_name'] = $num['account_name'];
            $ret1 = mysqli_query($con, "UPDATE accounts SET account_status=2 WHERE account_id='" . $_SESSION['account_id'] . "';");
            header("location:index.php");
        } else {
            echo "<script>alert('Mật khẩu hoặc tài khoản không chính xác!');</script>";
        }
    } else {
        echo "<script>alert('Email không đúng định dạng!');</script>";
    }
}
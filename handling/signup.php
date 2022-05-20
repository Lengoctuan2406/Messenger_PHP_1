<?php

session_start();
include('database/connect.php');

if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // kiểm tra email có hợp lệ
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $ret = mysqli_query($con, "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')");
        if ($ret > 0) {
            echo "<script>alert('Tạo tài khoản thành công!');</script>";
        } else {
            echo "<script>alert('Tạo tài khoản không thành công!');</script>";
        }
    } else {
        echo "<script>alert('Email không đúng định dạng!');</script>";
    }
}
<?php

session_start();
//nếu chưa đăng nhập thì phải đăng nhập
if (strlen($_SESSION['account_id'] == 0)) {
    header('location:signin.php');
}

//kết nối database
include('database/connect.php');

//tạo một cuộc trò chuyện mới giữa hai người bạn
if (isset($_GET['account_friend_id'])) {
    $query_chat_exist = mysqli_query($con, "SELECT * FROM chat_" . $_SESSION['account_id'] . "_" . $_GET['account_friend_id'] . ";");
    if ($query_chat_exist) {
        $_SESSION['name_chat_with'] = "chat_" . $_SESSION['account_id'] . "_" . $_GET['account_friend_id'];
    } else {
        try {
            $_SESSION['name_chat_with'] = "chat_" . $_SESSION['account_id'] . "_" . $_GET['account_friend_id'];
            //tạo bảng cho cuộc trò chuyện mới
            $sql = "create table chat_" . $_SESSION['account_id'] . "_" . $_GET['account_friend_id'] . " (
	id int(50) primary key AUTO_INCREMENT,
	account_id int(5),
	text mediumtext,
	status_id int(5),
	created_date datetime);";
            $create_table = mysqli_query($con, $sql);
            //thêm cuộc trò chuyện với vào cả hai bên
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $currentTime = date('Y-m-d H:i:s', time());
            $insert_chats1 = mysqli_query($con, "INSERT INTO chats (account_id, name_chat_with, modified_date) VALUES ('" . $_SESSION['account_id'] . "', 'chat_" . $_SESSION['account_id'] . "_" . $_GET['account_friend_id'] . "', '$currentTime');");
            $insert_chats2 = mysqli_query($con, "INSERT INTO chats (account_id, name_chat_with, modified_date) VALUES ('" . $_GET['account_friend_id'] . "', 'chat_" . $_SESSION['account_id'] . "_" . $_GET['account_friend_id'] . "', '$currentTime');");
        } catch (Exception $e) {
            echo "<script>alert('Xảy ra lỗi khi cố tạo cuộc trò chuyện mới!');</script>";
        }
    }
}

//đăng xuất
if (isset($_GET['signout'])) {
    $change_status = mysqli_query($con, "UPDATE accounts SET status_id=1 WHERE account_id='" . $_SESSION['account_id'] . "';");
    session_destroy();
    header('location:signin.php');
}

//thay đổi nền website
if (isset($_GET['demo'])) {
    $_SESSION['demo'] = $_GET['demo'];
}

//tạo session để hiện thông tin tin nhắn chi tiết giữa 2 người
if (isset($_GET['name_chat_with'])) {
    $_SESSION['name_chat_with'] = $_GET['name_chat_with'];
}

<?php

session_start();
//nếu chưa đăng nhập thì phải đăng nhập
if (strlen($_SESSION['account_id'] == 0)) {
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
include('database/connect.php');
//tạo một cuộc trò chuyện mới giữa hai người bạn
if (isset($_GET['account_friend_id'])) {
    $_SESSION['name_chat_with'] = "chat_" . $_SESSION['account_id'] . "_" . $_GET['account_friend_id'];
    $sql = "create table chat_" . $_SESSION['account_id'] . "_" . $_GET['account_friend_id'] . " (
	id int(50) primary key AUTO_INCREMENT,
	account_id int(5),
	text mediumtext,
	status_id int(5),
	created_date datetime);";
    $create_table = mysqli_query($con, $sql);

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $currentTime = date('Y-m-d H:i:s', time());
    $insert_chats1 = mysqli_query($con, "INSERT INTO chats (account_id, name_chat_with, modified_date) VALUES ('" . $_SESSION['account_id'] . "', 'chat_" . $_SESSION['account_id'] . "_" . $_GET['account_friend_id'] . "', '$currentTime');");
    $insert_chats2 = mysqli_query($con, "INSERT INTO chats (account_id, name_chat_with, modified_date) VALUES ('" . $_GET['account_friend_id'] . "', 'chat_" . $_SESSION['account_id'] . "_" . $_GET['account_friend_id'] . "', '$currentTime');");
    header('location:chat-1.html');
}
//lấy ra thông tin của tài khoản
$query_user = mysqli_query($con, "SELECT * FROM accounts WHERE account_id='" . $_SESSION['account_id'] . "';");
//lấy ra bạn bè của mình
$query_friends = mysqli_query($con, "SELECT * FROM friends, accounts, status WHERE friends.account_friend_id=accounts.account_id AND accounts.status_id=status.status_id AND friends.account_id='" . $_SESSION['account_id'] . "'"
        . " ORDER BY account_name DESC;");
//lấy ra bạn bè hiện trạng thái online và tên bảng chát của họ
$query_friends_online = mysqli_query($con, "SELECT * FROM friends, accounts, chats WHERE friends.account_friend_id=accounts.account_id AND chats.account_id=friends.account_friend_id AND friends.account_id='" . $_SESSION['account_id'] . "'"
        . " ORDER BY status_id DESC;");
//lấy ra các cuộc trò chuyện
$query_chats = mysqli_query($con, "SELECT * FROM chats WHERE account_id='" . $_SESSION['account_id'] . "';");

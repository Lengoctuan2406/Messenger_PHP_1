<?php

session_start();
if (strlen($_SESSION['account_id'] == 0)) {
    header('location:signin.php');
}
if(isset($_GET['demo'])) {
    $_SESSION['demo']=$_GET['demo'];
}
include('database/connect.php');
$query_user = mysqli_query($con, "SELECT * FROM accounts where account_id='" . $_SESSION['account_id'] . "';");

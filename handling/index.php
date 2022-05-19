<?php

session_start();
include('database/connect.php');
if (strlen($_SESSION['account_id'] == 0)) {
    header('location:signin.php');
}
$query_user = mysqli_query($con, "SELECT * FROM accounts where account_id='".$_SESSION['account_id']."';");
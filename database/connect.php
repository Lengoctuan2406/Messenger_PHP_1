<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
//tên database
define('DB_NAME', 'messenger_php_1');
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
//kiểm tra connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
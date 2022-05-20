<?php

session_start();
include('database/connect.php');

// xóa kí tự đặc biệt
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['change_pass'])) {
    $current_password = test_input($_POST['current-password']);
    $new_password = $_POST['new-password'];
    $verify_password = $_POST['verify-password'];
    // kiểm tra mật khẩu có đủ mạnh và có khớp với nhau
    if (!empty($new_password) && $new_password != "") {
        if (strlen($new_password) <= '8') {
            echo "<script>alert('Mật khẩu phải chứa ít nhất 8 kí tự!');</script>";
        } elseif (!preg_match("#[0-9]+#", $new_password)) {
            echo "<script>alert('Mật khẩu phải chứa ít nhất 1 số!');</script>";
        } elseif (!preg_match("#[A-Z]+#", $new_password)) {
            echo "<script>alert('Mật khẩu phải chứa ít nhất 1 chữ in hoa!');</script>";
        } elseif (!preg_match("#[a-z]+#", $new_password)) {
            echo "<script>alert('Mật khẩu phải chứa ít nhất 1 chữ thường!');</script>";
        } elseif (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $new_password)) {
            echo "<script>alert('Mật khẩu phải chứa ít nhất 1 chữ cái đặc biệt!');</script>";
        } elseif ($new_password != $verify_password) {
            echo "<script>alert('Mật khẩu mới không khớp với nhau!');</script>";
        } elseif ($current_password == $new_password) {
            echo "<script>alert('Mật khẩu cũ không được giống mật khẩu mới!');</script>";
        } else {
            // cập nhật mật khẩu lên database
            $ret = mysqli_query($con, "SELECT * FROM accounts where password='" . $current_password . "' and account_id='" . $_SESSION['account_id'] . "';");
            $num = mysqli_fetch_array($ret);
            if ($num > 0) {
                $ret1 = mysqli_query($con, "UPDATE accounts SET password='" . $new_password . "' WHERE account_id='" . $_SESSION['account_id'] . "';");
                if ($ret1) {
                    echo "<script>alert('Cập nhật mật khẩu thành công!');</script>";
                } else {
                    echo "<script>alert('Cập nhật mật khẩu không thành công!');</script>";
                }
            } else {
                echo "<script>alert('Mật khẩu cũ không chính xác!');</script>";
            }
        }
    } else {
        echo "<script>alert('Hãy nhập mật khẩu mới của bạn!');</script>";
    }
}

if (isset($_POST['social'])) {
    $count = 0;
    $twitter = $_POST['twitter'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $github = $_POST['github'];
    $slack = $_POST['slack'];
    if (!empty($twitter)) {
        if (!filter_var($twitter, FILTER_VALIDATE_URL)) {
            echo "<script>alert('Đường dẫn Twitter không hợp lệ!');</script>";
            $count++;
        } else {
            if (!preg_match('/twitter/i', $twitter)) {
                echo "<script>alert('Đường dẫn Twitter không đúng trang chủ!');</script>";
                $count++;
            }
        }
    }
    if (!empty($facebook)) {
        if (!filter_var($facebook, FILTER_VALIDATE_URL)) {
            echo "<script>alert('Đường dẫn Facebook không hợp lệ!');</script>";
            $count++;
        } elseif (filter_var($facebook, FILTER_VALIDATE_URL) && !preg_match('/facebook/i', $facebook)) {
            echo "<script>alert('Đường dẫn Facbook không đúng trang chủ!');</script>";
            $count++;
        }
    }
    if (!empty($instagram)) {
        if (!filter_var($instagram, FILTER_VALIDATE_URL)) {
            echo "<script>alert('Đường dẫn Instagram không hợp lệ!');</script>";
            $count++;
        } elseif (filter_var($instagram, FILTER_VALIDATE_URL) && !preg_match('/instagram/i', $instagram)) {
            echo "<script>alert('Đường dẫn Instagram không đúng trang chủ!');</script>";
            $count++;
        }
    }
    if (!empty($github)) {
        if (!filter_var($github, FILTER_VALIDATE_URL)) {
            echo "<script>alert('Đường dẫn Github không hợp lệ!');</script>";
            $count++;
        } elseif (filter_var($github, FILTER_VALIDATE_URL) && !preg_match('/github/i', $github)) {
            echo "<script>alert('Đường dẫn Github không đúng trang chủ!');</script>";
            $count++;
        }
    }
    if (!empty($slack)) {
        if (!filter_var($slack, FILTER_VALIDATE_URL)) {
            echo "<script>alert('Đường dẫn Slack không hợp lệ!');</script>";
            $count++;
        } elseif (filter_var($slack, FILTER_VALIDATE_URL) && !preg_match('/slack/i', $slack)) {
            echo "<script>alert('Đường dẫn Slack không đúng trang chủ!');</script>";
            $count++;
        }
    }
    if ($count == 0) {
        $ret = mysqli_query($con, "UPDATE accounts SET twitter='" . $twitter . "', facebook='" . $facebook .
                "', instagram='" . $instagram . "', github='" . $github . "', slack='" . $slack . "' WHERE account_id='" . $_SESSION['account_id'] . "';");
        if ($ret) {
            echo "<script>alert('Cập nhật thành công!');</script>";
        } else {
            echo "<script>alert('Cập nhật không thành công!');</script>";
        }
    }
}

// query bảng accounts
$query_user = mysqli_query($con, "SELECT * FROM accounts where account_id='" . $_SESSION['account_id'] . "';");

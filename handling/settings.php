<?php

session_start();
//chưa đăng nhập thì phải đăng nhập
if (strlen($_SESSION['account_id'] == 0)) {
    header('location:signin.php');
}
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
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $currentTime = date('Y-m-d H:i:s', time());
                $ret1 = mysqli_query($con, "UPDATE accounts SET password='" . $new_password . "', modified_date='" . $currentTime . "' WHERE account_id='" . $_SESSION['account_id'] . "';");
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
    $allowUpload = true;
    $twitter = $_POST['twitter'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $github = $_POST['github'];
    $slack = $_POST['slack'];
    if (!empty($twitter)) {
        if (!filter_var($twitter, FILTER_VALIDATE_URL)) {
            echo "<script>alert('Đường dẫn Twitter không hợp lệ!');</script>";
            $allowUpload = false;
        } else {
            if (!preg_match('/twitter/i', $twitter)) {
                echo "<script>alert('Đường dẫn Twitter không đúng trang chủ!');</script>";
                $allowUpload = false;
            }
        }
    }
    if (!empty($facebook)) {
        if (!filter_var($facebook, FILTER_VALIDATE_URL)) {
            echo "<script>alert('Đường dẫn Facebook không hợp lệ!');</script>";
            $allowUpload = false;
        } else {
            if (!preg_match('/facebook/i', $facebook)) {
                echo "<script>alert('Đường dẫn Facbook không đúng trang chủ!');</script>";
                $allowUpload = false;
            }
        }
    }
    if (!empty($instagram)) {
        if (!filter_var($instagram, FILTER_VALIDATE_URL)) {
            echo "<script>alert('Đường dẫn Instagram không hợp lệ!');</script>";
            $allowUpload = false;
        } else {
            if (!preg_match('/instagram/i', $instagram)) {
                echo "<script>alert('Đường dẫn Instagram không đúng trang chủ!');</script>";
                $allowUpload = false;
            }
        }
    }
    if (!empty($github)) {
        if (!filter_var($github, FILTER_VALIDATE_URL)) {
            echo "<script>alert('Đường dẫn Github không hợp lệ!');</script>";
            $allowUpload = false;
        } else {
            if (!preg_match('/github/i', $github)) {
                echo "<script>alert('Đường dẫn Github không đúng trang chủ!');</script>";
                $allowUpload = false;
            }
        }
    }
    if (!empty($slack)) {
        if (!filter_var($slack, FILTER_VALIDATE_URL)) {
            echo "<script>alert('Đường dẫn Slack không hợp lệ!');</script>";
            $allowUpload = false;
        } else {
            if (!preg_match('/slack/i', $slack)) {
                echo "<script>alert('Đường dẫn Slack không đúng trang chủ!');</script>";
                $allowUpload = false;
            }
        }
    }
    if ($allowUpload) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentTime = date('Y-m-d H:i:s', time());
        $ret = mysqli_query($con, "UPDATE accounts SET twitter='" . $twitter . "', facebook='" . $facebook .
                "', instagram='" . $instagram . "', github='" . $github . "', slack='" . $slack . "', modified_date='" . $currentTime . "' WHERE account_id='" . $_SESSION['account_id'] . "';");
        if ($ret) {
            echo "<script>alert('Cập nhật thành công!');</script>";
        } else {
            echo "<script>alert('Cập nhật không thành công!');</script>";
        }
    }
}
// cập nhật thông tin cá nhân
if (isset($_POST['change_info'])) {
    $file = $_POST['file'];
    $account_name = $_POST['account_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];

    $allowUpload = true;
    //kiểm tra dữ liệu ảnh đã upload chưa
    if (strlen($_FILES["fileupload"]["name"]) == 0) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            if (preg_match('/^[0-9]+$/', $phone)) {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $currentTime = date('Y-m-d H:i:s', time());
                $ret = mysqli_query($con, "UPDATE accounts SET account_name='" . $account_name . "', avatar='" . $file . "', "
                        . "phone='" . $phone . "', email='" . $email . "', bio='" . $bio . "', modified_date='" . $currentTime . "' WHERE account_id='" . $_SESSION['account_id'] . "';");
                if ($ret) {
                    echo "<script>alert('Cập nhật thành công!');</script>";
                } else {
                    echo "<script>alert('Cập nhật không thành công!');</script>";
                }
            } else {
                echo "<script>alert('Số điện thoại không đúng định dạng!');</script>";
            }
        } else {
            echo "<script>alert('Email không đúng định dạng!');</script>";
        }
    } else {
        //Thư mục bạn sẽ lưu file upload
        $target_dir = "assets/images/avatars/";

        //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
        $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);

        //Lấy phần mở rộng của file (jpg, png, ...)
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        //Cỡ lớn nhất được upload (bytes)
        $maxfilesize = 3000000;

        //Những loại file được phép upload
        $allowtypes = array('jpg', 'png', 'jpeg', 'gif');

        //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
        $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
        if ($check !== false) {
            echo "<script>alert('Đây là file ảnh - " . $check["mime"] . "!');</script>";
            $allowUpload = true;
        } else {
            echo "<script>alert('Không phải file ảnh!');</script>";
            $allowUpload = false;
        }

        //Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
        //Bạn có thể phát triển code để lưu thành một tên file khác
        if (file_exists($target_file)) {
            echo "<script>alert('Tên file đã tồn tại trên server, không được ghi đè!');</script>";
            $allowUpload = false;
        }
        //Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
        if ($_FILES["fileupload"]["size"] > $maxfilesize) {
            echo "<script>alert('Không được upload ảnh lớn hơn 3mb!');</script>";
            $allowUpload = false;
        }

        //Kiểm tra kiểu file
        if (!in_array($imageFileType, $allowtypes)) {
            echo "<script>alert('Chỉ được upload các định dạng JPG, PNG, JPEG, GIF!');</script>";
            $allowUpload = false;
        }

        if ($allowUpload) {
            //Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
            if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
                //xóa đường dẫn file ảnh hiện tại
                $ret1 = mysqli_query($con, "SELECT * FROM accounts WHERE account_id='" . $_SESSION['account_id'] . "';");
                $num1 = mysqli_fetch_array($ret1);
                $status = unlink('assets/images/avatars/' . $num1['avatar']);

                if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    if (preg_match('/^[0-9]+$/', $phone)) {
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $currentTime = date('Y-m-d H:i:s', time());
                        $ret = mysqli_query($con, "UPDATE accounts SET account_name='" . $account_name . "', avatar='" . basename($_FILES["fileupload"]["name"]) . "', "
                                . "phone='" . $phone . "', email='" . $email . "', bio='" . $bio . "', modified_date='" . $currentTime . "' WHERE account_id='" . $_SESSION['account_id'] . "';");
                        if ($ret) {
                            echo "<script>alert('Cập nhật thành công!');</script>";
                        } else {
                            echo "<script>alert('Cập nhật không thành công!');</script>";
                        }
                    } else {
                        echo "<script>alert('Số điện thoại không đúng định dạng!');</script>";
                    }
                } else {
                    echo "<script>alert('Email không đúng định dạng!');</script>";
                }
            } else {
                echo "Có lỗi xảy ra khi upload file!";
            }
        } else {
            echo "Không upload được file, có thể do file lớn, kiểu file không đúng!";
        }
    }
}

//query bảng accounts
$query_user = mysqli_query($con, "SELECT * FROM accounts WHERE account_id='" . $_SESSION['account_id'] . "';");

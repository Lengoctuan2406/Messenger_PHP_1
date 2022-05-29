<?php

session_start();
//kết nối với database
include('database/connect.php');

if (isset($_POST['reset'])) {
    $email = $_POST['email'];
    // kiểm tra email có hợp lệ
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        //kiểm tra email có trên database hay không
        $ret = mysqli_query($con, "SELECT * FROM accounts WHERE email='$email';");
        $num = mysqli_fetch_array($ret);
        if ($num > 0) {
            //https://fahmidasclassroom.com/how-to-send-email-in-php-using-mail-function-on-windows/
            ////trong file php.ini
            //SMTP=smtp.gmail.com
            //smtp_port=587
            //sendmail_from = phamthithuha28022001@gmail.com
            //sendmail_path = "C:\xampp\sendmail\sendmail.exe -t"
            //mail.add_x_header=On
            ////trong file sendmail.ini
            //smtp_server=smtp.gmail.com
            //smtp_port=587
            //smtp_ssl=tls
            //error_logfile=error.log
            //debug_logfile=debug.log
            //auth_username='phamthithuha28022001@gmail.com'
            //auth_password='748159263(Tuan)))'
            ////cho phép ứng dụng kém an toàn truy cập vào
            //https://myaccount.google.com/lesssecureapps
            //Email address of the receiver
            $to = $email;
            //Email subject
            $subject = "testing mail() function";
            //Email message
            $message = "Sending email using mail() function";
            //Header information
            $headers = "From: Admin <admin@fahmidasclassroom.com>\r\n";
            //Send email
            if (mail($to, $subject, $message, $headers)) {
                echo "<script>alert('Gửi email thành công!');</script>";
            } else {
                echo "<script>alert('Gửi email không thành công!');</script>";
            }
        } else {
            echo "<script>alert('Email chưa được đăng kí tài khoản!');</script>";
        }
    } else {
        echo "<script>alert('Email không đúng định dạng!');</script>";
    }
}
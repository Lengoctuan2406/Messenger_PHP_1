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
            //vào thư mục php.ini trong đường dẫn C:\xampp\php
            //tìm kiếm 'mail function' và sửa SMTP lại thành email gửi của mình, nhớ bỏ bảo mật 2 lớp trên email
            //SMTP=smtp.gmail.com
            //smtp_port=587
            //sendmail_from = 19522466@gm.uit.edu.vn
            //smtp_server=smtp.gmail.com
            //auth_username=19522466@gm.uit.edu.vn
            //auth_password=748159263(Tuan)
            //smtp_port=587
            //force_sender=19522466@gm.uit.edu.vn






            include('extension/PHPMailer-master/src/PHPMailer.php');
            include('extension/PHPMailer-master/src/SMTP.php');
            include('extension/PHPMailer-master/src/Exception.php');
            $mail = new PHPMailer\PHPMailer\PHPMailer();

            $mail->IsSMTP();                       // telling the class to use SMTP

            $mail->SMTPDebug = 0;
// 0 = no output, 1 = errors and messages, 2 = messages only.

            $mail->SMTPAuth = true;                // enable SMTP authentication
            $mail->SMTPSecure = "tls";              // sets the prefix to the servier
            $mail->Host = "smtp.gmail.com";        // sets Gmail as the SMTP server
            $mail->Port = 587;                     // set the SMTP port for the GMAIL

            $mail->Username = "phamthithuha28022001@gmail.com";  // Gmail username
            $mail->Password = "748159263(Tuan)))";      // Gmail password

            $mail->CharSet = 'windows-1250';
            $mail->SetFrom('phamthithuha28022001@gmail.com', 'Example.com Information');
            $mail->Subject = "helo";
            $mail->ContentType = 'text/plain';
            $mail->IsHTML(false);

            $mail->Body = "khong có gì";
// you may also use $mail->Body = file_get_contents('your_mail_template.html');

            $mail->AddAddress($email, 'Recipients Name');
// you may also use this format $mail->AddAddress ($recipient);

            if (!$mail->Send()) {
                $error_message = "Mailer Error: " . $mail->ErrorInfo;
            } else {
                $error_message = "Successfully sent!";
            }
        } else {
            echo "<script>alert('Email chưa được đăng kí tài khoản!');</script>";
        }
    } else {
        echo "<script>alert('Email không đúng định dạng!');</script>";
    }
}
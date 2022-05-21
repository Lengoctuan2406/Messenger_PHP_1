<?php
include('handling/handling_password_reset.php');
?>
﻿<!DOCTYPE html>
<html lang="en">
    <!-- Head -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">
        <title>Messenger</title>
        <!-- Template core CSS -->
        <link href="assets\css\<?php echo $_SESSION['demo']; ?>" rel="stylesheet">
    </head>
    <!-- Head -->
    <body>
        <div class="layout">
            <div class="container d-flex flex-column">
                <div class="row align-items-center justify-content-center no-gutters min-vh-100">
                    <div class="col-12 col-md-5 col-lg-4 py-8 py-md-11">
                        <!-- Heading -->
                        <h1 class="font-bold text-center">Đặt lại mật khẩu</h1>
                        <!-- Text -->
                        <p class="text-center mb-6">Nhập email để đặt lại mật khẩu của bạn</p>
                        <!-- Form -->
                        <form class="mb-6" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <!-- Email -->
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" class="form-control form-control-lg" name="email" placeholder="Enter your email">
                            </div>
                            <!-- Submit -->
                            <button name="reset" class="btn btn-lg btn-block btn-primary" type="submit">Gửi đường dẫn đặt lại mật khẩu</button>
                        </form>
                        <!-- Text -->
                        <p class="text-center">
                            Bạn đã có tài khoản? <a href="signin.php">Đăng nhập</a>.
                        </p>
                    </div>
                </div> <!-- / .row -->
            </div>
        </div><!-- .layout -->
        <!-- Scripts -->
        <script src="assets\js\libs\jquery.min.js"></script>
        <script src="assets\js\bootstrap\bootstrap.bundle.min.js"></script>
        <script src="assets\js\plugins\plugins.bundle.js"></script>
        <script src="assets\js\template.js"></script>
        <!-- Scripts -->
    </body>
</html>
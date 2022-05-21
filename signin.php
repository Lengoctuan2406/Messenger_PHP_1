<?php
include('handling/handling_signin.php');
?>
﻿<!DOCTYPE html>
<html lang="en">
    <!-- Head -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">
        <title>Messenger</title>
        <!-- file css -->
        <link href="assets\css\<?php echo $_SESSION['demo']; ?>" rel="stylesheet">
    </head>
    <!-- Head -->
    <body>
        <div class="layout">
            <div class="container d-flex flex-column">
                <div class="row align-items-center justify-content-center no-gutters min-vh-100">
                    <div class="col-12 col-md-5 col-lg-4 py-8 py-md-11">
                        <!-- Heading -->
                        <h1 class="font-bold text-center">Đăng nhập</h1>
                        <!-- Text -->
                        <p class="text-center mb-6">Chào mừng bạn đến với Messenger</p>
                        <!-- Form -->
                        <form class="mb-6" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <!-- Email -->
                            <div class="form-group">
                                <label for="email" class="sr-only">Nhập email</label>
                                <input type="email" class="form-control form-control-lg" name="email" placeholder="Nhập email">
                            </div>
                            <!-- Password -->
                            <div class="form-group">
                                <label for="password" class="sr-only">Nhập password</label>
                                <input type="password" class="form-control form-control-lg" name="password" placeholder="Nhập password">
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <a href="password_reset.php">Quên mật khẩu</a>
                            </div>
                            <!-- Submit -->
                            <button class="btn btn-lg btn-block btn-primary" type="submit" name="login">Đăng nhập</button>
                        </form>
                        <!-- Text -->
                        <p class="text-center">
                            Bạn chưa có tài khoản <a href="signup.php">Đăng kí</a>.
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
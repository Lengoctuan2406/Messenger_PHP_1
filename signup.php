<?php
include('handling/signup.php');
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
                        <h1 class="font-bold text-center">Tạo tài khoản mới</h1>
                        <!-- Text -->
                        <p class="text-center mb-6">Chào mừng đến với Messenger</p>
                        <!-- Form -->
                        <form class="mb-6" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name" class="sr-only">Tên của bạn</label>
                                <input name="name" type="text" class="form-control form-control-lg" id="name" placeholder="Nhập tên của bạn">
                            </div>
                            <!-- Email -->
                            <div class="form-group">
                                <label for="email" class="sr-only">Địa chỉ email</label>
                                <input name="email" type="email" class="form-control form-control-lg" id="email" placeholder="Nhập email của bạn">
                            </div>
                            <!-- Password -->
                            <div class="form-group">
                                <label for="password" class="sr-only">Mật khẩu</label>
                                <input name="password" type="password" class="form-control form-control-lg" id="password" placeholder="Nhập mật khẩu của bạn">
                            </div>
                            <!-- Submit -->
                            <button class="btn btn-lg btn-block btn-primary" type="submit" name="create_account">Tạo tài khoản</button>
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
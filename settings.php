<?php
include('handling/settings.php');
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
        <?php
        while ($result = mysqli_fetch_array($query_user)) {
            ?>
            <div class="layout">
                <!-- Navigation -->
                <div class="navigation navbar navbar-light justify-content-center py-xl-7">
                    <!-- Brand -->
                    <a href="index.php" class="d-none d-xl-block mb-6">
                        <img src="assets\images\brand.svg" class="mx-auto fill-primary" data-inject-svg="" alt="" style="height: 46px;">
                    </a>
                </div>
                <!-- Main Content -->
                <div class="main main-visible" data-mobile-height="">
                    <!-- Chat -->
                    <div class="chat">
                        <!-- Chat: body -->
                        <div class="chat-body">
                            <!-- Chat: Header -->
                            <div class="chat-header border-bottom py-4 py-lg-6 px-lg-8">
                                <div class="container-xxl">
                                    <div class="row align-items-center">
                                        <!-- Chat photo -->
                                        <div class="col-6 col-xl-6">
                                            <div class="media text-center text-xl-left">
                                                <div class="media-body align-self-center text-truncate">
                                                    <h6 class="text-truncate mb-n1">Cài đặt</h6>
                                                    <small class="text-muted">Cập nhật thông tin</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .row -->
                                </div>
                            </div>
                            <!-- Chat: Header -->
                            <!-- Chat: Content-->
                            <div class="chat-content px-lg-8">
                                <div class="container-xxl py-6 py-lg-10">
                                    <!-- Accordion -->
                                    <div class="accordion modified-accordion mb-n6 mb-lg-8" id="profile-settings">
                                        <div class="card-columns">

                                            <!-- Card -->
                                            <div class="card mb-6 mb-lg-8">
                                                <div class="card-header position-relative">
                                                    <a href="#" class="text-reset d-block stretched-link collapsed" data-toggle="collapse" data-target="#profile-settings-account" aria-controls="profile-settings-account" aria-expanded="true">
                                                        <div class="row no-gutters align-items-center">
                                                            <!-- Title -->
                                                            <div class="col">
                                                                <h5>Tài khoản</h5>
                                                                <p>Cập nhật thông tin cá nhân của bạn</p>
                                                            </div>

                                                            <!-- Icon -->
                                                            <div class="col-auto">
                                                                <i class="text-muted icon-md fe-user"></i>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div id="profile-settings-account" class="collapse" data-parent="#profile-settings">
                                                    <div class="card-body">
                                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label class="small">Hình ảnh</label>
                                                                <div class="position-relative text-center bg-secondary rounded p-6">
                                                                    <div class="avatar bg-primary text-white mb-5">
                                                                        <i class="icon-md fe-image"></i>
                                                                    </div>
                                                                    <p class="small text-muted mb-0">Bạn có thể upload file jpg, jpeg, gif or png. <br> Tối đa 3mb.</p>
                                                                    <input id="upload-user-photo" class="d-none" type="file" name="fileupload">
                                                                    <input type="hidden" name="file" value="<?php echo $result['avatar']; ?>">
                                                                    <label class="stretched-label mb-0" for="upload-user-photo"></label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="small" for="profile-name">Tên</label>
                                                                <input value="<?php echo $result['account_name']; ?>" class="form-control form-control-lg" name="account_name" id="profile-name" type="text" placeholder="Nhập tên của bạn">
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="small" for="profile-phone">Số điện thoại</label>
                                                                <input value="<?php echo $result['phone']; ?>" class="form-control form-control-lg" name="phone" id="profile-phone" type="text" placeholder="Nhập số điện thoại của bạn">
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="small" for="profile-email">Email</label>
                                                                <input value="<?php echo $result['email']; ?>" class="form-control form-control-lg" name="email" id="profile-email" type="email" placeholder="Nhập email của bạn">
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="small" for="profile-about">Giới thiệu bản thân</label>
                                                                <textarea name="bio" class="form-control form-control-lg" id="profile-about" rows="3" placeholder="Giới thiệu bản thân của bạn" data-autosize="true" ><?php echo $result['bio']; ?></textarea>
                                                            </div>

                                                            <button class="btn btn-lg btn-primary btn-block" type="submit" name="change_info">Cập nhật</button>
                                                        </form>
                                                    </div>
                                                </div><!-- .collapse -->
                                            </div>
                                            <!-- Card -->
                                            <!-- Card -->
                                            <div class="card mb-6 mb-lg-8">
                                                <div class="card-header position-relative">
                                                    <a href="#" class="text-reset d-block stretched-link collapsed" data-toggle="collapse" data-target="#profile-settings-security" aria-expanded="true" aria-controls="profile-settings-security">
                                                        <div class="row no-gutters align-items-center">
                                                            <!-- Title -->
                                                            <div class="col">
                                                                <h5>Bảo mật</h5>
                                                                <p>Cập nhật mật khẩu của bạn</p>
                                                            </div>

                                                            <!-- Icon -->
                                                            <div class="col-auto">
                                                                <i class="text-muted icon-md fe-shield"></i>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div id="profile-settings-security" class="collapse" data-parent="#profile-settings">
                                                    <div class="card-body">
                                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                            <div class="form-group">
                                                                <label class="small" for="current-password">Mật khẩu hiện tại</label>
                                                                <input name="current-password" id="current-password" type="password" class="form-control form-control-lg" placeholder="Mật khẩu hiện tại">
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="small" for="new-password">Mật khẩu mới</label>
                                                                <input name="new-password" id="new-password" type="password" class="form-control form-control-lg" placeholder="Mật khẩu mới">
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="small" for="verify-password">Xác nhận mật khẩu mới</label>
                                                                <input name="verify-password" id="verify-password" type="password" class="form-control form-control-lg" placeholder="Xác nhận mật khẩu mới">
                                                            </div>

                                                            <button class="btn btn-lg btn-primary btn-block" type="submit" name="change_pass">
                                                                Cập nhật
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div><!-- .collapse -->
                                            </div>
                                            <!-- Card -->

                                            <!-- Card -->
                                            <div class="card mb-6 mb-lg-8">
                                                <div class="card-header position-relative">
                                                    <a href="#" class="text-reset d-block stretched-link collapsed" data-toggle="collapse" data-target="#profile-settings-social" aria-controls="profile-settings-social" aria-expanded="true">
                                                        <div class="row no-gutters align-items-center">
                                                            <!-- Title -->
                                                            <div class="col">
                                                                <h5>Mạng xã hội</h5>
                                                                <p>Cập nhật mạng xã hội của bạn</p>
                                                            </div>
                                                            <!-- Icon -->
                                                            <div class="col-auto">
                                                                <i class="text-muted icon-md fe-share-2"></i>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div id="profile-settings-social" class="collapse" data-parent="#profile-settings">
                                                    <div class="card-body">
                                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                                            <!-- Twitter -->
                                                            <div class="form-group">
                                                                <label class="small" for="profile-twitter">Twitter</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="btn btn-ico btn-secondary btn-minimal">
                                                                            <i class="fe-twitter"></i>
                                                                        </div>
                                                                    </div>
                                                                    <input name="twitter" id="profile-twitter" type="text" class="form-control form-control-lg" placeholder="Nhập Twitter của bạn" aria-label="Username" value="<?php echo $result['twitter']; ?>">
                                                                </div>
                                                            </div>

                                                            <!-- Facebook -->
                                                            <div class="form-group">
                                                                <label class="small" for="profile-facebook">Facebook</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="btn btn-ico btn-secondary btn-minimal">
                                                                            <i class="fe-facebook"></i>
                                                                        </div>
                                                                    </div>
                                                                    <input name="facebook" id="profile-facebook" type="text" class="form-control form-control-lg" placeholder="Nhập Facebook của bạn" aria-label="Username" value="<?php echo $result['facebook']; ?>">
                                                                </div>
                                                            </div>

                                                            <!-- Instagram -->
                                                            <div class="form-group">
                                                                <label class="small" for="profile-instagram">Instagram</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="btn btn-ico btn-secondary btn-minimal">
                                                                            <i class="fe-instagram"></i>
                                                                        </div>
                                                                    </div>
                                                                    <input name="instagram" id="profile-instagram" type="text" class="form-control form-control-lg" placeholder="Nhập Instagram của bạn" aria-label="Username" value="<?php echo $result['instagram']; ?>">
                                                                </div>
                                                            </div>

                                                            <!-- Github -->
                                                            <div class="form-group">
                                                                <label class="small" for="profile-github">Github</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="btn btn-ico btn-secondary btn-minimal">
                                                                            <i class="fe-github"></i>
                                                                        </div>
                                                                    </div>
                                                                    <input name="github" id="profile-github" type="text" class="form-control form-control-lg" placeholder="Nhập Github của bạn" aria-label="Username" value="<?php echo $result['github']; ?>">
                                                                </div>
                                                            </div>

                                                            <!-- Slack -->
                                                            <div class="form-group">
                                                                <label class="small" for="profile-slack">Slack</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="btn btn-ico btn-secondary btn-minimal">
                                                                            <i class="fe-slack"></i>
                                                                        </div>
                                                                    </div>
                                                                    <input name="slack" id="profile-slack" type="text" class="form-control form-control-lg" placeholder="Nhập Slack của bạn" aria-label="Username" value="<?php echo $result['slack']; ?>">
                                                                </div>
                                                            </div>

                                                            <button class="btn btn-lg btn-primary btn-block" type="submit" name="social">Cập nhật</button>
                                                        </form>
                                                    </div>
                                                </div><!-- .collapse -->

                                            </div>
                                            <!-- Card -->

                                        </div>
                                    </div>
                                    <!-- Accordion -->

                                </div>
                            </div>
                            <!-- Chat: Content -->

                        </div>
                        <!-- Chat: body -->

                    </div>
                    <!-- Chat -->

                </div>
                <!-- Main Content -->

            </div>
            <!-- Layout -->

            <!-- Modal: Invite friends -->
            <div class="modal fade" id="invite-friends" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <div class="media flex-fill">
                                <div class="icon-shape rounded-lg bg-primary text-white mr-5">
                                    <i class="fe-users"></i>
                                </div>
                                <div class="media-body align-self-center">
                                    <h5 class="modal-title">Invite friends</h5>
                                    <p class="small">Invite colleagues, clients and friends.</p>
                                </div>
                            </div>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form action="#">
                                <div class="form-group">
                                    <label for="invite-email" class="small">Email</label>
                                    <input type="text" class="form-control form-control-lg" id="invite-email">
                                </div>

                                <div class="form-group mb-0">
                                    <label for="invite-message" class="small">Invitation message</label>
                                    <textarea class="form-control form-control-lg" id="invite-message" data-autosize="true"></textarea>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-lg btn-block btn-primary d-flex align-items-center">
                                Invite friend
                                <i class="fe-user-plus ml-auto"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Modal: Invite friends -->

            <!-- Scripts -->
            <script src="assets\js\libs\jquery.min.js"></script>
            <script src="assets\js\bootstrap\bootstrap.bundle.min.js"></script>
            <script src="assets\js\plugins\plugins.bundle.js"></script>
            <script src="assets\js\template.js"></script>
            <!-- Scripts -->
        <?php } ?>
    </body>
</html>
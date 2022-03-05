<?php $full_names = $email_address = $password = $confirmpassword = $username = $phone_number  = $message = ''; ?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sale Inventory | Register</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    <!-- Bootstap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="css/toastr-btn.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/toastr.min.js"></script>
    <script src="js/toastr-options.js"></script>
</head>

<body class="page-template belle">
    <div class="pageWrapper">
        <!--Search Form Drawer-->
        <?php include 'login-header.php'; ?>

        <!--Body Content-->
        <div id="page-content">
            <!--Page Title-->
            <div class="page section-header text-center">
                <div class="page-title">
                    <div class="wrapper">
                        <h1 class="page-width">Register Now</h1>
                    </div>
                </div>
            </div>
            <!--End Page Title-->

            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                        <div class="mb-4">
                            <form method="post" action="#" class="contact-form">
                                <?php

if (isset($_POST["loginaccount"])) {

    require 'register-validate.php';
}
?>
                                <?php echo $message; ?>
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="CustomerEmail">Full Names</label>
                                            <input type="text" name="full_names" placeholder="" autocapitalize="off"
                                                value="<?php echo $full_names; ?>" autofocus="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="CustomerEmail">Email</label>
                                            <input type="email" name="email_address" placeholder="" class=""
                                                autocorrect="off" autocapitalize="off" autofocus=""
                                                value="<?php echo $email_address; ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="CustomerEmail">Phone Number</label>
                                            <input type="number" name="phone_number" placeholder="" class=""
                                                value="<?php echo $phone_number; ?>" autocorrect="off"
                                                autocapitalize="off" autofocus="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="CustomerEmail">Username</label>
                                            <input type="text" name="username" placeholder="" class=""
                                                value="<?php echo $username; ?>" autocorrect="off" autocapitalize="off"
                                                autofocus="">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="CustomerPassword">Password</label>
                                            <input type="password" value="" name="password" placeholder="" class="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="CustomerPassword">Confirm Password</label>
                                            <input type="password" value="" name="confirmpassword" placeholder=""
                                                class="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                        <input type="submit" name="loginaccount" class="btn mb-3" value="Sign Up">
                                        <p class="mb-4">
                                            <a href="#" id="RecoverPassword">Forgot your password?</a> &nbsp; | &nbsp;
                                            <a href="login.php" id="customer_register_link">SIgn In</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--End Body Content-->

        <?php include 'footer.php'; ?>
        <!--End Footer-->
        <!--Scoll Top-->
        <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
        <!--End Scoll Top-->

        <!-- Including Jquery -->
        <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
        <script src="assets/js/vendor/jquery.cookie.js"></script>
        <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
        <script src="assets/js/vendor/wow.min.js"></script>
        <!-- Including Javascript -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/lazysizes.js"></script>
        <script src="assets/js/main.js"></script>
    </div>
</body>

<!-- belle/login.html   11 Nov 2019 12:22:27 GMT -->

</html>
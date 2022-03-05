<?php
include 'admin.php';
?>
<?php $customer_contact = $full_names = $customer_email = $customer_location   = $message = ''; ?>
<?php
include '../db-connection.php';
$customer = $_GET['customer'];
$customers = "SELECT * FROM `customer` WHERE `customer_id` = '$customer'";
$querycustomers = mysqli_query($conn, $customers);
$customersrows = mysqli_num_rows($querycustomers);
if ($customersrows >= 1) {
    $count = 1;
    while ($fetch  = mysqli_fetch_assoc($querycustomers)) {
        $globalname = $fetch['customer_name']; 
        $globallocation = $fetch['customer_location']; 
        $globalemail = $fetch['customer_email']; 
        $globalcontact = $fetch['customer_contact'];  
        global $globalname;global $globallocation;global $globalemail;global $globalcontact;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements="" defer="" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="../css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="../css/toastr-btn.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/toastr.min.js"></script>
    <script src="../js/toastr-options.js"></script>
</head>

<body class="nav-fixed">
    <?php include 'header.php'; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include 'sidebar.php' ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                    <div class="container-xl px-4">
                        <div class="page-header-content pt-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto mt-4">
                                    <h1 class="page-header-title">
                                        <div class="page-header-icon"><i data-feather="edit-3"></i></div>
                                        Edit Customer
                                    </h1>
                                    <div class="page-header-subtitle">Edit Customer from this page</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Main page content-->
                <div class="container-xl px-4 mt-n10">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Default Bootstrap Form Controls-->
                            <div id="default">
                                <div class="card mb-4">
                                    <div class="card-header">Edit Customer</div>
                                    <div class="card-body">
                                        <!-- Component Preview-->
                                        <div class="sbp-preview">
                                            <div class="sbp-preview-content">
                                                <form method="POST" action="">
                                                    <?php

                                                    if (isset($_POST["addcustomer"])) {

                                                        require 'functions/edit-customer.php';
                                                    }
                                                    ?>
                                                    <?php echo $message; ?>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlInput1">Full Names</label>
                                                                <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="" name="full_names" value="<?php echo $globalname; ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="exampleFormControlInput1">Customer Location</label>
                                                            <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="" name="customer_location" value="<?php echo $globallocation; ?>" />
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="exampleFormControlInput1">Customer Email </label>
                                                            <input class="form-control" id="exampleFormControlInput1" type="email" placeholder="" name="customer_email" value="<?php echo $globalemail; ?>" />
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="exampleFormControlInput1">Customer Contact </label>
                                                            <input class="form-control" id="exampleFormControlInput1" type="text" placeholder="" name="customer_contact" value="<?php echo $globalcontact; ?>" />
                                                        </div>
                                                    </div>
                                                   <input type="hidden" name="customerrecord" value="<?php echo $customer; ?>">

                                                    <br>
                                                    <button class="btn btn-danger btn-sm" type="submit" name="addcustomer">Edit New Customer</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
            <footer class="footer-admin mt-auto footer-light">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small">Copyright © Dynamic Inventotry 2022</div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Privacy Policy</a> ·
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables/datatables-simple-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
    <script src="js/litepicker.js"></script>

</body>

</html>
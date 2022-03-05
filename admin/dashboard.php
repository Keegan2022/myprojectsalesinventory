                <?php
include 'admin.php';
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
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
                                        <div class="page-header-icon"><i data-feather="activity"></i></div>
                                        Dashboard
                                    </h1>
                                    <div class="page-header-subtitle">Overview and content summary</div>
                                </div>
                                <div class="col-12 col-xl-auto mt-4">
                                    <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                                        <span class="input-group-text"><i class="text-primary" data-feather="calendar"></i></span>
                                        <input class="form-control ps-0 pointer" id="litepickerRangePlugin" placeholder="Select date range..." />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Main page content-->
                <div class="container-xl px-4 mt-n10">

                    <!-- Example Colored Cards for Dashboard Demo-->
                    <div class="row">
                        <div class="col-lg-6 col-xl-3 mb-4">
                            <div class="card bg-primary text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3">
                                            <div class="text-white-75 small">Products
                                                
                                            </div>
                                            <div class="text-lg fw-bold">
                                                <?php
                                                include '../db-connection.php';
                                                $products = "SELECT * FROM `product`";
                                                $queryproducts = mysqli_query($conn, $products);
                                                $productsrows = mysqli_num_rows($queryproducts);
                                                echo $productsrows;
                                                ?>

                                            </div>
                                        </div>
                                        <i class="feather-xl text-white-50" data-feather="calendar"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between small">
                                    <a class="text-white stretched-link" href="all-products.php">View Report</a>
                                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3 mb-4">
                            <div class="card bg-warning text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3">
                                            <div class="text-white-75 small">Sales </div>
                                            <div class="text-lg fw-bold">
                                                <?php
                                                include '../db-connection.php';
                                                $purchases = "SELECT * FROM `sales`";
                                                $querypurchases = mysqli_query($conn, $purchases);
                                                $purchasesrows = mysqli_num_rows($querypurchases);
                                                $totalamount = 0;
                                                if ($purchasesrows >= 1) {
                                                    $count = 1;
                                                    while ($fetch  = mysqli_fetch_assoc($querypurchases)) {

                                                        $amount = $fetch['sales_total_amount'];
                                                        $totalamount += $amount;
                                                    }
                                                }
                                                echo "Kshs." . $totalamount;
                                                ?>
                                            </div>
                                        </div>
                                        <i class="feather-xl text-white-50" data-feather="dollar-sign"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between small">
                                    <a class="text-white stretched-link" href="all-sales.php">View Report</a>
                                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3 mb-4">
                            <div class="card bg-success text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3">
                                            <div class="text-white-75 small">Purchase </div>
                                            <div class="text-lg fw-bold">
                                                <?php
                                                include '../db-connection.php';
                                                $purchases = "SELECT * FROM `purchases`";
                                                $querypurchases = mysqli_query($conn, $purchases);
                                                $purchasesrows = mysqli_num_rows($querypurchases);
                                                $totalamount = 0;
                                                if ($purchasesrows >= 1) {
                                                    $count = 1;
                                                    while ($fetch  = mysqli_fetch_assoc($querypurchases)) {

                                                        $amount = $fetch['purchases_total_amount'];
                                                        $totalamount += $amount;
                                                    }
                                                }
                                                echo "Kshs." . $totalamount;
                                                ?>

                                            </div>
                                        </div>
                                        <i class="feather-xl text-white-50" data-feather="check-square"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between small">
                                    <a class="text-white stretched-link" href="all-purchases.php">View purchases</a>
                                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3 mb-4">
                            <div class="card bg-danger text-white h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3">
                                            <div class="text-white-75 small">All Suppliers</div>
                                            <div class="text-lg fw-bold">
                                                <?php
                                                include '../db-connection.php';
                                                $suppliers = "SELECT * FROM `supplier`";
                                                $querysuppliers = mysqli_query($conn, $suppliers);
                                                $suppliersrows = mysqli_num_rows($querysuppliers);

                                                echo $suppliersrows;
                                                ?>
                                            </div>
                                        </div>
                                        <i class="feather-xl text-white-50" data-feather="message-circle"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between small">
                                    <a class="text-white stretched-link" href="all-suppliers.php">View Requests</a>
                                    <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">Admin Management</div>
                        <div class="card-body">
                            <table class="display" id="admins" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>FUll Names</th>
                                        <th>Email Address</th>
                                        <th>Phone Number</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    include '../db-connection.php';
                                    $admin = "SELECT * FROM `admin`";
                                    $queryadmin = mysqli_query($conn, $admin);
                                    $adminrows = mysqli_num_rows($queryadmin);
                                    if ($adminrows >= 1) {
                                        $count = 1;
                                        while ($fetch  = mysqli_fetch_assoc($queryadmin)) {
                                            $name = $fetch['admin_full_names'];
                                            $phonenumber = $fetch['admin_phone_number'];
                                            $emailaddress = $fetch['admin_email_address'];

                                            $loginid = $fetch['admin_login_id'];
                                            $user = "SELECT * FROM `login` WHERE `login_id` = '$loginid'";
                                            $queryuser = mysqli_query($conn, $user);
                                            $userrows = mysqli_num_rows($queryuser);
                                            if ($userrows >= 1) {
                                                $count = 1;
                                                while ($fetchdata  = mysqli_fetch_assoc($queryuser)) {
                                                    $username = $fetchdata['login_username'];
                                                }
                                            }

                                            echo "
                                                <tr>
                                                    <td>$count</td>
                                                    <td>$username</td>
                                                    <td>$name</td>
                                                    <td>$emailaddress</td>
                                                    <td>$phonenumber</td>  
                                                    
                                                </tr>
                                            ";
                                                                                $count++;
                                                                            }
                                                                        }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">All Products</div>
                        <div class="card-body">
                        <table class="display" id="products" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Batch Number</th>
                                        <th>Category</th>
                                        <th>SUb Category</th>
                                        <th>manufacture Date</th>
                                        <th>Expiry Date</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th> 
                                    </tr>
                                </thead> 
                                <tbody>

                                    <?php
                                    include '../db-connection.php';
                                    $products = "SELECT * FROM `product`";
                                    $queryproducts = mysqli_query($conn, $products);
                                    $productsrows = mysqli_num_rows($queryproducts);
                                    if ($productsrows >= 1) {
                                        $count = 1;
                                        while ($fetch  = mysqli_fetch_assoc($queryproducts)) {
                                            $batch = $fetch['product_batch_number'];
                                            $cat = $fetch['product_category'];
                                            $subcat = $fetch['product_sub_category'];
                                            $description = $fetch['product_description'];
                                            $mfgdate = $fetch['product_date_of_manufacture'];
                                            $expiry = $fetch['product_expiry_date'];
                                            $price = $fetch['product_unit_price'];
                                            $amount = $fetch['product_amount'];
                                            $proid = $fetch['product_id'];


                                            echo "
                                                <tr>
                                                    <td>$count</td>
                                                    <td>$batch</td>
                                                    <td>$cat</td>
                                                    <td>$subcat</td>
                                                    <td>$mfgdate</td>
                                                    <td>$expiry</td>
                                                    <td>$price</td>
                                                    <td>$amount</td>
                                                     

                                                </tr>
                                            ";
                                                                                $count++;
                                                                            }
                                                                        }

                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="footer-admin mt-auto footer-light">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small">Copyright © Your Website 2021</div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Privacy Policy</a> ·
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables/datatables-simple-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
    <script src="js/litepicker.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
    $('#admins').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
    $('#products').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} );
    </script>
</body>

</html>
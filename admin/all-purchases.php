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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
    </script>
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
                                        All Products
                                    </h1>
                                    <div class="page-header-subtitle">Manage Your Products from this page</div>
                                </div>
                                <div class="col-12 col-xl-auto mt-4">

                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Main page content-->
                <div class="container-xl px-4 mt-n10">


                    <div class="card mb-4">
                        <div class="card-header">All Products</div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Supplier</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total Spend</th>
                                        <th>Purchase Returns</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Supplier</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total Spend</th>
                                        <th>Purchase Returns</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    include '../db-connection.php';
                                    $purchases = "SELECT * FROM `purchases`";
                                    $querypurchases = mysqli_query($conn, $purchases);
                                    $purchasesrows = mysqli_num_rows($querypurchases);
                                    if ($purchasesrows >= 1) {
                                        $count = 1;
                                        while ($fetch  = mysqli_fetch_assoc($querypurchases)) {
                                            $date = $fetch['purchases_date'];
                                            $supplier = $fetch['purchases_supplier_id'];
                                            $product = $fetch['purchases_product_id'];
                                            $quantity = $fetch['purchases_quantity'];
                                            $unitprice = $fetch['purchases_product_unit_price'];
                                            $returns = $fetch['purchases_returns'];
                                            $tamount = $fetch['purchases_total_amount'];
                                            $purchaseid = $fetch['purchases_id'];

                                            $product = "SELECT * FROM `product` WHERE `product_id`='$product'";
                                            $queryproduct = mysqli_query($conn, $product);
                                            $productrows = mysqli_num_rows($queryproduct);
                                            if ($productrows >= 1) {
                                                $count = 1;
                                                while ($fetch  = mysqli_fetch_assoc($queryproduct)) { 
                                                    $productname = $fetch['product_name'];
                                                }
                                            }

                                            $suppliercheck = "SELECT * FROM `supplier` WHERE `supplier_id`='$supplier'";
                                            $querysuppliercheck = mysqli_query($conn, $suppliercheck);
                                            $suppliercheckrows = mysqli_num_rows($querysuppliercheck);
                                            if ($suppliercheckrows >= 1) {
                                                $count = 1;
                                                while ($fetch  = mysqli_fetch_assoc($querysuppliercheck)) { 
                                                    $suppliercontact = $fetch['supplier_contact'];
                                                    $suppliername = $fetch['supplier_name'];
                                                }
                                            }

                                            echo "
                                                <tr>
                                                    <td>$count</td>
                                                    <td>$date</td>
                                                    <td>$suppliername - $suppliercontact</td>
                                                    <td>$productname</td>
                                                    <td>$quantity</td>
                                                    <td>$unitprice</td>
                                                    <td>$tamount</td>
                                                    <td>$returns</td> 
                                                    <td>
                                                    <a href='edit-purchases.php?purchases=$purchaseid' class='btn btn-datatable btn-icon btn-transparent-dark me-2'><i data-feather='edit-3'></i></a>
                                                    <a href='delete-purchases.php?purchases=$purchaseid' class='btn btn-datatable btn-icon btn-transparent-dark'><i data-feather='trash-2'></i></a>
                                                    </td>

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
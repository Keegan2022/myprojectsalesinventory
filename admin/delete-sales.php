<?php include 'admin.php'; ?>
<?php
$product = $_GET['sales'];
$checkstation = "DELETE  FROM `sales` WHERE `sales_id` = '$product'";
$querycheckstation = mysqli_query($conn, $checkstation);
if ($querycheckstation) {
    echo "<script>window.location.replace('all-sales.php');</script>";
}
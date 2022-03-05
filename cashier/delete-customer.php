<?php include 'admin.php'; ?>
<?php
$product = $_GET['customer'];
$checkstation = "DELETE  FROM `customer` WHERE `customer_id` = '$product'";
$querycheckstation = mysqli_query($conn, $checkstation);
if ($querycheckstation) {
    echo "<script>window.location.replace('all-customers.php');</script>";
}
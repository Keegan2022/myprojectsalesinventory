<?php include 'admin.php'; ?>
<?php
$product = $_GET['supplier'];
$checkstation = "DELETE  FROM `supplier` WHERE `supplier_id` = '$product'";
$querycheckstation = mysqli_query($conn, $checkstation);
if ($querycheckstation) {
    echo "<script>window.location.replace('all-suppliers.php');</script>";
}
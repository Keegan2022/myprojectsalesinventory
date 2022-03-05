<?php include 'admin.php'; ?>
<?php
$product = $_GET['product'];
$checkstation = "DELETE  FROM `product` WHERE `product_id` = '$product'";
$querycheckstation = mysqli_query($conn, $checkstation);
if ($querycheckstation) {
    echo "<script>window.location.replace('all-products.php');</script>";
}
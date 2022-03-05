<?php include 'admin.php'; ?>
<?php
$product = $_GET['purchases'];
$checkstation = "DELETE  FROM `purchases` WHERE `purchases_id` = '$product'";
$querycheckstation = mysqli_query($conn, $checkstation);
if ($querycheckstation) {
    echo "<script>window.location.replace('all-purchases.php');</script>";
}
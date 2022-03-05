<?php
include '../db-connection.php';
$supplier_id = mysqli_real_escape_string($conn, $_POST['supplier_id']);
$product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
$purchase_date = mysqli_real_escape_string($conn, $_POST['purchase_date']);
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
$unit_price = mysqli_real_escape_string($conn, $_POST['unit_price']);
$purchase_returns = mysqli_real_escape_string($conn, $_POST['purchase_returns']);
$purchaseid = mysqli_real_escape_string($conn, $_POST['purchaserecord']);
if (empty($supplier_id) || empty($product_id) || empty($purchase_date) || empty($quantity) || empty($unit_price) || empty($purchase_returns)) {

    $message = "
        <script>
            toastr.error('Please Provide all the details needed');
        </script>
    ";
} else if ($quantity < 1) {
    $message = "
    <script>
        toastr.error('Invalid product quantity.');
    </script>
";
} else if ($purchase_returns < 100) {
    $message = "
    <script>
        toastr.error('Confirm the purchase returns for this purchase.');
    </script>
";
} else {
    $amount = $unit_price * $quantity;

   $insertproduct = "UPDATE `purchases` SET `purchases_date`='$purchase_date', `purchases_supplier_id`='$supplier_id', `purchases_product_id`='$product_id', `purchases_quantity`='$quantity', `purchases_product_unit_price`='$unit_price', `purchases_total_amount`='$amount', `purchases_returns`='$purchase_returns' WHERE `purchases_id` = '$purchaseid'";
    $querylogin = mysqli_query($conn, $insertproduct);
    $lastid =  mysqli_insert_id($conn);
    if ($querylogin) {
        $message = "
                            <script>
                            toastr.success('Product Uploaded succesfully.');
                        </script>";
        echo "<script>window.location.replace('all-purchases.php');</script>";
    }
}

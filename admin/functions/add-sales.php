<?php
include '../db-connection.php';
$supplier_id = mysqli_real_escape_string($conn, $_POST['customer_id']);
$product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
$unit_price = mysqli_real_escape_string($conn, $_POST['unit_price']);
$purchase_returns = mysqli_real_escape_string($conn, $_POST['purchase_returns']);
if (empty($supplier_id) || empty($product_id) || empty($quantity) || empty($unit_price)) {
    $message = "
        <script>
            toastr.error('Please Provide all the details ndededeeded');
        </script>
    ";
} else if ($quantity < 1) {
    $message = "
    <script>
        toastr.error('Invalid product quantity.');
    </script>
";
} else {
    $amount = $unit_price * $quantity;
    $today = date('d-m-Y');
     $insertproduct = "INSERT INTO `sales`(`sales_date`, `sales_customer_id`, `sales_product_id`, `sales_quantity`, `sales_product_unit_price`, `sales_total_amount`, `sales_returns`) VALUES ('$today', '$supplier_id','$product_id','$quantity','$unit_price','$amount','$purchase_returns')";
    $querylogin = mysqli_query($conn, $insertproduct);
    $lastid =  mysqli_insert_id($conn);
    if ($querylogin) {
        $customers = "SELECT * FROM `inventory` WHERE `inventory_products_id` = '$product_id'";
        $querycustomers = mysqli_query($conn, $customers);
      "all inventoriers".   $customersrows = mysqli_num_rows($querycustomers);
        if ($customersrows >= 1) {
            $count = 1;
            while ($fetch  = mysqli_fetch_assoc($querycustomers)) {
                $oldquantity = $fetch['inventory_quantity'];
                $newquantity = $oldquantity - $quantity;

                $updateinventory = "UPDATE `inventory` SET `inventory_quantity` = '$newquantity' WHERE `inventory_products_id` = '$product_id'";
                $queryinventory = mysqli_query($conn, $updateinventory);
                if ($queryinventory) {
                    $message = "
                    <script>
                    toastr.success('Product Uploaded succesfully.');
                </script>";
                    echo "<script>window.location.replace('all-sales.php');</script>";
                }
            }
        }
    }
}

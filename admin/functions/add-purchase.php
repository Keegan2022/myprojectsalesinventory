<?php
include '../db-connection.php';
$supplier_id = mysqli_real_escape_string($conn, $_POST['supplier_id']);
$product_id = mysqli_real_escape_string($conn, $_POST['product_id']); 
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
$unit_price = mysqli_real_escape_string($conn, $_POST['unit_price']); 
if (empty($supplier_id) || empty($product_id)  || empty($quantity) || empty($unit_price) ) {

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
}else {
    $amount = $unit_price * $quantity;
    $date = date('d-m-Y');
    $insertproduct = "INSERT INTO `purchases`(`purchases_date`, `purchases_supplier_id`, `purchases_product_id`, `purchases_quantity`, `purchases_product_unit_price`, `purchases_total_amount`) VALUES ('$date', '$supplier_id','$product_id','$quantity','$unit_price','$amount')";
    $queryproduct = mysqli_query($conn, $insertproduct);
    $lastid =  mysqli_insert_id($conn);
    if ($queryproduct) {
        $addpurchase = "INSERT INTO `inventory`(`inventory_products_id`,`inventory_quantity`, `inventory_purchases_id`) VALUES ('$product_id','$quantity', '$lastid')";
        $querypurchase = mysqli_query($conn, $addpurchase);
        if($querypurchase){
            $message = "
                            <script>
                            toastr.success('Product Uploaded succesfully.');
                        </script>";
        echo "<script>window.location.replace('all-purchases.php');</script>";
        }
        
    }
}

<?php
include '../db-connection.php';
$inventory_id = mysqli_real_escape_string($conn, $_POST['inventoryid']);
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
$unit_price = mysqli_real_escape_string($conn, $_POST['unit_price']);
if (empty($inventory_id)  || empty($quantity) || empty($unit_price)) {

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
} else {
    $inventory = "SELECT * FROM `inventory` WHERE `inventory_id`='$inventory_id' ";
    $queryinventory = mysqli_query($conn, $inventory);
    $inventoryrows = mysqli_num_rows($queryinventory);
    if ($inventoryrows >= 1) {
        $count = 1;
        while ($fetch  = mysqli_fetch_assoc($queryinventory)) {
            $inventorypurchases = $fetch['inventory_purchases_id'];

            $product = "SELECT * FROM `purchases` WHERE `purchases_id`='$inventorypurchases'";
            $queryproduct = mysqli_query($conn, $product);
            $productrows = mysqli_num_rows($queryproduct);
            if ($productrows >= 1) {
                $count = 1;
                while ($fetchp  = mysqli_fetch_assoc($queryproduct)) {
                    $psupplier = $fetchp['purchases_supplier_id'];
                    $pproduct = $fetchp['purchases_product_id'];

                    $date = date('d-m-Y');
                    $amount = $unit_price * $quantity;
                    $insertproduct = "INSERT INTO `purchases`(`purchases_date`, `purchases_supplier_id`, `purchases_product_id`, `purchases_quantity`, `purchases_product_unit_price`, `purchases_total_amount`) VALUES ('$date', '$psupplier','$pproduct','$quantity','$unit_price','$amount')";
                    $queryproduct = mysqli_query($conn, $insertproduct);
                    if ($queryproduct) {
                        $updateinventory = "UPDATE `inventory` SET `inventory_quantity`='$quantity' WHERE `inventory_id`='$inventory_id'";
                        $queryupdateinventory = mysqli_query($conn, $updateinventory);
                        if($queryupdateinventory){
                           
                        echo "<script>window.location.replace('all-inventories.php');</script>";
                        }
                        
                    }
                }
            }
        }
    }
}

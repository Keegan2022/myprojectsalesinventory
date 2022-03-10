<?php
include '../db-connection.php';
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
$unit_price = mysqli_real_escape_string($conn, $_POST['unit_price']);
$purchase_returns = mysqli_real_escape_string($conn, $_POST['purchase_returns']);
$purchaseid = mysqli_real_escape_string($conn, $_POST['purchaserecord']);

if (empty($quantity) || empty($unit_price) || empty($purchase_returns)) {

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
    $prodcteditig = $_GET['purchases'];
  echo  $purchase = "SELECT * FROM `purchases` WHERE `purchases_id` = '$prodcteditig'";
    $querypurchase = mysqli_query($conn, $purchase);
    $purchaserows = mysqli_num_rows($querypurchase);
    if ($purchaserows >= 1) {
        $count = 1;
        while ($fetch  = mysqli_fetch_assoc($querypurchase)) {
            $identsupplier = $fetch['purchases_supplier_id'];
            $identproduct = $fetch['purchases_product_id'];

            $amount = $unit_price * $quantity;
            $date = date('d-m-Y');
          echo  $insertproduct = "INSERT INTO `purchases`(`purchases_date`, `purchases_supplier_id`, `purchases_product_id`, `purchases_quantity`, `purchases_product_unit_price`, `purchases_total_amount`) VALUES ('$date', '$identsupplier','$identproduct','$quantity','$unit_price','$amount')";
            $queryloginpurchase = mysqli_query($conn, $insertproduct);
            $lastid =  mysqli_insert_id($conn);
            if ($queryloginpurchase) {
             $inventory = "SELECT * FROM `inventory` WHERE `inventory_products_id` = '$identproduct'";
                $querypurchasinventory = mysqli_query($conn, $inventory);
                $purchasinventoryrows = mysqli_num_rows($querypurchasinventory);
                if ($purchasinventoryrows >= 1) {
                    while ($fetch  = mysqli_fetch_assoc($querypurchasinventory)) {
                        $oldquantity = $fetch['inventory_quantity'];
                        $newquantity = $oldquantity + $quantity;
                 echo       $updateinventory = "UPDATE `inventory` SET `inventory_quantity` = '$newquantity',`inventory_purchases_returns`='$purchase_returns' WHERE `inventory_products_id` = '$identproduct'";
                        $queryinventory = mysqli_query($conn, $updateinventory);
                        if ($queryinventory) {
                            echo "success";
                            echo "<script>window.location.replace('all-purchases.php');</script>";
                        }else{
                            echo "failed";
                        }
                    }
                }
            }else{
                echo "ACCEPTED";
            }
        }
    }
}

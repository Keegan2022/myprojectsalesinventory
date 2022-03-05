<?php
include '../db-connection.php'; 
$batch_number = mysqli_real_escape_string($conn, $_POST['batch_number']);
$manufacture_date = mysqli_real_escape_string($conn, $_POST['manufacture_date']);
$expiry_date = mysqli_real_escape_string($conn, $_POST['expiry_date']);
$product_category = mysqli_real_escape_string($conn, $_POST['product_category']); 
$product_subcategory = mysqli_real_escape_string($conn, $_POST['product_subcategory']); 
$unit_price = mysqli_real_escape_string($conn, $_POST['unit_price']);
$product_amount = mysqli_real_escape_string($conn, $_POST['product_amount']); 
$description = mysqli_real_escape_string($conn, $_POST['description']);  
$productid = mysqli_real_escape_string($conn, $_POST['productid']);  
$batch_length = strlen($batch_number); 
if (empty($batch_number) || empty($manufacture_date) || empty($expiry_date) || empty($product_category) || empty($product_subcategory) || empty($unit_price) || empty($product_amount) || empty($description)) {
 
    $message = "
        <script>
            toastr.error('Please Provide all the details needed');
        </script>
    ";
} else if (!preg_match("/^[a-zA-z0-9 ]*$/", $batch_number)) {
    $message = "
        <script>
            toastr.error('Provided an invalid batch number characters');
        </script>
    ";
}else if ($batch_length !== 6) {
    $message = "
    <script>
        toastr.error('Batch number must have 6 characters.');
    </script>
";
}else {

      

                $password = md5($password);
                $insertproduct = "UPDATE  `product` SET `product_category`='$product_category', `product_sub_category`='$product_subcategory', `product_description`='$description', `product_date_of_manufacture`='$manufacture_date', `product_batch_number`='$batch_number', `product_expiry_date`='$expiry_date', `product_unit_price`='$unit_price', `product_amount`='$product_amount' WHERE `product_id` = '$productid'";
                $querylogin = mysqli_query($conn, $insertproduct);
                $lastid =  mysqli_insert_id($conn);
                if ($querylogin) { 
                        $message = "
                            <script>
                            toastr.success('Product Updated succesfully.');
                        </script>";
                        echo "<script>window.location.replace('all-products.php');</script>";
                    }
                
            
        
    
}
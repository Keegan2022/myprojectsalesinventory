<?php
include '../db-connection.php'; 
$contact = mysqli_real_escape_string($conn, $_POST['customer_contact']);
$email = mysqli_real_escape_string($conn, $_POST['customer_email']);
$location = mysqli_real_escape_string($conn, $_POST['customer_location']);
$fullnames = mysqli_real_escape_string($conn, $_POST['full_names']);  
$customerrecord = mysqli_real_escape_string($conn, $_POST['customerrecord']);  
$contact_length = strlen($contact); 
if (empty($contact) || empty($email) || empty($location) || empty($fullnames) ) {
    $message = "
        <script>
            toastr.error('Please Provide all the details needed');
        </script>
    ";
} else if (!preg_match("/^[a-zA-z0-9 ]*$/", $fullnames)) {
    $message = "
        <script>
            toastr.error('Provided an invalid customer characters');
        </script>
    ";
}else if ($contact_length !== 10) {
    $message = "
    <script>
        toastr.error('Phone  number must have 10 characters.');
    </script>
";
}else {
 
                $insertproduct = "UPDATE `customer` SET `customer_name`='$fullnames', `customer_location`='$location', `customer_email`='$email', `customer_contact`='$contact' WHERE `customer_id`='$customerrecord'";
                $querylogin = mysqli_query($conn, $insertproduct);
                $lastid =  mysqli_insert_id($conn);
                if ($querylogin) { 
                        $message = "
                            <script>
                            toastr.success('Product Uploaded succesfully.');
                        </script>";
                        echo "<script>window.location.replace('all-customers.php');</script>";
                    }
                }     

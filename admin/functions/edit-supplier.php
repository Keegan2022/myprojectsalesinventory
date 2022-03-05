<?php
include 'db-connection.php';
$full_names = mysqli_real_escape_string($conn, $_POST['full_names']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$contact = mysqli_real_escape_string($conn, $_POST['contact']);
$company = mysqli_real_escape_string($conn, $_POST['company_name']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$supplierid = mysqli_real_escape_string($conn, $_POST['supplierid']);
$logiinid = mysqli_real_escape_string($conn, $_POST['loginid']);
$usernamelength = strlen($username);
$phonelength = strlen($contact);
if (empty($full_names) || empty($username) || empty($contact)  || empty($company) || empty($location)) {
    $message = "
        <script>
            toastr.error('Please Provide all the details');
        </script>
    ";
} else if (!preg_match("/^[a-zA-z ]*$/", $full_names)) {
    $message = "
        <script>
            toastr.error('Provided an invalid names characters');
        </script>
    ";
} else if (!preg_match("/^[a-zA-z0-9 ]*$/", $username)) {
    $message = "
        <script>
            toastr.error('Username format is incorrect');
        </script>
    ";
} else if ($phonelength !== 10) {
    $message = "
    <script>
        toastr.error('Phone number must have 10 digits.');
    </script>
";
} else if ($usernamelength < 8) {
    $message = "
    <script>
        toastr.error('Username field require at least 8 characters.');
    </script>";
} else {
    $password = md5("supplier");
    $insertlogin = "UPDATE `login` SET `login_username`='$username' WHERE `login_id`='$logiinid'";
    $querylogin = mysqli_query($conn, $insertlogin);
    $lastid =  mysqli_insert_id($conn);
    if ($querylogin) {

        $addsupplier = "UPDATE  `supplier` SET `supplier_name`='$full_names', `supplier_company`='$company', `supplier_location`='$location',`supplier_contact`='$contact' WHERE `supplier_id` = '$supplierid'";

        $querystaff = mysqli_query($conn, $addsupplier);
        if ($querystaff) {

            echo "<script>window.location.replace('all-suppliers.php');</script>";
        }
    }
}

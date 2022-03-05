<?php
include 'db-connection.php';
$full_names = mysqli_real_escape_string($conn, $_POST['full_names']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$contact = mysqli_real_escape_string($conn, $_POST['contact']);
$company = mysqli_real_escape_string($conn, $_POST['company_name']); 
$location = mysqli_real_escape_string($conn, $_POST['location']);   
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
}  else if ($phonelength !== 10) {
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
    $checkcontact = "SELECT *  FROM `supplier` WHERE `supplier_contact` = '$contact'";
    $queryphone = mysqli_query($conn, $checkcontact);
    $checkcontactrows = mysqli_num_rows($queryphone);
    if ($checkcontactrows >= 1) {
        $message = "
        <script>
            toastr.error('Phone Number already exists. Please confirm your number again .');
        </script>";
    } else {

            $checkusername = "SELECT *  FROM `login` WHERE `login_username` = '$username'";
            $queryusername = mysqli_query($conn, $checkusername);
            $checkusernamerows = mysqli_num_rows($queryusername);
            if ($checkusernamerows >= 1) {
                $message = "
                <script>
                    toastr.error('Username already exists. Please confirm your username  again .');
                </script>";
            } else {
                $password = md5("supplier");
                $insertlogin = "INSERT INTO `login`(`login_username`, `login_password`, `login_rank`) VALUES ('$username', '$password','supplier')";
                $querylogin = mysqli_query($conn, $insertlogin);
                $lastid =  mysqli_insert_id($conn);
                if ($querylogin) {

                    $addsupplier = "INSERT INTO `supplier`(`supplier_login_id`,`supplier_name`, `supplier_company`, `supplier_location`,`supplier_contact`) VALUES ('$lastid', '$full_names','$company','$location', '$contact')";

                    $querystaff = mysqli_query($conn, $addsupplier);
                    if ($querystaff) {
                  
                        echo "<script>window.location.replace('all-suppliers.php');</script>";
                    }
                }
            }
        }
    
}
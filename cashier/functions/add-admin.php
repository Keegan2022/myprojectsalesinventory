<?php
include '../db-connection.php';
$full_names = mysqli_real_escape_string($conn, $_POST['full_names']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$contact = mysqli_real_escape_string($conn, $_POST['admin_contact']);
$email = mysqli_real_escape_string($conn, $_POST['admin_email']);  
$usernamelength = strlen($username);
$phonelength = strlen($contact); 
if (empty($full_names) || empty($username) || empty($contact)  || empty($email)) {
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
    $checkcontact = "SELECT *  FROM `admin` WHERE `admin_phone_number` = '$contact' OR `admin_email_address`='$email'";
    $queryphone = mysqli_query($conn, $checkcontact);
    $checkcontactrows = mysqli_num_rows($queryphone);
    if ($checkcontactrows >= 1) {
        $message = "
        <script>
            toastr.error('Phone Number already exists. Please confirm your number again.');
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
                $password = md5("adminadmin");
                $insertproduct = "INSERT INTO `login`(`login_username`, `login_password`, `login_rank`) VALUES ('$username', '$password','admin')";
                $querylogin = mysqli_query($conn, $insertproduct);
                $lastid =  mysqli_insert_id($conn);
                if ($querylogin) { 
                    $addadmin = "INSERT INTO `admin`(`admin_full_names`, `admin_phone_number`, `admin_email_address`, `admin_login_id`) VALUES ('$full_names', '$contact', '$email', '$lastid')";
                    $queryadmin = mysqli_query($conn, $addadmin);
                    if($queryadmin){
                         $message = "
                            <script>
                            toastr.success('Product Uploaded succesfully.');
                        </script>";
                        echo "<script>window.location.replace('dashboard.php');</script>";
                    }
                       
                    }
                }   
            }
        }
    

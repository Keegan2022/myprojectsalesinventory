<?php
include 'db-connection.php';
$full_names = mysqli_real_escape_string($conn, $_POST['full_names']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
$email_address = mysqli_real_escape_string($conn, $_POST['email_address']); 
$password = mysqli_real_escape_string($conn, $_POST['password']);
$confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']); 
$passwordlength = strlen($password);
$usernamelength = strlen($username);
$phonelength = strlen($phone_number); 
if (empty($full_names) || empty($username) || empty($phone_number) || empty($email_address) || empty($password) || empty($confirmpassword)) {
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
} else if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
    $message = "
        <script>
            toastr.error('Incorrect email address. Provide a valid one.');
        </script>
    ";
} else if ($passwordlength < 8) {
    $message = "
    <script>
        toastr.error('Password should have at least 8 characters.');
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
} else if ($password !== $confirmpassword) {
    $message = "
    <script>
        toastr.error('password details failed to match.');
    </script>";
} else {
    $checkphone = "SELECT *  FROM `customer` WHERE `customer_contact` = '$phone_number'";
    $queryphone = mysqli_query($conn, $checkphone);
    $checkphonerows = mysqli_num_rows($queryphone);
    if ($checkphonerows >= 1) {
        $message = "
        <script>
            toastr.error('Phone Number already exists. Please confirm your number again .');
        </script>";
    } else {
        $checkemail = "SELECT *  FROM `customer` WHERE `customer_email` = '$email_address'";
        $queryemail = mysqli_query($conn, $checkemail);
        $checkemailrows = mysqli_num_rows($queryemail);
        if ($checkemailrows >= 1) {
            $message = "
        <script>
            toastr.error('Email Address already exists. Please confirm your Email Address  again .');
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
                $password = md5($password);
                $insertlogin = "INSERT INTO `login`(`login_username`, `login_password`, `login_rank`) VALUES ('$username', '$password','user')";
                $querylogin = mysqli_query($conn, $insertlogin);
                $lastid =  mysqli_insert_id($conn);
                if ($querylogin) {

                    $addcustomer = "INSERT INTO `user`(`user_full_names`,`user_phone_number`, `user_email_address`, `user_login_id`) VALUES ('$full_names', '$phone_number','$email_address','$lastid')";

                    $querystaff = mysqli_query($conn, $addcustomer);
                    if ($querystaff) {
                        $message = "
                            <script>
                            toastr.success('Your account has been created successfully. Proceed to Login Now.');
                        </script>";
                        echo "<script>window.location.replace('login.php');</script>";
                    }
                }
            }
        }
    }
}
<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../index.php');
} else {
    include '../db-connection.php';
    $email_username = $_SESSION['admin'];
    $checkemail = "SELECT *  FROM `login` WHERE `login_username`= '$email_username'";
    $queryemail = mysqli_query($conn, $checkemail);
    $checkemailrows = mysqli_num_rows($queryemail);
    if ($checkemailrows >= 1) {
        while ($fetch = mysqli_fetch_assoc($queryemail)) {
            $globalusername = $fetch['login_username'];
            $globalloggedinid = $fetch['login_id'];

            $checkclient = "SELECT *  FROM `admin` WHERE `admin_login_id`= '$globalloggedinid'";
            $queryemail = mysqli_query($conn, $checkclient);
            $checkclientrows = mysqli_num_rows($queryemail);
            if ($checkclientrows >= 1) {
                while ($fetchuser = mysqli_fetch_assoc($queryemail)) {
                    $globaluserid = $fetchuser['user_id'];
                    $globaluserfullname = $fetchuser['admin_full_names'];
                    $globalusermobile = $fetchuser['admin_phone_number'];
                    $globaluseremail = $fetchuser['admin_email_address']; 
                }
            }

            global $globaluserid;
            global $globaluserfullname;
            global $globaluseremail;
            global $globalloggedinid;
            global $globalusermobile; 
        }
    }
}
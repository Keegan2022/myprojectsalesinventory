<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
} else {
    include '../db-connection.php';
    $email_username = $_SESSION['user'];
    $checkemail = "SELECT *  FROM `login` WHERE `login_username`= '$email_username'";
    $queryemail = mysqli_query($conn, $checkemail);
    $checkemailrows = mysqli_num_rows($queryemail);
    if ($checkemailrows >= 1) {
        while ($fetch = mysqli_fetch_assoc($queryemail)) {
            $globalusername = $fetch['login_username'];
            $globalloggedinid = $fetch['login_id'];

            $checkclient = "SELECT *  FROM `user` WHERE `user_login_id`= '$globalloggedinid'";
            $queryemail = mysqli_query($conn, $checkclient);
            $checkclientrows = mysqli_num_rows($queryemail);
            if ($checkclientrows >= 1) {
                while ($fetchuser = mysqli_fetch_assoc($queryemail)) {
                    $globaluserid = $fetchuser['user_id'];
                    $globaluserfullname = $fetchuser['user_full_names'];
                    $globalusermobile = $fetchuser['user_phone_number'];
                    $globaluseremail = $fetchuser['user_email_address']; 
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
<?php
session_start();
if (!isset($_SESSION['supplier'])) {
    header('Location: ../index.php');
} else {
    include '../db-connection.php';
    $email_username = $_SESSION['supplier'];
    $checkemail = "SELECT *  FROM `login` WHERE `login_username`= '$email_username'";
    $queryemail = mysqli_query($conn, $checkemail);
    $checkemailrows = mysqli_num_rows($queryemail);
    if ($checkemailrows >= 1) {
        while ($fetch = mysqli_fetch_assoc($queryemail)) {
            $globalusername = $fetch['login_username'];
            $globalloggedinid = $fetch['login_id'];

            $checkclient = "SELECT *  FROM `supplier` WHERE `supplier_login_id`= '$globalloggedinid'";
            $queryemail = mysqli_query($conn, $checkclient);
            $checkclientrows = mysqli_num_rows($queryemail);
            if ($checkclientrows >= 1) {
                while ($fetchuser = mysqli_fetch_assoc($queryemail)) {
                    $globaluserid = $fetchuser['supplier_id'];
                    $globaluserfullname = $fetchuser['supplier_name'];
                    $globalusercompany = $fetchuser['supplier_company'];
                    $globaluseremail = $fetchuser['supplier_location']; 
                    $globalusermobile = $fetchuser['supplier_contact']; 
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
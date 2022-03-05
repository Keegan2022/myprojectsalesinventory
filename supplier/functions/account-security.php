<?php
    include '../db-connection.php';
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $passlength = strlen($password);
    if (empty($password) || empty($cpassword)) {
        echo   $message = "
                                                <script>
                                                toastr.error('Provide all the Details');
                                            </script>";
    } else if ($password !== $cpassword) {
        echo $message = "
                                                    <script>
                                                        toastr.error('Provided password failed to match');
                                                    </script>
                                                ";
    } else if ($passlength < 8) {
        echo $message = "
                                                <script>
                                                    toastr.error('Minimum of 8 characters are needed as your password');
                                                </script>
                                            ";
    } else {
        $password = md5($password);
        $addcat = "UPDATE `login` SET `login_password`='$password' WHERE `login_id`='$globalloggedinid'";
        $querycat = mysqli_query($conn, $addcat);
        if ($querycat) {
            echo "<script>window.location.replace('dashboard.php');</script>";
        }
    }


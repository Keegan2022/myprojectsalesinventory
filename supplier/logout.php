<?php
session_start(); 
unset($_SESSION["supplier"]);
header("Location:../index.php");
?>
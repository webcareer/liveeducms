<?php
session_start();
ob_start();

unset($_SESSION['username']);
unset($_SESSION['fname']);
unset($_SESSION['lname']);
unset($_SESSION['rights']);

session_destroy();
header('location: ../index.php');

exit;
?>

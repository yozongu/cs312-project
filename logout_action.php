<!-- Phillip De Guzman
28 April 2026 -->

<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_destroy();
session_start();

if (empty($_SESSION['loggedin'])) {
    $_SESSION['message'] = ["You are not logged in"];
    require('login.php');
    exit;
}

$_SESSION = [];
session_destroy();

session_start();
$_SESSION['message'] = "Successfully logged out";

require('index.php');
exit;
?>
<!-- //Phillip De Guzman
//08 March 2026 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="std.css">
    <meta charset="UTF-8">
    <title>Club E-Z Money</title>
</head>

<?php
session_start();
include 'header.php';
include 'menu.php';
if (isset($_SESSION['message'])) { 
	echo "<h1 class='session_message'>" . $_SESSION['message'] . "</h1>";
	unset($_SESSION['message']);
}
?>

<div class="main">
    Welcome to Club E-Z Money
</div>

<div class="main-body">
    We are dedicated to helping you! Yes you! Join us now to succeed in life.
</div>

<?php
include 'footer.php';
?>
</html>
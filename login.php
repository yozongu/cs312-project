<!-- //Phillip De Guzman
//31 March 2026 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="std.css">
    <meta charset="UTF-8">
    <title>Login page</title>
</head>

<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    $_SESSION['message'] = 'You are already logged in';
    require('index.php');
    exit();
}
include 'header.php';
include 'menu.php';
if (isset($_SESSION['message'])) { 
    foreach ($_SESSION['message'] as $message) {
        echo "<p class ='session_message'>" . htmlspecialchars($message) ."</p>";
    }
	unset($_SESSION['message']);
}
?>

<body class="login_body">
    <h1 class='login_header'>Login</h1>
    <form action='login_action.php' method="POST">
        <div>
            <label for="user_name">Username:</label>
            <input type="text" name="user_name" placeholder="User name" required>
        </div>
        <div>
            <label for="pw">Password:</label>
            <input type="password" name="password" id="pw" placeholder="Enter your password" required>
        </div>
        <br>
        <div class="submit">
            <input type="submit">
        </div>
    </form>
</body><br><br>

<?php
include 'footer.php';
?>
</html>
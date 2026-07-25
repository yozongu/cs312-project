<!-- //Phillip De Guzman
//31 March 2026 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="std.css">
    <meta charset="UTF-8">
    <title>Registration</title>
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

<script>
    function validatePassword() {
        const pw = document.getElementById("pw").value;
        const confirm_pw = document.getElementById("confirm_pw").value;
        
        if (pw != confirm_pw) {
            alert("Passwords do not match");
            return false;
        }

        return true;
    }
</script>

<body class="registration_body">
    <h1 class="registration_header">Register now</h1>
    <form action="registration_action.php" method="POST" onsubmit="return validatePassword()">
        <div>
            <label for="user_name">Username:</label>
            <input type="text" name="user_name" placeholder="User name:">
        </div>
        <div>
            <label for="pw">Password:</label>
            <input type="password" name="password" id="pw" placeholder="Enter your password" required>
        </div>
        <div>
            <label for="confirm_pw">Confirm:</label>
            <input type="password" name="confirm_pw" id="confirm_pw" placeholder="Confirm your password" required>
        </div>
        <div>
            <label for="name">Full name:</label>
            <input type="text" name="name" placeholder="Full name:">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Enter your email">
        </div>
        <div>
            <label for="age">Age:</label>
            <input type="number" name="age" min="0" max="99">
        </div>
        <div class="DOB">
            <label for="DOB">Birthday:</label>
            <input type="date" name="DOB">
        </div>
        <div class="gender">
            <label>Gender:</label>
            <label>
                <input type="radio" name="gender" value="male">
                Male
            </label>
            <label>
                <input type="radio" name="gender" value="female">
                Female
            </label>
            <label>
                <input type="radio" name="gender" value="other">
                Other
            </label>
        </div>
        <div class="news_letter">
            <label>Subscribe to our newsletter:</label>
            <input type="checkbox" name="news_letter" value=true>
            <label></label>
        </div>
        <br>
        <div class="submit">
            <input type="submit">
        </div>
        <br><br>
    </form>
</body>

<?php
include 'footer.php';
?>
</html>
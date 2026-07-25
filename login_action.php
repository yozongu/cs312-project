<!-- Phillip De Guzman
28 April 2026 -->

<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();

$error = FALSE;

$user_name = $_POST['user_name'] ?? '';
$password = $_POST['password'] ?? '';

if ( empty($user_name) ||
    ! preg_match('/^[a-zA-Z0-9 ]{2,}$/', $user_name) )
    {
    $error = TRUE;
    $_SESSION['message'] = ["Your user name is not filled out. It is required and can contain only letters, numbers, and spaces."];
}

if ($error) {
    require('login.php');
    return;
}

$db = new SQLite3('user.db');

$stmt = $db->prepare("SELECT user_password from user WHERE user_name = :user_name");
$stmt->bindValue(':user_name', $user_name, SQLITE3_TEXT);
$result = $stmt->execute();
$row = $result->fetchArray(SQLITE3_ASSOC);

if ($row && password_verify($password, $row['user_password'])) {
    $_SESSION['message'] = "Successfully logged in as $user_name";
    $_SESSION['loggedin'] = true;
    require('index.php');
    exit;
}
else {
    $_SESSION['message'] = ['Invalid password or user not found'];
    require('login.php');
}

?>




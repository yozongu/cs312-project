<!-- //Phillip De Guzman
//31 March 2026 -->
<?php  
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();

$error = FALSE;

$user_name = $_POST['user_name'] ?? '';
$password = $_POST['password'] ?? '';
$email = $_POST['email'] ?? '';
$name = $_POST['name'] ??'';
$age = $_POST['age'] ??'';
$dob = $_POST['DOB'] ??'';
$gender = $_POST['gender'] ??'';
$news_letter = $_POST['news_letter'] ??'';

if ( empty($user_name) ||
    ! preg_match('/^[a-zA-Z0-9 ]{2,}$/', $user_name) )
    {
    $error = TRUE;
    $messages[] = "Your user name is not filled out. It is required and can contain only letters, numbers, and spaces.";
    }

if ( empty($email) ||
    ! preg_match('/^.+@.+$/', $email) )
    {
    $error = TRUE;
    $messages[] = "A valid email address is required.";
    }

if ( empty($name) || ! preg_match('/^[a-zA-Z0-9 ]{2,}$/', $name) ) {
    $error = TRUE;
    $messages[] = 'Your full name is not filled out. It is required and can contain only letters, numbers, and spaces.';
}

if (!is_numeric($age) || $age < 0 || $age > 99) {
    $error = TRUE;
    $messages[] = 'Your age needs to be filled out, and must be between 0 and 99';
}

if ( empty($gender)) {
    $error = TRUE;
    $messages[] = 'Please select one option for gender';
}

if ($error) {
    array_unshift($messages, "Error: Registration failed");
    $_SESSION['message'] = $messages;
    require('registration.php');
}

if(! $error) {
    $db = new SQLite3(__DIR__ . '/user.db');
    $sql = file_get_contents('makedb.sql');
    $db->exec($sql);

    // check that primary key userid doesn't already exist in db
    $stmt = $db->prepare("SELECT user_id FROM user WHERE user_name = :user_name");
    $stmt->bindValue(':user_name', $user_name, SQLITE3_TEXT);
    $result = $stmt->execute();

    if ($result->fetchArray()) {
        $_SESSION['message'] = ["User already exist!"];
        require('registration.php');
        return;
    }

    // generate password hash
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // add to database
    // $command = "INSERT INTO user VALUES('" . $userid . "', '" . $hash . "')";
    $stmt = $db->prepare("
        INSERT INTO user 
        (user_name, user_password, full_name, email, age, birthday, gender, subscribe)
        VALUES 
        (:user_name, :user_password, :full_name, :email, :age, :birthday, :gender, :subscribe)
        ");
    $stmt->bindValue(':user_name', $user_name, SQLITE3_TEXT);
    $stmt->bindValue(':user_password', $hash, SQLITE3_TEXT);
    $stmt->bindValue(':full_name', $name, SQLITE3_TEXT);
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $stmt->bindValue(':age', $age, SQLITE3_INTEGER);
    $stmt->bindValue(':birthday', $dob, SQLITE3_TEXT);
    $stmt->bindValue(':gender', $gender, SQLITE3_TEXT);
    $stmt->bindValue(':subscribe', $news_letter, SQLITE3_INTEGER);
    $stmt->execute();

    if ($result) {
        $_SESSION['message'] = "Registration successful";
        require('index.php');
    } 
}
?>
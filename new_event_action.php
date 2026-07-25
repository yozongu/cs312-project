<!-- //Phillip De Guzman
//31 March 2026 -->
<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();
$error = false;

$event_name = $_POST["event_name"] ?? '';
$sponsor = $_POST["sponsor"] ?? '';
$event_description = $_POST["event_description"] ?? '';
$event_dt = $_POST['event_dt'] ??'';
$messages = [];

if ( empty($event_name) ||
    !preg_match('/^[a-zA-Z0-9 .,!?&\'-]{2,}$/', $event_name) )
    {
    $error = TRUE;
    $messages[] = "Your event name is not filled out. It is required and can contain only letters, numbers, and spaces.";
    }

if ( empty($sponsor) ||
    !preg_match('/^[a-zA-Z0-9 .,!?&\'-]{2,}$/', $sponsor) )
    {
    $error = TRUE;
    $messages[] = "Your sponsor name is not filled out. It is required and can contain only letters, numbers, and spaces.";
    }

if (empty($event_description) || !preg_match('/^[a-zA-Z0-9 .,!?&\'-]{2,}$/', $event_description))
    {
    $error = TRUE;
    $messages[] = "Your event description is not filled out. It is required and can contain only letters, numbers, and spaces.";
    }

if ($error) {
    array_unshift($messages, "Error: Failed to add event");
    $_SESSION['message'] = $messages;
    require('new_event.php');
}
    
if(! $error) {
    $db = new SQLite3(__DIR__ . '/user.db');
    $stmt = $db->prepare("
        INSERT INTO events 
        (event_name, event_sponsor, event_description, event_date)
        VALUES 
        (:event_name, :sponsor, :event_description, :event_dt)
        ");

    $stmt->bindValue(':event_name', $event_name, SQLITE3_TEXT);
    $stmt->bindValue(':sponsor', $sponsor, SQLITE3_TEXT);
    $stmt->bindValue(':event_description', $event_description, SQLITE3_TEXT);
    $stmt->bindValue(':event_dt', $event_dt, SQLITE3_TEXT);
    $result = $stmt->execute();

    

    if ($result) {
        $_SESSION['message'] = "New event added!";
        require('index.php');
    } 
}

?>

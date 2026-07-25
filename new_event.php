<!-- //Phillip De Guzman
//31 March 2026 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="std.css">
    <meta charset="UTF-8">
    <title>New Event</title>
</head>

<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    $_SESSION['message'] = ['You must be logged in to use this feature'];
    header("Location: login.php");
    exit;
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
    function validateDate() {
        const input = document.getElementById("event_dt").value;
        const selectedDate = new Date(input);
        const today = new Date();
        today.setDate(today.getDate()+1);
        today.setHours(0, 0, 0, 0);
        console.log(today);
        console.log(selectedDate);
        if (selectedDate < today) {
            alert("You can only schedule event at the minimum the following day!");
            return false;
        }

        return true;
    }
</script>

<body class="new_event_body">
    <h1 class="new_event_header">New event</h1>
    <form action="new_event_action.php" method="POST" onsubmit="return validateDate()">
        <div>
            <label for="event_name">New event:</label>
            <input type="text" name="event_name" placeholder="Event name">
        </div>
        <div>
            <label for="event_sponsor">Sponsor: </label>
            <input type="text" name="sponsor" placeholder="Sponsor">
        </div>
        <div>
            <label for="event_description">Description: </label>
            <textarea id="event_description" name="event_description" rows="4" cols="50" placeholder="Enter your description here"></textarea>
        </div>
        <div>
            <label for="event_dt">Event date: </label>
            <input type="datetime-local" id="event_dt" name="event_dt" required>
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
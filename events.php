<!-- //Phillip De Guzman
//08 March 2026 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="std.css">
    <meta charset="UTF-8">
    <title>Events</title>
</head>

<?php
include 'header.php';
include 'menu.php';
?>

<div class="events-main">
    <b>Upcoming events</b>
</div>

<br><br>
<button class="new_event_button" onclick="window.location.href='new_event.php'">New Event</button>

<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$db = new SQLite3('user.db');

$result = $db->query("SELECT event_name, event_sponsor, event_description, event_date FROM events ORDER BY event_date ASC");

echo "<table class='event_table' border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>Event</th>
        <th>Sponsor</th>
        <th>Description</th>
        <th>Date</th>
      </tr>";

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row['event_name'] . "</td>";
    echo "<td>" . $row['event_sponsor'] . "</td>";
    echo "<td>" . $row['event_description'] . "</td>";
    echo "<td>" . $row['event_date'] . "</td>";
    echo "</tr>";
}

echo "</table><br><br>";

if (!$result) {
    echo "Query failed: " . $db->lastErrorMsg();
}
$row = $result->fetchArray(SQLITE3_ASSOC);
if (!$row) {
    echo "No data found.";
}

?>

<?php
include 'footer.php';
?>
</html>
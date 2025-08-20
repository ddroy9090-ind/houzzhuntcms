<?php
// $host = "localhost";
// $user = "root";
// $pass = "India@123";
// $db   = "channel_portal";
$host = "localhost";
$user = "root";
$pass = "";
$db   = "channel_portal";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
// $host = "localhost";
// $user = "root";
// $pass = "India@123";
// $db   = "channel_portal";
$host = "localhost";
$user = "u431421769_cpportal";
$pass = "Houzzhunt@2025";
$db   = "u431421769_cpportal";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

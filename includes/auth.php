<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php"); // Redirect to login if not logged in
    exit();
}
?>


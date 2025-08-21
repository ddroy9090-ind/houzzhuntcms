<?php
include 'includes/auth.php';
include 'config.php';

$sender = $_SESSION['user_id'];
$receiver = isset($_POST['receiver_id']) ? (int)$_POST['receiver_id'] : 0;
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

if ($receiver && $message !== '') {
    $stmt = $conn->prepare("INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)");
    $stmt->bind_param('iis', $sender, $receiver, $message);
    $stmt->execute();
}
?>

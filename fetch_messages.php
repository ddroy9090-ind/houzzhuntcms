<?php
include 'includes/auth.php';
include 'config.php';

$current = $_SESSION['user_id'];
$other = isset($_GET['user']) ? (int)$_GET['user'] : 0;

$stmt = $conn->prepare("SELECT * FROM messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) ORDER BY created_at");
$stmt->bind_param('iiii', $current, $other, $other, $current);
$stmt->execute();
$res = $stmt->get_result();

while ($row = $res->fetch_assoc()) {
    $class = $row['sender_id'] == $current ? 'text-end' : 'text-start';
    $badge = $row['sender_id'] == $current ? 'primary' : 'secondary';
    echo "<div class='$class'><span class='badge bg-$badge'>" . htmlspecialchars($row['message']) . "</span></div>";
}

$mark = $conn->prepare("UPDATE messages SET is_read = 1 WHERE sender_id = ? AND receiver_id = ? AND is_read = 0");
$mark->bind_param('ii', $other, $current);
$mark->execute();
?>

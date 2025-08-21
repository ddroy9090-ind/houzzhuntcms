<?php
header('Content-Type: application/json');
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $next  = trim($_POST['next_followup'] ?? '');

    if ($name === '') {
        echo json_encode(['status' => 'error', 'message' => 'Name is required']);
        exit;
    }

    $sql = "INSERT INTO leads (name, email, phone, next_followup) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => $conn->error]);
        exit;
    }
    $stmt->bind_param('ssss', $name, $email, $phone, $next);
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }
}
?>

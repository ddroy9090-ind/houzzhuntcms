<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id       = $_POST['id'];
    $name     = $_POST['name'];
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $role     = $_POST['role'];

    $sql = "UPDATE users SET name=?, username=?, email=?, role=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $name, $username, $email, $role, $id);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
}
?>

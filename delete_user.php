<?php
include "config.php";

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    
    // Delete query
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Reset auto increment
        $conn->query("ALTER TABLE users AUTO_INCREMENT = 1");
        echo "success";
    } else {
        echo "error";
    }
}
?>

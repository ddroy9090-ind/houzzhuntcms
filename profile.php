<?php
include 'includes/auth.php';
include 'config.php';

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT name, username, email, role FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
?>
<?php include 'includes/common-header.php'; ?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8 profile-container">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="assets/images/users/avatar-1.jpg" alt="Profile Avatar" class="profile-avatar mb-3">
                            <h4 class="mb-1"><?php echo htmlspecialchars($user['name']); ?></h4>
                            <p class="text-muted mb-3"><?php echo htmlspecialchars($user['email']); ?></p>
                            <p class="mb-0"><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
                            <p class="mb-0"><strong>Role:</strong> <?php echo htmlspecialchars($user['role']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/common-footer.php'; ?>

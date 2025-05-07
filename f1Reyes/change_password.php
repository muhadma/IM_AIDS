<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

require_once 'connect.php';
require_once 'includes/header.php';
$uid = $_SESSION['uid'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Fetch the current password from the database
    $stmt = $connection->prepare("SELECT password FROM tbluser WHERE uid = ?");
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verify current password
    if (password_verify($current_password, $user['password'])) {
        // Check if new password matches confirm password
        if ($new_password === $confirm_password) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            
            // Update the password in the database
            $stmt_update = $connection->prepare("UPDATE tbluser SET password = ? WHERE uid = ?");
            $stmt_update->bind_param("si", $hashed_password, $uid);
            $stmt_update->execute();
            
            echo "<p>Password updated successfully!</p>";
            header("Location: profile.php");
            exit();
        } else {
            $error = "New password and confirm password do not match.";
        }
    } else {
        $error = "Current password is incorrect.";
    }
}

?>

<link rel="stylesheet" type="text/css" href="css/register.css">

<!-- Card Style for Change Password -->
<style>
    .main-content {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
    }

    .card {
        width: 100%;
        max-width: 600px;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .card form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .card label {
        font-weight: bold;
    }

    .card input {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 16px;
    }

    .card button {
        padding: 12px;
        background-color: #2a2f6f;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .card button:hover {
        background-color: #1f245a;
    }
</style>

<div class="nav-container">
    <nav>
        <a href="home_beneficiary.php">Home</a>
        <a href="donate.php">Make a Donation</a>
        <a href="profile.php">My Profile</a>
        <a href="index.php">Logout</a>
    </nav>
</div>

<div class="main-content">
    <div class="card">
        <h2>Change Password</h2>
        
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST">
            <div>
                <label for="current_password">Current Password:</label>
                <input type="password" name="current_password" id="current_password" required>
            </div>

            <div>
                <label for="new_password">New Password:</label>
                <input type="password" name="new_password" id="new_password" required>
            </div>

            <div>
                <label for="confirm_password">Confirm New Password:</label>
                <input type="password" name="confirm_password" id="confirm_password" required>
            </div>

            <div>
                <button type="submit" class="btn">Change Password</button>
            </div>
        </form>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
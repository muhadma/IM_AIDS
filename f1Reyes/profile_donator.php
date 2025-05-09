<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

require_once 'connect.php'; // Adjust path as needed
require_once 'includes/header.php';

$uid = $_SESSION['uid'];

// Fetch user basic info
$query = "SELECT uid, username, is_beneficiary, is_donator FROM tbluser WHERE uid = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $uid);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "<p>User not found.</p>";
    require_once 'includes/footer.php';
    exit();
}

$user = $result->fetch_assoc();

// Determine user type
if ($user['is_beneficiary']) {
    $user_type = "Beneficiary";

    // Fetch address from tblbeneficiary
    $stmt2 = $connection->prepare("SELECT address FROM tblbeneficiary WHERE uid = ?");
    $stmt2->bind_param("i", $uid);
    $stmt2->execute();
    $res2 = $stmt2->get_result();
    $address = $res2->num_rows ? $res2->fetch_assoc()['address'] : "Not provided";

} elseif ($user['is_donator']) {
    $user_type = "Donator";
    $address = "Not applicable";
} else {
    $user_type = "N/A";
    $address = "Not applicable";
}
?>

<link rel="stylesheet" type="text/css" href="css/register.css">
<style>

    .cta-buttons {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .cta-buttons a {
        padding: 12px 24px;
        background-color: #2a2f6f;
        color: #fff;
        text-decoration: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 500;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .cta-buttons a:hover {
        background-color: #1f245a;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.2);
    }
</style>

<div class="nav-container">
    <nav>
        <a href="home_donator.php">Home</a>
        <a href="donate_donator.php">Make a Donation</a>
        <a href="profile_donator.php">My Profile</a>
        <a href="index.php">Logout</a>
    </nav>
</div>

<div class="main-content">
    <h2>My Profile</h2>
    <table>
        <tr><th>Username:</th><td><?php echo htmlspecialchars($user['username']); ?></td></tr>
        <tr><th>User Type:</th><td><?php echo $user_type; ?></td></tr>
        <tr><th>Address:</th><td><?php echo htmlspecialchars($address); ?></td></tr>
    </table>

    <div class="cta-buttons" style="margin-top: 20px;">
        <a href="edit_profile.php" class="btn">Edit Profile</a>
        <a href="change_password.php" class="btn">Change Password</a>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>

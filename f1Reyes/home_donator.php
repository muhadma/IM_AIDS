<?php
session_start();
if (!isset($_SESSION['uid']) || $_SESSION['usertype'] !== 'donator') {
    header("Location: login.php");
    exit();
}
require_once 'includes/header.php';
?>
<link rel="stylesheet" type="text/css" href="css/register.css">
<style>
    .main-content {
        padding: 40px;
        background-color: #f0f4f8;
        min-height: 100vh;
        font-family: Arial, sans-serif;
    }

    .main-content h2 {
        margin-bottom: 10px;
    }

    .subtitle {
        margin-bottom: 30px;
        color: #555;
    }

    .donator-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 20px;
    }

    .donator-card {
        background-color: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: transform 0.2s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .donator-card:hover {
        transform: translateY(-5px);
    }

    .donator-card h3 {
        margin: 0 0 10px;
        color: #222;
    }

    .donator-card p {
        flex-grow: 1;
        color: #666;
    }

    .btn {
        display: inline-block;
        margin-top: 15px;
        padding: 10px 20px;
        background-color: #007acc;
        color: #fff;
        text-decoration: none;
        border-radius: 6px;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #005f99;
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
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> (<?php echo ucfirst($_SESSION['usertype']); ?>)</h2>
    <p class="subtitle">Access your features below:</p>

    <div class="donator-cards">
        <div class="donator-card">
            <h3>My Donations</h3>
            <p>View your donation history and details.</p>
            <a href="sent_donations.php" class="btn">View Donations</a>
        </div>

        <div class="donator-card">
            <h3>Update Profile</h3>
            <p>Edit your personal and contact information.</p>
            <a href="profile_donator.php" class="btn">Edit Profile</a>
        </div>

        <div class="donator-card">
            <h3>Make a Donation</h3>
            <p>Support those in need by donating now.</p>
            <a href="donate_donator.php" class="btn">Donate</a>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>

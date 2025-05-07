<?php
session_start();
if (!isset($_SESSION['uid']) || ($_SESSION['usertype'] !== 'beneficiary' && $_SESSION['usertype'] !== 'donator')) {
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

.beneficiary-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 20px;
}

.beneficiary-card {
    background-color: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    transition: transform 0.2s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.beneficiary-card:hover {
    transform: translateY(-5px);
}

.beneficiary-card h3 {
    margin: 0 0 10px;
    color: #222;
}

.beneficiary-card p {
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
        <a href="home_beneficiary.php">Home</a>
        <a href="donate.php">Make a Donation</a>
        <a href="profile.php">My Profile</a>
        <a href="index.php">Logout</a>
    </nav>
</div>

<div class="main-content">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> (<?php echo ucfirst($_SESSION['usertype']); ?>)</h2>
    <p class="subtitle">Access your features below:</p>

    <div class="beneficiary-cards">
        <div class="beneficiary-card">
            <h3>Request Assistance</h3>
            <p>Submit a request for financial or in-kind help.</p>
            <a href="request_assistance.php" class="btn">Request Now</a>
        </div>

        <div class="beneficiary-card">
            <h3>My Donations</h3>
            <p>View donations received and history.</p>
            <a href="donations_received.php" class="btn">View Donations</a>
        </div>

        <div class="beneficiary-card">
            <h3>Update Profile</h3>
            <p>Edit your personal and contact information.</p>
            <a href="profile.php" class="btn">Edit Profile</a>
        </div>

        <div class="beneficiary-card">
            <h3>Make a Donation</h3>
            <p>Give back to others in need if you are able.</p>
            <a href="donate.php" class="btn">Donate</a>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
<?php
session_start();
if (!isset($_SESSION['uid']) || $_SESSION['usertype'] !== 'employee') {
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

    .employee-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 20px;
    }

    .employee-card {
        background-color: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: transform 0.2s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .employee-card:hover {
        transform: translateY(-5px);
    }

    .employee-card h3 {
        margin: 0 0 10px;
        color: #222;
    }

    .employee-card p {
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
        <a href="home_employee.php">Home</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="learn_more.php">Manage Users</a>
        <a href="reports.php">Reports</a>
        <a href="index.php">Logout</a>
    </nav>
</div>

<div class="main-content">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> (Employee)</h2>
    <p class="subtitle">Choose an action to manage the system effectively:</p>

    <div class="employee-cards">
        <div class="employee-card">
            <h3>User Management</h3>
            <p>Manage beneficiaries and donators.</p>
            <a href="learn_more.php" class="btn">Manage Users</a>
        </div>

        <div class="employee-card">
            <h3>Donation Logs</h3>
            <p>View and monitor donations.</p>
            <a href="donation_logs.php" class="btn">View Donations</a>
        </div>

        <div class="employee-card">
            <h3>Reports</h3>
            <p>Generate and download reports.</p>
            <a href="reports.php" class="btn">Go to Reports</a>
        </div>

        <div class="employee-card">
            <h3>Analytics</h3>
            <p>Visual dashboard of system performance.</p>
            <a href="dashboard.php" class="btn">View Dashboard</a>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
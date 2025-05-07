<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

require_once 'connect.php';
require_once 'includes/header.php';

// Sample data for visual display (replace with real DB fetch)
$donation_logs = [
    ['donor' => 'John Doe', 'recipient' => 'Anna Cruz', 'type' => 'Cash', 'amount' => 1000, 'date' => '2025-05-01'],
    ['donor' => 'Maria Santos', 'recipient' => 'Carlos Reyes', 'type' => 'Goods', 'amount' => 500, 'date' => '2025-04-28'],
    ['donor' => 'Anonymous', 'recipient' => 'Liza Ramos', 'type' => 'Medicine', 'amount' => 800, 'date' => '2025-04-25'],
];
?>

<link rel="stylesheet" href="css/register.css">
<style>
    .log-container {
        max-width: 1000px;
        margin: 50px auto;
        padding: 30px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        font-family: 'Segoe UI', sans-serif;
    }

    .log-container h2 {
        text-align: center;
        color: #2a2f6f;
        margin-bottom: 25px;
    }

    .log-table {
        width: 100%;
        border-collapse: collapse;
    }

    .log-table th,
    .log-table td {
        padding: 12px;
        border: 1px solid #ccc;
        text-align: left;
    }

    .log-table th {
        background-color: #2a2f6f;
        color: white;
    }

    .log-table tr:nth-child(even) {
        background-color: #f4f4f4;
    }

    .nav-container {
        background-color: #2a2f6f;
        padding: 15px;
        text-align: center;
    }

    .nav-container nav a {
        color: white;
        text-decoration: none;
        font-size: 18px;
        padding: 10px 20px;
        margin: 0 10px;
        display: inline-block;
        transition: 0.3s;
    }

    .nav-container nav a:hover {
        background-color: #1f245a;
        border-radius: 5px;
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

<div class="log-container">
    <h2>Donation Logs</h2>
    <table class="log-table">
        <thead>
            <tr>
                <th>Donor</th>
                <th>Recipient</th>
                <th>Donation Type</th>
                <th>Amount/Value</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($donation_logs as $log): ?>
            <tr>
                <td><?= htmlspecialchars($log['donor']) ?></td>
                <td><?= htmlspecialchars($log['recipient']) ?></td>
                <td><?= htmlspecialchars($log['type']) ?></td>
                <td>₱<?= number_format($log['amount'], 2) ?></td>
                <td><?= htmlspecialchars($log['date']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'includes/footer.php'; ?>

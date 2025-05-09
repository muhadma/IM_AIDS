<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

require_once 'connect.php';
require_once 'includes/header.php';

$uid = $_SESSION['uid'];

$stmt = $connection->prepare("SELECT donation_type, amount FROM tbldonator WHERE uid = ? AND amount > 0");
$stmt->bind_param("i", $uid);
$stmt->execute();
$result = $stmt->get_result();

$donations = [];
$totalAmount = 0;

while ($row = $result->fetch_assoc()) {
    $donations[] = $row;
    $totalAmount += $row['amount'];
}

$stmt->close();
?>

<link rel="stylesheet" href="css/register.css">
<style>
    .donation-container {
        max-width: 800px;
        margin: 50px auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        font-family: 'Segoe UI', sans-serif;
    }

    .donation-container h2 {
        text-align: center;
        color: #2a2f6f;
        margin-bottom: 25px;
    }

    table.donation-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .donation-table th,
    .donation-table td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .donation-table th {
        background-color: #2a2f6f;
        color: white;
    }

    .donation-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .total-row td {
        font-weight: bold;
        background-color: #f1f1f1;
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
        <a href="home_donator.php">Home</a>
        <a href="sent_donations.php">Donations Sent</a>
        <a href="profile.php">My Profile</a>
        <a href="index.php">Logout</a>
    </nav>
</div>

<div class="donation-container">
    <h2>My Donations</h2>

    <table class="donation-table">
        <thead>
            <tr>
                <th>Donation Type</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($donations) > 0): ?>
                <?php foreach ($donations as $donation): ?>
                    <tr>
                        <td><?= htmlspecialchars($donation['donation_type']) ?></td>
                        <td>₱<?= number_format($donation['amount'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr class="total-row">
                    <td>Total</td>
                    <td>₱<?= number_format($totalAmount, 2) ?></td>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="2" style="text-align:center; font-style:italic;">No donations yet.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once 'includes/footer.php'; ?>

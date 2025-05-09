<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

require_once 'connect.php';
require_once 'includes/header.php';

$fname = isset($_POST['fname']) ? $_POST['fname'] : '';
$lname = isset($_POST['lname']) ? $_POST['lname'] : '';
$donation_type = isset($_POST['donation_type']) ? $_POST['donation_type'] : '';
$amount = isset($_POST['amount']) ? $_POST['amount'] : '';
$organization = isset($_POST['organization']) ? $_POST['organization'] : '';

$filter_conditions = [];
if ($fname) $filter_conditions[] = "u.fname LIKE '%$fname%'";
if ($lname) $filter_conditions[] = "u.lname LIKE '%$lname%'";
if ($donation_type) $filter_conditions[] = "d.donation_type LIKE '%$donation_type%'";
if ($amount) $filter_conditions[] = "d.amount LIKE '%$amount%'";
if ($organization) $filter_conditions[] = "d.organization LIKE '%$organization%'";

$filter_sql = $filter_conditions ? 'WHERE ' . implode(' AND ', $filter_conditions) : '';

$donation_query = "SELECT u.fname AS donor_fname, u.lname AS donor_lname, d.organization, d.amount, d.donation_type
                   FROM tbluser u
                   JOIN tbldonator d ON u.uid = d.uid
                   $filter_sql
                   ORDER BY u.lname";
$donation_result = $connection->query($donation_query);

$total_query = "SELECT SUM(amount) AS total_amount FROM tbldonator";
$total_result = $connection->query($total_query);
$total_row = $total_result->fetch_assoc();
$total_amount = $total_row['total_amount'] ?? 0;
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
        margin-bottom: 15px;
    }

    .filter-form {
        text-align: center;
        margin-bottom: 20px;
    }

    .filter-form input {
        padding: 8px;
        margin: 5px;
        width: 180px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .filter-form button {
        padding: 10px 20px;
        background-color: #2a2f6f;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }

    .filter-form button:hover {
        background-color: #1f245a;
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

    <div style="text-align: left; margin-bottom: 20px;">
        <strong>Total donation received:</strong> ₱<?= number_format($total_amount, 2) ?>
    </div>

    <form class="filter-form" method="POST" action="">
        <input type="text" name="fname" placeholder="Donor First Name" value="<?= htmlspecialchars($fname) ?>">
        <input type="text" name="lname" placeholder="Donor Last Name" value="<?= htmlspecialchars($lname) ?>">
        <input type="text" name="donation_type" placeholder="Donation Type" value="<?= htmlspecialchars($donation_type) ?>">
        <input type="number" name="amount" placeholder="Amount" step="0.01" value="<?= htmlspecialchars($amount) ?>">
        <input type="text" name="organization" placeholder="Organization" value="<?= htmlspecialchars($organization) ?>">
        <br>
        <button type="submit">Filter</button>
    </form>

    <table class="log-table">
        <thead>
            <tr>
                <th>Donor</th>
                <th>Organization</th>
                <th>Donation Type</th>
                <th>Amount/Value</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($donation_result->num_rows > 0) {
                while ($log = $donation_result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($log['donor_fname']) . " " . htmlspecialchars($log['donor_lname']) . "</td>
                            <td>" . htmlspecialchars($log['organization']) . "</td>
                            <td>" . htmlspecialchars($log['donation_type']) . "</td>
                            <td>₱" . number_format($log['amount'], 2) . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No donation logs found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php require_once 'includes/footer.php'; ?>

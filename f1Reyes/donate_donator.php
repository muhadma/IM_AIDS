<?php
session_start();

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

// Direct DB connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "dbf1Reyes";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uid = $_SESSION['uid'];
    $donation_type = trim($_POST['donation_type']);
    $amount = trim($_POST['amount']);

    $stmt = $conn->prepare("INSERT INTO tbldonator (uid, donation_type, amount) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $uid, $donation_type, $amount);

    if ($stmt->execute()) {
        echo "<script>alert('Donation submitted successfully!'); window.location.href='home_donator.php';</script>";
    } else {
        echo "<script>alert('Error submitting donation.'); window.location.href='home_donator.php';</script>";
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>

<link rel="stylesheet" href="css/register.css">
<style>
    .donate-container {
        max-width: 500px;
        margin: 50px auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        font-family: 'Segoe UI', sans-serif;
    }

    .donate-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #2a2f6f;
    }

    .donate-container form label {
        display: block;
        margin-top: 15px;
        font-weight: 500;
    }

    .donate-container input,
    .donate-container select {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 16px;
    }

    .donate-container button {
        margin-top: 25px;
        width: 100%;
        padding: 12px;
        background-color: #2a2f6f;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .donate-container button:hover {
        background-color: #1f245a;
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
        <a href="profile_donator.php">My Profile</a>
        <a href="index.php">Logout</a>
    </nav>
</div>

<div class="donate-container">
    <h2>Make a Donation</h2>
    <form method="post" action="donate_donator.php">
        <label for="donation_type">Donation Type</label>
        <select id="donation_type" name="donation_type" required>
            <option value="">Select</option>
            <option value="cash">Cash</option>
            <option value="goods">Goods</option>
            <option value="services">Services</option>
            <option value="medicine">Medicine</option>
        </select>

        <label for="amount">Amount / Description</label>
        <input type="text" id="amount" name="amount" placeholder="Enter amount or description..." required>

        <button type="submit">Submit Donation</button>
    </form>
</div>

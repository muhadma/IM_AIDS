<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

require_once 'includes/header.php';
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
        <a href="home_beneficiary.php">Home</a>
        <a href="request_assistance.php">Request Assistance</a>
        <a href="profile.php">My Profile</a>
        <a href="index.php">Logout</a>
    </nav>
</div>

<div class="donate-container">
    <h2>Make a Donation</h2>
    <form method="post" action="#">
        <label for="donation_type">Donation Type</label>
        <select id="donation_type" name="donation_type" required>
            <option value="">Select</option>
            <option value="cash">Cash</option>
            <option value="goods">Goods</option>
            <option value="services">Services</option>
        </select>

        <label for="amount">Amount / Description</label>
        <input type="text" id="amount" name="amount" placeholder="Enter amount or description..." required>

        <label for="message">Message (optional)</label>
        <input type="text" id="message" name="message" placeholder="Leave a note...">

        <button type="submit">Submit Donation</button>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>

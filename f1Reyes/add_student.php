<?php
session_start();
include 'connect.php';
require_once 'includes/header.php'; 
?>

<link rel="stylesheet" type="text/css" href="css/dashboard.css">

<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f4f7fc;
        margin: 0;
        padding: 0;
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

    .form-container {
        margin: 30px auto;
        padding: 25px;
        border: 1px solid #ddd;
        background-color: #fff;
        border-radius: 10px;
        max-width: 600px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .form-container h2 {
        text-align: center;
        color: #2a2f6f;
    }

    .form-container label {
        font-size: 16px;
        display: block;
        margin: 10px 0 5px;
    }

    .form-container input[type="text"],
    .form-container input[type="password"] {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 16px;
        box-sizing: border-box;
    }

    .form-container button {
        background-color: #2a2f6f;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
        transition: 0.3s;
    }

    .form-container button:hover {
        background-color: #1f245a;
    }

    /* Role checkboxes styled horizontally */
    .role-checkboxes {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin: 10px 0;
    }

    .role-checkboxes label {
        margin: 0;
    }

    /* Conditional field styling */
    .conditional-input {
        display: none;
        margin-top: 10px;
    }

    .conditional-input input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 16px;
        box-sizing: border-box;
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

<!-- Form to add a new user -->
<div class="form-container">
    <h2>Add User</h2>
    <form id="addUserForm" method="POST" action="addrecord_process.php">
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" required><br>

        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" required><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label>Roles:</label><br>
        <div class="role-checkboxes">
            <div>
                <input type="checkbox" id="is_employee" name="is_employee">
                <label for="is_employee">Employee</label>
            </div>
            <div>
                <input type="checkbox" id="is_beneficiary" name="is_beneficiary">
                <label for="is_beneficiary">Beneficiary</label>
            </div>
            <div>
                <input type="checkbox" id="is_donator" name="is_donator">
                <label for="is_donator">Donator</label>
            </div>
        </div>

        <!-- Conditional Inputs -->
        <div id="employee-fields" class="conditional-input">
            <label for="salary">Salary:</label>
            <input type="text" id="salary" name="salary">
        </div>

        <div id="beneficiary-fields" class="conditional-input">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address">
        </div>

        <div id="donator-fields" class="conditional-input">
            <label for="organization">Organization:</label>
            <input type="text" id="organization" name="organization">
        </div>

        <button type="submit">Add User</button>
    </form>
</div>

<script>
    // JavaScript to handle showing and hiding conditional fields based on selected roles
    document.querySelectorAll('.role-checkboxes input').forEach(input => {
        input.addEventListener('change', function() {
            const isEmployee = document.getElementById('is_employee').checked;
            const isBeneficiary = document.getElementById('is_beneficiary').checked;
            const isDonator = document.getElementById('is_donator').checked;

            document.getElementById('employee-fields').style.display = isEmployee ? 'block' : 'none';
            document.getElementById('beneficiary-fields').style.display = isBeneficiary ? 'block' : 'none';
            document.getElementById('donator-fields').style.display = isDonator ? 'block' : 'none';
        });
    });

    // Initialize the visibility of fields based on the current state of checkboxes
    window.onload = function() {
        const isEmployee = document.getElementById('is_employee').checked;
        const isBeneficiary = document.getElementById('is_beneficiary').checked;
        const isDonator = document.getElementById('is_donator').checked;

        document.getElementById('employee-fields').style.display = isEmployee ? 'block' : 'none';
        document.getElementById('beneficiary-fields').style.display = isBeneficiary ? 'block' : 'none';
        document.getElementById('donator-fields').style.display = isDonator ? 'block' : 'none';
    }
</script>

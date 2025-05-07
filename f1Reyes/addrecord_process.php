<?php
session_start();
include 'connect.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form values
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security
    $is_employee = isset($_POST['is_employee']) ? 1 : 0;
    $is_beneficiary = isset($_POST['is_beneficiary']) ? 1 : 0;
    $is_donator = isset($_POST['is_donator']) ? 1 : 0;

    // Prepare SQL query to insert the data into the database
    $query = "INSERT INTO tbluser (fname, lname, username, password, is_employee, is_beneficiary, is_donator, date_created)
              VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("sssssii", $fname, $lname, $username, $password, $is_employee, $is_beneficiary, $is_donator);

    // Execute the query and check for success
    if ($stmt->execute()) {
        // Redirect to dashboard.php after successful insertion
        header("Location: dashboard.php");
        exit();
    } else {
        // Error handling (optional)
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
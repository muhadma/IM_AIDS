<?php
include('connect.php');
require_once 'includes/header.php';

$employee_query = "SELECT u.fname, u.lname, e.salary FROM tbluser u JOIN tblemployee e ON u.uid = e.uid";
$employee_result = $connection->query($employee_query);

$beneficiary_query = "SELECT u.fname, u.lname, b.address FROM tbluser u JOIN tblbeneficiary b ON u.uid = b.uid";
$beneficiary_result = $connection->query($beneficiary_query);

$donator_query = "SELECT u.fname, u.lname, d.organization FROM tbluser u JOIN tbldonator d ON u.uid = d.uid";
$donator_result = $connection->query($donator_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User and Beneficiary Lists</title>
  <link rel="stylesheet" type="text/css" href="css/learn_more.css">
</head>
<style>
  body {
    font-family: 'Roboto', sans-serif;
  }

  table {
    width: 90%;
    margin: 20px auto;
    border-collapse: collapse;
    background: #fff;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    border-radius: 8px;
    overflow: hidden;
  }

  table th, table td {
    padding: 14px;
    border: 1px solid #ddd;
    text-align: left;
  }

  table th {
    background-color: #2a2f6f;
    color: white;
  }

  h2 {
    text-align: center;
    margin-top: 40px;
    color: #2a2f6f;
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

    table:last-of-type {
  margin-bottom: 60px;
}

</style>
<body>

<div class="nav-container">
    <nav>
        <a href="home_employee.php">Home</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="learn_more.php">Manage Users</a>
        <a href="reports.php">Reports</a>
        <a href="index.php">Logout</a>
    </nav>
</div>

<h2>List of Employees</h2>
<table>
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Salary</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($employee_result->num_rows > 0) {
        while ($user = $employee_result->fetch_assoc()) {
            echo "<tr><td>" . htmlspecialchars($user['fname']) . "</td><td>" . htmlspecialchars($user['lname']) . "</td><td>₱" . number_format($user['salary'], 2) . "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No employees found</td></tr>";
    }
    ?>
  </tbody>
</table>

<h2>List of Beneficiaries</h2>
<table>
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Address</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($beneficiary_result->num_rows > 0) {
        while ($beneficiary = $beneficiary_result->fetch_assoc()) {
            echo "<tr><td>" . htmlspecialchars($beneficiary['fname']) . "</td><td>" . htmlspecialchars($beneficiary['lname']) . "</td><td>" . htmlspecialchars($beneficiary['address']) . "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No beneficiaries found</td></tr>";
    }
    ?>
  </tbody>
</table>

<h2>List of Donators</h2>
<table>
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Organization</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if ($donator_result->num_rows > 0) {
          while ($donator = $donator_result->fetch_assoc()) {
              echo "<tr><td>" . htmlspecialchars($donator['fname']) . "</td><td>" . htmlspecialchars($donator['lname']) . "</td><td>" . htmlspecialchars($donator['organization']) . "</td></tr>";
          }
      } else {
          echo "<tr><td colspan='3'>No donators found</td></tr>";
      }
    ?>
  </tbody>
</table>

</body>
</html>

<?php require_once 'includes/footer.php'; ?>

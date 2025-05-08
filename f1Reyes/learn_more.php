<?php
include('connect.php');
require_once 'includes/header.php';

$empFname = $_GET['empFname'] ?? '';
$empLname = $_GET['empLname'] ?? '';

$employee_query = "SELECT u.fname, u.lname, e.salary FROM tbluser u JOIN tblemployee e ON u.uid = e.uid";
if (!empty($empFname) && !empty($empLname)) {
    $employee_query .= " WHERE u.fname LIKE '%$empFname%' AND u.lname LIKE '%$empLname%'";
} elseif (!empty($empFname)) {
    $employee_query .= " WHERE u.fname LIKE '%$empFname%'";
} elseif (!empty($empLname)) {
    $employee_query .= " WHERE u.lname LIKE '%$empLname%'";
}
$employee_result = $connection->query($employee_query);

$benFname = $_GET['benFname'] ?? '';
$benLname = $_GET['benLname'] ?? '';

$beneficiary_query = "SELECT u.fname, u.lname, b.address FROM tbluser u JOIN tblbeneficiary b ON u.uid = b.uid";
if (!empty($benFname) && !empty($benLname)) {
    $beneficiary_query .= " WHERE u.fname LIKE '%$benFname%' AND u.lname LIKE '%$benLname%'";
} elseif (!empty($benFname)) {
    $beneficiary_query .= " WHERE u.fname LIKE '%$benFname%'";
} elseif (!empty($benLname)) {
    $beneficiary_query .= " WHERE u.lname LIKE '%$benLname%'";
}
$beneficiary_result = $connection->query($beneficiary_query);

$donFname = $_GET['donFname'] ?? '';
$donLname = $_GET['donLname'] ?? '';
$donOrg = $_GET['donOrg'] ?? '';

$donator_query = "SELECT u.fname, u.lname, d.organization FROM tbluser u JOIN tbldonator d ON u.uid = d.uid";
$conditions = [];

if (!empty($donFname)) {
    $conditions[] = "u.fname LIKE '%$donFname%'";
}
if (!empty($donLname)) {
    $conditions[] = "u.lname LIKE '%$donLname%'";
}
if (!empty($donOrg)) {
    $conditions[] = "d.organization LIKE '%$donOrg%'";
}
if (!empty($conditions)) {
    $donator_query .= " WHERE " . implode(" AND ", $conditions);
}
$donator_result = $connection->query($donator_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User and Beneficiary Lists</title>
  <link rel="stylesheet" type="text/css" href="css/learn_more.css">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }

    .table-container {
      padding: 0 40px;
    }

    table {
      width: 100%;
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

    .search-form {
      text-align: center;
      margin-bottom: 20px;
    }

    .search-form input {
      padding: 8px;
      margin: 0 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .search-form button {
      padding: 8px 16px;
      background-color: #2a2f6f;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .search-form button:hover {
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

    .donator-table {
      margin-bottom: 100px;
    }
  </style>
</head>
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

<div class="table-container">
  <h2>List of Employees</h2>
  <form method="GET" class="search-form">
    <input type="text" name="empFname" placeholder="First Name" value="<?= htmlspecialchars($empFname) ?>">
    <input type="text" name="empLname" placeholder="Last Name" value="<?= htmlspecialchars($empLname) ?>">
    <button type="submit">Search</button>
  </form>
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
</div>

<div class="table-container">
  <h2>List of Beneficiaries</h2>
  <form method="GET" class="search-form">
    <input type="text" name="benFname" placeholder="First Name" value="<?= htmlspecialchars($benFname) ?>">
    <input type="text" name="benLname" placeholder="Last Name" value="<?= htmlspecialchars($benLname) ?>">
    <button type="submit">Search</button>
  </form>
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
</div>

<div class="table-container donator-table">
  <h2>List of Donators</h2>
  <form method="GET" class="search-form">
    <input type="text" name="donFname" placeholder="First Name" value="<?= htmlspecialchars($donFname) ?>">
    <input type="text" name="donLname" placeholder="Last Name" value="<?= htmlspecialchars($donLname) ?>">
    <input type="text" name="donOrg" placeholder="Organization" value="<?= htmlspecialchars($donOrg) ?>">
    <button type="submit">Search</button>
  </form>
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
</div>

</body>
</html>

<?php require_once 'includes/footer.php'; ?>

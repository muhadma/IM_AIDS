<?php
include 'connect.php';
include 'includes/header.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('Invalid request.'); window.location.href='dashboard.php';</script>";
    exit();
}

$uid = intval($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = mysqli_real_escape_string($connection, $_POST['fname']);
    $lname = mysqli_real_escape_string($connection, $_POST['lname']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $hashedpw = password_hash($password, PASSWORD_DEFAULT);
    $is_employee = isset($_POST['is_employee']) ? 1 : 0;
    $is_beneficiary = isset($_POST['is_beneficiary']) ? 1 : 0;
    $is_donator = isset($_POST['is_donator']) ? 1 : 0;

    $sql = "UPDATE tbluser SET 
                fname='$fname', 
                lname='$lname', 
                username='$username', 
                password='$hashedpw', 
                is_employee=$is_employee, 
                is_beneficiary=$is_beneficiary, 
                is_donator=$is_donator, 
                date_modified=NOW() 
            WHERE uid=$uid";

    if (mysqli_query($connection, $sql)) {
        echo "<script>alert('User updated successfully.'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Error updating user.');</script>";
    }
} else {
    $result = mysqli_query($connection, "SELECT * FROM tbluser WHERE uid = $uid");
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <style>
        body{
            font-family: 'Roboto', sans-serif;
        }

        .form-container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #f8f8f8;
            border: 1px solid #ccc;
            padding: 25px 40px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .form-container h2 {
            text-align: center;
            color: #2a2f6f;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        .checkbox-group {
            margin-top: 10px;
        }

        .checkbox-group label {
            display: inline-block;
            margin-right: 15px;
        }

        .form-container input[type="submit"] {
            background-color: #2a2f6f;
            color: white;
            border: none;
            padding: 10px 20px;
            font-weight: bold;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
        }

        .form-container input[type="submit"]:hover {
            background-color: #1e224c;
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
</head>
<body>

<div class="nav-container">
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="manage_users.php">Manage Users</a>
        <a href="reports.php">Reports</a>
        <a href="index.php">Logout</a>
    </nav>
</div>     

<div class="form-container">
    <h2>Update User Info</h2>
    <form method="post">
        <div class="form-group">
            <label for="fname">Firstname</label>
            <input type="text" name="fname" value="<?php echo $row['fname']; ?>" required>
        </div>

        <div class="form-group">
            <label for="lname">Lastname</label>
            <input type="text" name="lname" value="<?php echo $row['lname']; ?>" required>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" value="<?php echo $row['username']; ?>" required>
        </div>

        <div class="form-group">
            <label for="password">Password (enter new or retype existing)</label>
            <input type="password" name="password" required>
        </div>

        <div class="checkbox-group">
            <strong>User Type:</strong><br>
            <label><input type="checkbox" name="is_employee" <?php if ($row['is_employee']) echo "checked"; ?>> Employee</label>
            <label><input type="checkbox" name="is_beneficiary" <?php if ($row['is_beneficiary']) echo "checked"; ?>> Beneficiary</label>
            <label><input type="checkbox" name="is_donator" <?php if ($row['is_donator']) echo "checked"; ?>> Donator</label>
        </div>

        <input type="submit" value="Update">
    </form>
</div>

</body>
</html>

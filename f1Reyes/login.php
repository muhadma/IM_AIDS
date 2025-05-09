<?php    
    include 'connect.php';    
    require_once 'includes/header.php'; 
    session_start();
?>

<link rel="stylesheet" type="text/css" href="css/register.css">

<div class="nav-container">
    <nav>
        <a href="index.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="contact.php">Contact Us</a>
    </nav>
</div>

<div style="text-align: center;">
    <h2 style="color: #2a2f6f; font-size: 50px">Login</h2>
</div>  

<div class="registration-container">
    <form method="post" class="registration-form">
        <pre>
            Username: <input type="text" name="txtusername" required>
            Password: <input type="password" name="txtpassword" required>
            
            <input type="submit" name="btnLogin" value="Login"> 
        </pre>
    </form>
    <p style="font-size: 14px; color: #555;">Not yet registered? <a href="register.php">Register here</a>.</p>
</div>

<?php
if (isset($_POST['btnLogin'])) {
    $uname = mysqli_real_escape_string($connection, $_POST['txtusername']);
    $pword = $_POST['txtpassword'];

    $sql = "SELECT * FROM tbluser WHERE username = '$uname'";
    $result = mysqli_query($connection, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($pword, $row['password'])) {
            // Start session and store common data
            $_SESSION['uid'] = $row['uid'];
            $_SESSION['username'] = $row['username'];

            // Determine user role based on flags
            if ($row['is_employee']) {
                $_SESSION['usertype'] = 'employee';
                header("Location: home_employee.php");
            } elseif ($row['is_beneficiary']) {
                $_SESSION['usertype'] = 'beneficiary';
                header("Location: home_beneficiary.php");
            } elseif ($row['is_donator']) {
                $_SESSION['usertype'] = 'donator';
                header("Location: home_donator.php"); // same page as beneficiary if they share the interface
            } else {
                echo "<script>alert('User has no valid role assigned.');</script>";
            }
            exit();
        } else {
            echo "<script>alert('Invalid password.');</script>";
        }
    } else {
        echo "<script>alert('User not found.');</script>";
    }
}
?>

<?php require_once 'includes/footer.php'; ?>

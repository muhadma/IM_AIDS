<?php    
    include 'connect.php';    
    require_once 'includes/header.php'; 
?>

<link rel="stylesheet" type="text/css" href="css/register.css">

<div class="nav-container">
    <nav>
        <a href="index.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="contact.php">Contact Us</a>
    </nav>
</div>

<div style='background-color:#ffff00'>
    <center>
        <p style="color:white"><h2>User Registration Page</h2></p>
    </center>
</div>  

<div class="registration-container">
    <form method="post" class="registration-form">
        <pre>
            Firstname: <input type="text" name="txtfirstname" required>
            Lastname: <input type="text" name="txtlastname" required>            
            Gender:
            <select name="txtgender" required>
             <option value="">----</option>
             <option value="Male">Male</option>
             <option value="Female">Female</option>
            </select>
            User Type:
            <select name="txtusertype" required>
              <option value="">----</option>
              <option value="employee">Employee</option>
              <option value="beneficiary">Beneficiary</option>
              <option value="donator">Donator</option>
            </select>
            Username: <input type="text" name="txtusername" required>  
            Password: <input type="password" name="txtpassword" required>
            
            <div id="role-details" style="display:none;">
                <h3>Salary: </h3>
                <label for="employeeId">Salary: </label>
                <input type="text" name="salary">
            </div>
            
            <div id="beneficiary-details" style="display:none;">
                <h3>Address:</h3>
                <label for="beneficiaryCode">Address: </label>
                <input type="text" name="address">
            </div>

            <div id="donator-details" style="display:none;">
                <h3>Organization:</h3>
                <label for="donatorCode">Organization Name: </label>
                <input type="text" name="organization">
            </div>

            <input type="submit" name="btnRegister" value="Register"> 
        </pre>
    </form>
</div>

<script>
    // Show role-specific details based on user type selection
    document.querySelector('[name="txtusertype"]').addEventListener('change', function() {
        var role = this.value;
        document.getElementById('role-details').style.display = (role == 'employee') ? 'block' : 'none';
        document.getElementById('beneficiary-details').style.display = (role == 'beneficiary') ? 'block' : 'none';
        document.getElementById('donator-details').style.display = (role == 'donator') ? 'block' : 'none';
    });
</script>

<?php
if (isset($_POST['btnRegister'])) {
    // Retrieve form data and sanitize inputs
    $fname = mysqli_real_escape_string($connection, $_POST['txtfirstname']);
    $lname = mysqli_real_escape_string($connection, $_POST['txtlastname']);
    $gender = mysqli_real_escape_string($connection, $_POST['txtgender']);
    $utype = mysqli_real_escape_string($connection, $_POST['txtusertype']);
    $uname = mysqli_real_escape_string($connection, $_POST['txtusername']);
    $pword = mysqli_real_escape_string($connection, $_POST['txtpassword']);
    $hashedpw = password_hash($pword, PASSWORD_DEFAULT);

    // Optional fields depending on type
    $salary = isset($_POST['salary']) ? mysqli_real_escape_string($connection, $_POST['salary']) : null;
    $address = isset($_POST['address']) ? mysqli_real_escape_string($connection, $_POST['address']) : null;
    $organization = isset($_POST['organization']) ? mysqli_real_escape_string($connection, $_POST['organization']) : null;

    // Validate required fields
    if (empty($fname) || empty($lname) || empty($gender) || empty($utype) || empty($uname) || empty($pword)) {
        echo "<script>alert('Please fill in all the required fields.');</script>";
    } else {
        // Insert into tbluser
        $sql1 = "INSERT INTO tbluser (fname, lname, password, is_employee, is_beneficiary, is_donator, username, date_created, date_modified)
                 VALUES ('$fname', '$lname', '$hashedpw', 
                         '".($utype == 'employee' ? 1 : 0)."', 
                         '".($utype == 'beneficiary' ? 1 : 0)."', 
                         '".($utype == 'donator' ? 1 : 0)."', 
                         '$uname', NOW(), NOW())";

        if (mysqli_query($connection, $sql1)) {
            $last_id = mysqli_insert_id($connection);

            // Insert into role-specific table
            if ($utype == 'employee' && !empty($salary)) {
                $sql2 = "INSERT INTO tblemployee (salary, uid) VALUES ('$salary', '$last_id')";
                mysqli_query($connection, $sql2);
            } elseif ($utype == 'beneficiary' && !empty($address)) {
                $sql2 = "INSERT INTO tblbeneficiary (address, uid) VALUES ('$address', '$last_id')";
                mysqli_query($connection, $sql2);
            } elseif ($utype == 'donator' && !empty($organization)) {
                $sql2 = "INSERT INTO tbldonator (organization, uid) VALUES ('$organization', '$last_id')";
                mysqli_query($connection, $sql2);
            }

            echo "<script>alert('Registration successful.');</script>";
            header("Location: login.php");
            exit();
        } else {
            echo "<script>alert('Error: Could not register user.');</script>";
        }
    }
}
?>

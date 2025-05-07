<?php    
    include 'connect.php';
    include 'readrecords.php';   
    require_once 'includes/header.php'; 
?>

<link rel="stylesheet" type="text/css" href="css/dashboard.css">

<style>
    body{
        font-family: 'Roboto', sans-serif;
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

    .add-user-container {
        text-align: left;
        margin-top: 20px;
    }

    .add-user-btn {
        padding: 15px 30px;
        background-color: #28a745;
        color: white;
        font-size: 18px;
        border-radius: 8px;
        border: none;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .add-user-btn:hover {
        background-color: #218838;
        transform: translateY(-5px);
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

<div class="add-user-container">
    <a href="add_student.php" class="add-user-btn">Add User</a>
</div>

<br>
<div>        
    <table id="tblCustomerRecords" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%"> 
        <thead>
            <tr> 
                <th>ID Number</th> 
                <th>Firstname</th> 
                <th>Lastname</th>
                <th>Username</th>                     
                <th>Password</th>
                <th>Employee</th>
                <th>Beneficiary</th>
                <th>Donator</th>
                <th>Date Created</th>
                <th>Actions</th>
            </tr> 
        </thead>  
        <tbody>
            <?php while($row = $resultset->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['uid']; ?></td>
                <td><?php echo htmlspecialchars($row['fname']); ?></td>
                <td><?php echo htmlspecialchars($row['lname']); ?></td>
                <td><?php echo htmlspecialchars($row['username']); ?></td> 
                <td><?php echo htmlspecialchars($row['password']); ?></td>
                <td><?php echo $row['is_employee'] ? 'Yes' : 'No'; ?></td>
                <td><?php echo $row['is_beneficiary'] ? 'Yes' : 'No'; ?></td>
                <td><?php echo $row['is_donator'] ? 'Yes' : 'No'; ?></td>
                <td><?php echo htmlspecialchars($row['date_created']); ?></td>
                <td>
                    <button><a href="update.php?id=<?php echo $row['uid']; ?>">UPDATE</a></button>
                    <button><a href="delete.php?id=<?php echo $row['uid']; ?>" onclick="return confirm('Are you sure you want to delete this user?');">DELETE</a></button>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>         
    </table>
</div>

<?php require_once 'includes/footer.php'; ?>

<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

$connection = new mysqli('localhost', 'root', '', 'dbf1Reyes');

if (!$connection) {
    die("Connection failed: " . mysqli_error($connection));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $assistance_type = $_POST['assistance_type'];
    $urgency = $_POST['urgency'];
    $description = $_POST['description'];
    $uid = $_SESSION['uid']; 

    $donation_type = '';
    switch ($assistance_type) {
        case 'financial':
            $donation_type = 'Cash';
            break;
        case 'medical':
            $donation_type = 'Medicine';
            break;
        case 'food':
            $donation_type = 'Goods';
            break;
        case 'housing':
            $donation_type = 'Cash';
            break;
        case 'others':
            $donation_type = 'Cash';
            break;
    }

    $sql = "SELECT donator_id FROM tbldonator WHERE donation_type = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $donation_type);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $donator_id = $row['donator_id'];
            $insert_sql = "INSERT INTO tblrecieved (uid, donator_id) VALUES (?, ?)";
            $insert_stmt = $connection->prepare($insert_sql);
            $insert_stmt->bind_param("ii", $uid, $donator_id);
            $insert_stmt->execute();
        }

        echo "Request has been successfully submitted.";
    } else {
        echo "No donators found with the matching donation type.";
    }
}
?>

<link rel="stylesheet" href="css/register.css">
<style>
    .assist-container {
        max-width: 500px;
        margin: 50px auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        font-family: 'Segoe UI', sans-serif;
    }

    .assist-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #2a2f6f;
    }

    .assist-container form label {
        display: block;
        margin-top: 15px;
        font-weight: 500;
    }

    .assist-container input,
    .assist-container select,
    .assist-container textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 16px;
    }

    .assist-container button {
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

    .assist-container button:hover {
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
        <a href="donate.php">Make a Donation</a>
        <a href="profile.php">My Profile</a>
        <a href="index.php">Logout</a>
    </nav>
</div>

<div class="assist-container">
    <h2>Request Assistance</h2>
    <form method="post" action="#">
        <label for="assistance_type">Type of Assistance</label>
        <select id="assistance_type" name="assistance_type" required>
            <option value="">Select</option>
            <option value="financial">Financial Aid</option>
            <option value="medical">Medical Support</option>
            <option value="food">Food Supplies</option>
            <option value="housing">Temporary Housing</option>
            <option value="others">Others</option>
        </select>

        <label for="urgency">Urgency Level</label>
        <select id="urgency" name="urgency" required>
            <option value="">Select</option>
            <option value="low">Low</option>
            <option value="moderate">Moderate</option>
            <option value="high">High</option>
        </select>

        <label for="description">Describe Your Need</label>
        <textarea id="description" name="description" rows="4" placeholder="Explain your situation..." required></textarea>

        <button type="submit">Submit Request</button>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>

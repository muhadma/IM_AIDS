<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

require_once 'connect.php';
require_once 'includes/header.php';
$uid = $_SESSION['uid'];

// Fetch user data
$query = "SELECT username, is_beneficiary FROM tbluser WHERE uid = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $uid);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "<p>User not found.</p>";
    require_once 'includes/footer.php';
    exit();
}

$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission for updating profile
    $new_username = $_POST['username'];
    $new_address = $_POST['address'];
    
    // Update username and address
    $stmt_update = $connection->prepare("UPDATE tbluser SET username = ? WHERE uid = ?");
    $stmt_update->bind_param("si", $new_username, $uid);
    $stmt_update->execute();
    
    if ($user['is_beneficiary']) {
        $stmt_update_address = $connection->prepare("UPDATE tblbeneficiary SET address = ? WHERE uid = ?");
        $stmt_update_address->bind_param("si", $new_address, $uid);
        $stmt_update_address->execute();
    }

    echo "<p>Profile updated successfully!</p>";
    header("Location: profile.php");
    exit();
}

?>

<link rel="stylesheet" type="text/css" href="css/register.css">

<!-- Card Style for Profile Editing -->
<style>
    .main-content {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
    }

    .card {
        width: 100%;
        max-width: 600px;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .card form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .card label {
        font-weight: bold;
    }

    .card input,
    .card textarea {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 16px;
    }

    .card button {
        padding: 12px;
        background-color: #2a2f6f;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .card button:hover {
        background-color: #1f245a;
    }

    .cta-buttons {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .cta-buttons a {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .cta-buttons a:hover {
        background-color: #45a049;
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

<div class="main-content">
    <div class="card">
        <h2>Edit Profile</h2>
        <form method="POST">
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            </div>

            <div>
                <label for="address">Address:</label>
                <textarea name="address" id="address" required><?php
                    // Fetch address if beneficiary
                    if ($user['is_beneficiary']) {
                        $stmt_address = $connection->prepare("SELECT address FROM tblbeneficiary WHERE uid = ?");
                        $stmt_address->bind_param("i", $uid);
                        $stmt_address->execute();
                        $res_address = $stmt_address->get_result();
                        $address = $res_address->num_rows ? $res_address->fetch_assoc()['address'] : '';
                        echo htmlspecialchars($address);
                    } else {
                        echo "Not applicable";
                    }
                ?></textarea>
            </div>

            <div>
                <button type="submit" class="btn">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>

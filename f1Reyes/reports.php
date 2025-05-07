<?php
    include 'connect.php';
    include 'readrecords.php';   
    require_once 'includes/header.php'; 

    // Fetching the counts for beneficiaries, donators, and employees
    $beneficiary_count = $connection->query("SELECT COUNT(*) FROM tbluser WHERE is_beneficiary = 1")->fetch_row()[0];
    $donator_count = $connection->query("SELECT COUNT(*) FROM tbluser WHERE is_donator = 1")->fetch_row()[0];
    $employee_count = $connection->query("SELECT COUNT(*) FROM tbluser WHERE is_employee = 1")->fetch_row()[0];
?>

<link rel="stylesheet" type="text/css" href="css/reports.css">

<style>
    body {
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

    .chart-container {
        width: 80%;
        height: 400px;
        margin: 0 auto;
        padding-top: 30px;
    }

    .chart-container canvas {
        width: 100% !important;
        height: 100% !important;
    }

    .report-header {
        text-align: center;
        margin-top: 40px;
        font-size: 24px;
        font-weight: bold;
    }

    .report-subtitle {
        text-align: center;
        font-size: 16px;
        color: #555;
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

<div class="report-header">
    User Type Distribution Report
</div>

<div class="report-subtitle">
    This chart shows the distribution of beneficiaries, donators, and employees within the platform.
</div>

<div class="chart-container">
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Beneficiaries', 'Donators', 'Employees'],
            datasets: [{
                label: 'User Type Distribution',
                data: [
                    <?php echo $beneficiary_count; ?>, 
                    <?php echo $donator_count; ?>, 
                    <?php echo $employee_count; ?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',  // Red
                    'rgba(54, 162, 235, 0.7)',  // Blue
                    'rgba(255, 206, 86, 0.7)'   // Yellow
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                },
                title: {
                    display: true,
                    text: 'Distribution of User Types'
                }
            },
            maintainAspectRatio: false,
        }
    });
</script>

<?php require_once 'includes/footer.php'; ?>

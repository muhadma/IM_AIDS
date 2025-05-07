<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $uid = intval($_GET['id']);

    // First, delete from role-specific tables
    mysqli_query($connection, "DELETE FROM tblemployee WHERE uid = $uid");
    mysqli_query($connection, "DELETE FROM tblbeneficiary WHERE uid = $uid");
    mysqli_query($connection, "DELETE FROM tbldonator WHERE uid = $uid");

    // Then, delete from main tbluser
    $sql = "DELETE FROM tbluser WHERE uid = $uid";

    if (mysqli_query($connection, $sql)) {
        echo "<script>alert('User deleted successfully.'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Error deleting user.'); window.location.href='dashboard.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='dashboard.php';</script>";
}
?>

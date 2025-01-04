<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['type'] !== 'admin') {
    header('Location: ../view/login.html'); // Redirect to login if not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../asset/admin_style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Admin Dashboard</h1>
        <div class="button-container">
            <button onclick="window.location.href='pendingAdminAppointments.php'">Pending Appointments</button>
            <button onclick="window.location.href='adminDashboard.php'">Patient Information</button>
        </div>
    </div>
</body>
</html>

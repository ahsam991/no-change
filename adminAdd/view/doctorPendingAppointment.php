<?php
session_start();
require_once('../model/appointmentModel.php');

// Ensure the user is logged in as a doctor
if (!isset($_SESSION['type']) || $_SESSION['type'] !== 'doctor') {
    header('Location: login.php');
    exit;
}

// Fetch pending appointments
$currentDate = date('Y-m-d');
$appointments = fetchPendingAppointments($currentDate, $_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor - Pending Appointments</title>
    <link rel="stylesheet" href="../asset/doctorappointment.css">
</head>
<body>
    <h1>Pending Appointments</h1>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Appointment ID</th>
                <th>Patient Name</th>
                <th>Email</th>
                <th>Appointment Time</th>
                <th>Appointment Date</th>
                <th>Problem</th>
                <th>Token</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($appointments)): ?>
                <?php foreach ($appointments as $appointment): ?>
                    <tr>
                        <td><?= htmlspecialchars($appointment['appointment_id']); ?></td>
                        <td><?= htmlspecialchars($appointment['name']); ?></td>
                        <td><?= htmlspecialchars($appointment['email']); ?></td>
                        <td><?= htmlspecialchars($appointment['appointment_time']); ?></td>
                        <td><?= htmlspecialchars($appointment['appointment_date']); ?></td>
                        <td><?= htmlspecialchars($appointment['problem']); ?></td>
                        <td><?= htmlspecialchars($appointment['token']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" style="text-align: center;">No pending appointments</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <form method="POST" onsubmit="archiveAppointments(); return false;">
        <button type="submit">Archive Appointments</button>
    </form>

    <br>
    <a href="dashDoctor.php">Go Back</a>

    <script src="../asset/js/doctorAppointments.js"></script>
</body>
</html>

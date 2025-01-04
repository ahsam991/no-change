<?php
session_start();
require_once('../Model/pendingAppointmentModel.php');
$currentDate = date('Y-m-d');
$appointments = fetchAppointments($currentDate);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Appointments</title>
    <link rel="stylesheet" href="../asset/dasboard_style.css">
</head>
<body>
    <div class="container">
        <a class="back-button" href="dashAdmin.php">Back</a>
        <h1>Pending Appointments</h1>
        <form method="post" action="../controller/adminViewAppointments.php">
            <table>
                <thead>
                    <tr>
                        <th>Appointment ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Doctor ID</th>
                        <th>Doctor Name</th>
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
                                <td><?= $appointment['appointment_id']; ?></td>
                                <td><?= $appointment['name']; ?></td>
                                <td><?= $appointment['email']; ?></td>
                                <td><?= $appointment['doctor_id']; ?></td>
                                <td><?= $appointment['doctor_name']; ?></td>
                                <td><?= $appointment['appointment_time']; ?></td>
                                <td><?= $appointment['appointment_date']; ?></td>
                                <td><?= $appointment['problem']; ?></td>
                                <td><?= $appointment['token']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" class="no-data">No appointments found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>

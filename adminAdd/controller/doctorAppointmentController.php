<?php
session_start();
require_once('../model/appointmentModel.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'archive') {
        $currentDate = date('Y-m-d');
        $appointments = fetchPendingAppointments($currentDate, $_SESSION['email']);
        $result = archiveAppointments($appointments);

        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Appointments archived successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to archive appointments.']);
        }
        exit;
    }
}
?>

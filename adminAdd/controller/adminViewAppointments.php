<?php
session_start();
require_once('../Model/pendingAppointmentModel.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['archive'])) {
        // Fetch the appointments that are pending (before today's date)
        $appointments = fetchAppointments(date('Y-m-d'));
        $result = archiveAppointments($appointments);

        // Return JSON response
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Appointments archived successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error while archiving appointments.']);
        }
        exit;
    }
}
?>

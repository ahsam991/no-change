<?php
function getConnection() {
    $conn = mysqli_connect('localhost', 'root', '', 'web_project');
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }
    return $conn;
}

function fetchPendingAppointments($currentDate, $doctorEmail) {
    $conn = getConnection();

    // Get doctor ID based on email
    $doctorID = null;
    $sql = "SELECT id FROM doctor_info WHERE email = '$doctorEmail'";
    $result = mysqli_query($conn, $sql);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $doctorID = $row['id'];
    }

    // Fetch appointments for the doctor
    $appointments = [];
    if ($doctorID !== null) {
        $sql = "SELECT * FROM appointment_request WHERE doctor_id = '$doctorID' AND appointment_date >= '$currentDate'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $appointments[] = $row;
            }
        }
    }

    mysqli_close($conn);
    return $appointments;
}

function archiveAppointments($appointments) {
    $conn = getConnection();
    $success = true;

    foreach ($appointments as $appointment) {
        $sql = "INSERT INTO appointment_pending (appointment_id, name, email, doctor_id, appointment_time, appointment_date, problem, token)
                VALUES ('{$appointment['appointment_id']}', '{$appointment['name']}', '{$appointment['email']}', 
                        '{$appointment['doctor_id']}', '{$appointment['appointment_time']}', 
                        '{$appointment['appointment_date']}', '{$appointment['problem']}', '{$appointment['token']}')";

        if (!mysqli_query($conn, $sql)) {
            $success = false;
        }
    }

    mysqli_close($conn);
    return $success;
}
?>

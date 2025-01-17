<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['type'] !== 'doctor') {
    header('Location: ../view/login.html'); // Redirect to login if not logged in
    exit;  
}
     ?>
    
    <html>
    <head></head>

    <body>
        <h1> Doctor DASHBOARD</h1>
        <!-- <a href = "userProfileView.php">view profile</a>   -->
         <!-- <a href = "complaintForm.php">complaint</a>  -->
         <!-- <a href = "adminDashboard.php">view </a>  -->
 
         <a href = "doctorPendingAppointment.php">Pending Appointment</a>
         
 
          
    </body>
    
</html>
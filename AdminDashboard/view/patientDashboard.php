<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['type'] !== 'patient') {
    header('Location: ../view/login.html'); // Redirect to login if not logged in
    exit;  
}
     ?>
<!-- <!--     
    <html>
    <head></head>

    <body>
        <h1> Patient DASHBOARD</h1>
        <!-- <a href = "userProfileView.php">view profile</a>   -->
         <!-- <a href = "complaintForm.php">complaint</a>  -->
         <!-- <a href = "adminDashboard.php">view </a>  -->
         <!-- <a href = "payment.php">payment</a>  
         <a href = "article_main.html">Article</a>   -->

         
         
          
    <!-- </body>  -->
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="../asset/admin_style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Patient Dashboard</h1>
        <div class="button-container">
            <button onclick="window.location.href='payment.php'">Click to Pay</button>
            <button onclick="window.location.href='article_main.html'">Show Article</button>
        </div>
    </div>
</body>
</html>
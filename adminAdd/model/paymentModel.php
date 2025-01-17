<?php
// Function to establish a connection to the database
function getConnection() {
    $conn = mysqli_connect('localhost', 'root', '', 'web_project');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

// Insert payment details into the database
function insertPayment($payment_data) {
    $conn = getConnection();

    // Escape user inputs to prevent SQL injection
    $payment_method = mysqli_real_escape_string($conn, $payment_data['payment_method']);
    $name = mysqli_real_escape_string($conn, $payment_data['name']);
    $email = mysqli_real_escape_string($conn, $payment_data['email']);
    $cardholder_name = mysqli_real_escape_string($conn, $payment_data['cardholder_name']);
    $card_number = mysqli_real_escape_string($conn, $payment_data['card_number']);
    $expiry_month = mysqli_real_escape_string($conn, $payment_data['expiry_month']);
    $expiry_year = mysqli_real_escape_string($conn, $payment_data['expiry_year']);
    $cvv = mysqli_real_escape_string($conn, $payment_data['cvv']);

    // Prepare the SQL query
    $sql = "INSERT INTO payment (user_email, payment_method, name, cardholder_name, card_number, expiry_month, expiry_year, cvv)
            VALUES ('$email', '$payment_method', '$name', '$cardholder_name', '$card_number', '$expiry_month', '$expiry_year', '$cvv')";

    // Execute the query and check if it was successful
    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);

    // Return true if insert was successful, otherwise false
    return $result;
}
?>

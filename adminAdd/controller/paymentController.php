<?php
session_start();
require_once '../model/paymentModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get POST data
    $payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $cardholder_name = isset($_POST['cardholder_name']) ? $_POST['cardholder_name'] : '';
    $card_number = isset($_POST['card_number']) ? $_POST['card_number'] : '';
    $expiry_month = isset($_POST['expiry_month']) ? $_POST['expiry_month'] : '';
    $expiry_year = isset($_POST['expiry_year']) ? $_POST['expiry_year'] : '';
    $cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';

    // Validate inputs
    if (empty($name) || empty($cardholder_name) || empty($card_number) || empty($expiry_month) || empty($expiry_year) || empty($cvv)) {
        // Return JSON response for missing fields
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
        exit;
    }

    if (!is_numeric($card_number) || strlen($card_number) != 16) {
        // Return JSON response for invalid card number
        echo json_encode(["status" => "error", "message" => "Card number must be exactly 16 digits."]);
        exit;
    }

    if (!is_numeric($cvv) || strlen($cvv) != 3) {
        // Return JSON response for invalid CVV
        echo json_encode(["status" => "error", "message" => "CVC/CVV must be exactly 3 digits."]);
        exit;
    }

    // Prepare payment data for model
    $payment_data = [
        'payment_method' => $payment_method,
        'name' => $name,
        'email' => $email,
        'cardholder_name' => $cardholder_name,
        'card_number' => $card_number,
        'expiry_month' => $expiry_month,
        'expiry_year' => $expiry_year,
        'cvv' => $cvv
    ];

    // Save to database through model
    $result = insertPayment($payment_data);

    // Return success or error in JSON format
    if ($result) {
        echo json_encode(["status" => "success", "message" => "Payment successful!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error while processing payment."]);
    }
}
?>

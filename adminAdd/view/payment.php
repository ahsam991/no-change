<?php
session_start();
require_once '../model/paymentModel.php';

$user_email = '';
if (isset($_SESSION['email'])) {
    $user_email = $_SESSION['email'];
} else {
    $conn = getConnection();
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT email FROM user_info WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $user_email = $row['email'];
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <!-- <link rel="stylesheet" href="../asset/style_payment.css"> -->
    <script src="../asset/js/paymentValidation.js"></script>
</head>
<body>
    <div class="container">
        <form action="../controller/paymentController.php" method="POST" onsubmit="return validateForm();">
            <h1>Select Your Payment Method</h1>
            <div>
                <label>
                    <input type="radio" name="payment_method" value="paypal" required />
                    Mobile Banking
                </label>
                <label>
                    <input type="radio" name="payment_method" value="card" required />
                    Debit/Credit Card
                </label>
            </div>
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required />
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user_email); ?>" readonly required />
            </div>
            <div>
                <label for="cardholder_name">Name on Card</label>
                <input type="text" id="cardholder_name" name="cardholder_name" required />
            </div>
            <div>
                <label for="card_number">Card Number</label>
                <input type="text" id="card_number" name="card_number" maxlength="16" required />
            </div>
            <div>
                <label>Expiry</label>
                <select name="expiry_month" required>
                    <option value="">MM</option>
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                <span>/</span>
                <select name="expiry_year" required>
                    <option value="">YYYY</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                </select>
            </div>
            <div>
                <label for="cvv">CVC/CVV</label>
                <input type="text" id="cvv" name="cvv" maxlength="3" required />
            </div>
            <button type="submit">Confirm and Pay</button>
        </form>
    </div>
</body>
</html>

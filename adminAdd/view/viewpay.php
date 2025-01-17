<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Payment Page</title>
    <link rel="stylesheet" href="../asset/pay.css">
</head>
<body>
    <div class="container">
        <form action="../controller/paymentController.php" method="POST" onsubmit="return validateForm();">

            <div class="row">
                <!-- Billing Address Section -->
                <div class="col">
                    <h3 class="title">Billing Address</h3>

                    <div class="inputBox">
                        <label for="name">Full Name:</label>
                        <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                    </div>

                    <div class="inputBox">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <!-- <div class="inputBox">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" placeholder="Enter your address" required>
                    </div> -->
<!-- 
                    <div class="inputBox">
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" placeholder="Enter your city" required>
                    </div> -->

                    <div class="flex">
                        <div class="inputBox">
                            <label for="state">State:</label>
                            <input type="text" id="state" name="state" placeholder="Enter your state" required>
                        </div>

                        <div class="inputBox">
                            <label for="zip">Zip Code:</label>
                            <input type="number" id="zip" name="zip" placeholder="123456" required>
                        </div>
                    </div>
                </div>

                <!-- Payment Section -->
                <div class="col">
                    <h3 class="title">Payment</h3>

                    <div class="inputBox">
                        <label>Card Accepted:</label>
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20240715140014/Online-Payment-Project.webp" alt="Accepted Cards">
                    </div>

                    <div class="inputBox">
                        <label for="cardholder_name">Name on Card:</label>
                        <input type="text" id="cardholder_name" name="cardholder_name" placeholder="Enter card name" required>
                    </div>

                    <div class="inputBox">
                        <label for="card_number">Card Number:</label>
                        <input type="text" id="card_number" name="card_number" placeholder="1111-2222-3333-4444" maxlength="16" required>
                    </div>

                    <div class="inputBox">
                        <label for="expiry_month">Exp Month:</label>
                        <select name="expiry_month" id="expiry_month" required>
                            <option value="">Choose Month</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <label for="expiry_year">Exp Year:</label>
                            <select name="expiry_year" id="expiry_year" required>
                                <option value="">Choose Year</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                            </select>
                        </div>

                        <div class="inputBox">
                            <label for="cvv">CVV:</label>
                            <input type="text" id="cvv" name="cvv" placeholder="123" maxlength="3" required>
                        </div>
                    </div>

                    <div class="inputBox">
                        <label for="payment_method">Payment Method:</label>
                        <select name="payment_method" id="payment_method" required>
                            <option value="">Select Method</option>
                            <option value="paypal">Mobile Banking</option>
                            <option value="card">Debit/Credit Card</option>
                        </select>
                    </div>
                </div>
            </div>

            <input type="submit" value="Proceed to Checkout" class="submit_btn">
        </form>
    </div>
</body>
</html>

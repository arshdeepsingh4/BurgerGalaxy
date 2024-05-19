<?php
// Include the database connection file
include 'db_connection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data and generate receipt
    $name = $_POST['name'];
    $TomotoBurgerQuantity = isset($_POST['TomotoBurgerQuantity']) ? $_POST['TomotoBurgerQuantity'] : 0;
    $OnionBurgerQuantity = isset($_POST['OnionBurgerQuantity']) ? $_POST['OnionBurgerQuantity'] : 0;
    $CheeseBurgerQuantity = isset($_POST['CheeseBurgerQuantity']) ? $_POST['CheeseBurgerQuantity'] : 0;
    $province = $_POST['province'];
    $credit_card_number = $_POST['credit-card']; // Assuming credit card number is submitted via POST
    $expiry_month = $_POST['expiry-month'];
    $expiry_year = $_POST['expiry-year'];

    // Calculate total price based on item quantities
    $TomotoPrice = 5;
    $OnionPrice = 7;
    $CheesePrice = 9;
    $total_price = ($TomotoBurgerQuantity * $TomotoPrice) + ($OnionBurgerQuantity * $OnionPrice) + ($CheeseBurgerQuantity * $CheesePrice);

    // Define province tax rates
    $tax_rates = array(
        "AB" => 0.05, // Alberta
        "BC" => 0.07, // British Columbia
        "MB" => 0.08, // Manitoba
        "NB" => 0.1,  // New Brunswick
        "NL" => 0.1,  // Newfoundland and Labrador
        "NS" => 0.1,  // Nova Scotia
        "ON" => 0.13, // Ontario
        "PE" => 0.1,  // Prince Edward Island
        "QC" => 0.1,  // Quebec
        "SK" => 0.06, // Saskatchewan
        "NT" => 0.05, // Northwest Territories
        "NU" => 0.05, // Nunavut
        "YT" => 0.05  // Yukon
    );

    // Calculate tax amount based on province
    $tax_rate = isset($tax_rates[$province]) ? $tax_rates[$province] : 0;
    $tax_amount = $total_price * $tax_rate;

    // Calculate total price with tax
    $total_price_with_tax = $total_price + $tax_amount;

    // Insert receipt data into the database, including credit card details
    $sql = "INSERT INTO orders (name, TomotoBurgerQuantity, OnionBurgerQuantity, CheeseBurgerQuantity, total_price, province, tax_amount, total_price_with_tax, credit_card_number, expiry_month, expiry_year)
            VALUES ('$name', '$TomotoBurgerQuantity', '$OnionBurgerQuantity', '$CheeseBurgerQuantity', '$total_price', '$province', '$tax_amount', '$total_price_with_tax', '$credit_card_number', '$expiry_month', '$expiry_year')";

    if ($conn->query($sql) === TRUE) {
        
        $html = "<h2>Order Details</h2>";
        $html .= "<p>Name: $name</p>";
        $html .= "<p>Tomoto Quantity: $TomotoBurgerQuantity</p>";
        $html .= "<p>Onion Quantity: $OnionBurgerQuantity</p>";
        $html .= "<p>Cheese Quantity: $CheeseBurgerQuantity</p>";
        $html .= "<p>Total Price: $$total_price</p>";
        $html .= "<p>Province: $province</p>";
        $html .= "<p>Tax Amount: $$tax_amount</p>";
        $html .= "<p>Total Price with Tax: $$total_price_with_tax</p>";
        $html .= "<p>Credit Card Number: $credit_card_number</p>";
        $html .= "<p>Expiry Month: $expiry_month</p>";
        $html .= "<p>Expiry Year: $expiry_year</p>";
        
        echo $html;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
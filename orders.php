<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
$sql = "SELECT role FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    $role = $user['role'];

    if ($role !== "admin" && $role !== "shop_manager") {
        header("Location: login.php");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}

// Welcome message based on role
$welcome_message = "";
if ($role === "admin") {
    $welcome_message = "Welcome Admin";
} elseif ($role === "shop_manager") {
    $welcome_message = "Welcome Manager";
}

$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $orders = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $orders = [];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online-Burger</title>
    <link rel="stylesheet" type="text/css" href="Css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <nav>
        <div class="logo">BurgerGalaxy</div>
        <div class="menu">
            <a href="index.php">Shopping form page</a>
            <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] === "admin") {
                echo '<a href="shopmanager.php">Add Manager</a>';
            }
            ?>
            <a href="logout.php">Logout</a>
        </div>
    </nav>
    <div class="order-container">
        <h2><?php echo $welcome_message; ?></h2> <!-- Display welcome message here -->
        <h3>Orders</h3>
        <?php if (!empty($orders)): ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>OnionBurger</th>
                    <th>TomotoBurger</th>
                    <th>CheeseBurger</th>
                    <th>Total Price</th>
                    <th>Province</th>
                    <th>Tax Amount</th>
                    <th>Total Price with Tax</th>
                </tr>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo $order['name']; ?></td>
                        <td><?php echo $order['OnionBurgerQuantity']; ?></td>
                        <td><?php echo $order['TomotoBurgerQuantity']; ?></td>
                        <td><?php echo $order['CheeseBurgerQuantity']; ?></td>
                        <td><?php echo $order['total_price']; ?></td>
                        <td><?php echo $order['province']; ?></td>
                        <td><?php echo $order['tax_amount']; ?></td>
                        <td><?php echo $order['total_price_with_tax']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No orders found.</p>
        <?php endif; ?>
    </div>

    <footer id="footer">
        <h2>Developed by Arshdeep</h2>
        <img src="images/icon.png" alt="Footer Icon">
    </footer>

</body>

</html>
<?php
// Start session and include database connection

session_start();
include 'db_connection.php';
// Check if the form is submitted

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Check if username and password are not empty
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);

        $sqlQuery = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
        $sqlResult = $conn->query($sqlQuery);

        if ($sqlResult->num_rows > 0) {
            while ($row = $sqlResult->fetch_assoc()) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];
                break;
            }
// Redirect based on user role
            if ($_SESSION['role'] === 'shop_manager') {
                header('Location: orders.php');
                exit;
            } elseif ($_SESSION['role'] === 'admin') {
                header('Location: orders.php');
                exit;
            }
        } else {
            $error = "Invalid username or password";
        }
    } else {
        $error = "Please enter both username and password";
    }
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
           
        </div>
    </nav>

    <div class="login-container">
        <h2>Login</h2>
        <br>
        <?php if (isset($error)) {
            echo "<p>$error</p>";
        } ?>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Login">
        </form>
    </div>
    <footer id="footer">
        <h2>Developed by Arshdeep</h2>
        <img src="images/icon.png" alt="Footer Icon">
    </footer>

</body>

</html>
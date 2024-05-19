<?php
session_start();
include 'db_connection.php';

// Check if user is logged in as admin

if (!isset($_SESSION['username']) || $_SESSION['role'] !== "admin") {
    header("Location: login.php");
    exit;
}

$message = $error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Check if username or password is empty
    if (empty($username) || empty($password)) {
        $error = "Please enter both username and password.";
    } else {
         // Check if username already exists
        $check_query = "SELECT * FROM users WHERE username = '$username'";
        $check_result = $conn->query($check_query);
        if ($check_result->num_rows > 0) {
            $error = "Username already exists. Please choose a different username.";
        } else {
       // If username doesn't exist, insert into database as shop manager
            $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'shop_manager')";
            if ($conn->query($sql) === TRUE) {
                $message = "Shop manager user created successfully";
            } else {
                $error = "Error creating shop manager user: " . $conn->error;
            }
        }
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
            <a href="Index.php">Shopping form page</a>
            <a href="orders.php">Orders</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="login-container">
        <br>
        <h2>Create Shop Manager</h2>
        <br>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label>Username:</label>
            <input type="text" name="username" required><br>
            <label>Password:</label>
            <input type="password" name="password" required><br>
            <input type="submit" value="Create">
        </form>
        <?php if (!empty($error))
            echo '<p class="error">' . $error . '</p>'; ?>
        <?php if (!empty($message))
            echo '<p class="success">' . $message . '</p>'; ?>
        <br>

    </div>
    <footer id="footer">
        <h2>Developed by Arshdeep</h2>
        <img src="images/icon.png" alt="Footer Icon">
    </footer>
</body>

</html>
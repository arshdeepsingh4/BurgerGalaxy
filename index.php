<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online-Burger</title>
    <link rel="stylesheet" type="text/css" href="Css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Css/style.css" />
</head>

<body>
    <header id="home">
        <nav>
            <div class="logo">BurgerGalaxy</div>
            <div class="menu">
                <a href="orders.php">Orders</a>
                <a href="login.php">Login</a>

            </div>
        </nav>

        <div class="container">
            <div class="left">
                <img src="images\mainimage.jpg" alt="Main Burger Image">
            </div>

            <div class="right">
                <h1>Best Offers</h1>
                <p>
                    Taste the difference with our burgers - where simplicity meets satisfaction in every delicious bite.
                </p>
                <p>
                    10% Discount!!!
                </p>

                <img src="images/icon.png" alt="Burger Icon">
            </div>
        </div>
    </header>

    <form id="form" method="post" action="ajax.php" onsubmit="return submitForm();">

        <h1>Featured</h1>
        <br>
        <div class="main-row">
            <div class="main-box">
                <img src="images/image1.jpg" alt="Tomoto Burger">
                <br>
                <h2>Tomoto Burger<br>$5</h2>
                <select name="TomotoBurgerQuantity">
                    <?php
                    for ($i = 0; $i <= 5; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="main-box">
                <img src="images/image2.jpg" alt="OnionBurger Image">
                <br>
                <h2>OnionBurger<br>$7</h2>
                <select name="OnionBurgerQuantity">
                    <?php
                    for ($i = 0; $i <= 5; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="main-box">
                <img src="images/image3.jpg" alt="Cheese Burger Image">
                <br>
                <h2>Cheese Burger<br>$9</h2>
                <select name="CheeseBurgerQuantity">
                    <?php
                    for ($i = 0; $i <= 5; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <br>
        <br>
        <h1>Order Form</h1>
        <br>
        <br>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" placeholder="xxx-xxx-xxxx" required>
        </div>
        <div class="form-group">
            <label for="postcode">Postcode:</label>
            <input type="text" id="postcode" name="postcode" placeholder="XXX XXX" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>
        </div>
        <div class="form-group">
            <label for="province">Province:</label>
            <select id="province" name="province" required>
                <option value="" disabled selected>Select Province</option>
                <option value="AB">Alberta</option>
                <option value="BC">British Columbia</option>
                <option value="MB">Manitoba</option>
                <option value="NB">New Brunswick</option>
                <option value="NL">Newfoundland and Labrador</option>
                <option value="NS">Nova Scotia</option>
                <option value="ON">Ontario</option>
                <option value="PE">Prince Edward Island</option>
                <option value="QC">Quebec</option>
                <option value="SK">Saskatchewan</option>
                <option value="NT">Northwest Territories</option>
                <option value="NU">Nunavut</option>
                <option value="YT">Yukon</option>
            </select>
        </div>
        <div class="form-group">
            <label for="credit-card">Credit Card:</label>
            <input type="text" id="credit-card" name="credit-card" placeholder="xxxx-xxxx-xxxx-xxxx" required>
        </div>
        <div class="form-group">
            <label for="expiry-month">Credit Card Expiry Month:</label>
            <input type="text" id="expiry-month" name="expiry-month" placeholder="JAN" required>
        </div>
        <div class="form-group">
            <label for="expiry-year">Credit Card Expiry Year:</label>
            <input type="text" id="expiry-year" name="expiry-year" placeholder="2026" required>
        </div>
        <input type="submit" name="submit" value="Submit">
    </form>

    <div id="receipt"></div>

    <footer id="footer">
        <h2>Developed by Arshdeep</h2>
        <img src="images/icon.png" alt="Footer Icon">
    </footer>



    <script>
        function submitForm() {
            $.ajax({
                type: 'POST',
                url: 'ajax.php',
                data: $('#form').serialize(),
                success: function (response) {
                    $('#receipt').html(response);
                }
            });
            return false; // Prevent the default form submission
        }
    </script>

</body>

</html>
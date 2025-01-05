<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mr. Lowat Bakery</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <script src="script.js"></script> <!-- Link to your JavaScript file -->
</head>
<body>
    <header>
        <div class="logo">
            <h1><a href="index.php">Mr. Lowat Bakery</a></h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="cart.php">Cart</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="orderhistory.php">Order History</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <div class="contact-info">
            <p>Phone: 016-402-5451</p>
            <p><a href="#">WhatsApp</a></p>
        </div>
    </header>
    <main>

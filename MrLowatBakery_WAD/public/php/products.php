<?php
include_once 'connection.php'; // Database connection

// Fetch products from database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $products = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $products = [];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Mr. Lowat Bakery</title>
  <link rel="stylesheet" href="../assets/style/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <header>
    <nav>
        <h1>Mr. Lowat Bakery</h1>
        <div class="nav-links">
          <ul>
            <li><a href="../pages/index.html"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="#"><i class="fas fa-cake"></i>Menu</a></li>
            <li><a href="https://api.whatsapp.com/send/?phone=60164025451"><i class="fas fa-phone"></i>Contact</a></li>
            <li><a href="../pages/register.html"><i class="fas fa-user"></i>Register</a></li>
          </ul>
        </div>
    </nav>
  </header>

    <main>
        <h1>Bakery Products</h1>
        <div class="products">
            <?php foreach ($products as $product): ?>
                <div class="product-item">
                    <h2><?php echo $product['name']; ?></h2>
                    <p><?php echo $product['description']; ?></p>
                    <p>Price: RM <?php echo $product['price']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

  <footer>
    <p>&copy; 2024 Mr. Lowat Bakery. All rights reserved.</p>
  </footer>

  <script src="../assets/js/scripts.js"></script>
</body>
</html>



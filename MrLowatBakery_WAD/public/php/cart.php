<?php
session_start();
include 'connection.php'; // Include database connection

include 'header.php'; // Include header HTML

if (empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty.</p>";
} else {
    echo "<h2>Your Cart</h2>";
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $query = "SELECT * FROM products WHERE product_id = $product_id";
        $result = mysqli_query($conn, $query);
        if ($product = mysqli_fetch_assoc($result)) {
            echo "<div class='cart-item'>";
            echo "<h3>" . htmlspecialchars($product['name']) . "</h3>";
            echo "<p>Quantity: " . htmlspecialchars($quantity) . "</p>";
            echo "<p>Price: RM " . number_format($product['price'] * $quantity, 2) . "</p>";
            echo "</div>";
        }
    }
}

include 'footer.php'; // Include footer HTML
?>

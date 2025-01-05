<?php
session_start();
include 'connection.php'; // Include database connection

$user_id = $_SESSION['user_id']; // Assuming user ID is stored in session

$query = "SELECT * FROM orders WHERE user_id = $user_id ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

include 'header.php'; // Include header HTML

echo "<h2>Your Order History</h2>";
while ($order = mysqli_fetch_assoc($result)) {
    echo "<div class='order'>";
    echo "<p>Order ID: " . htmlspecialchars($order['order_id']) . "</p>";
    echo "<p>Delivery Method: " . htmlspecialchars($order['delivery_method']) . "</p>";
    echo "<p>Total Price: RM " . number_format($order['total_price'], 2) . "</p>";
    echo "<p>Status: " . htmlspecialchars($order['order_status']) . "</p>";
    echo "<p>Date: " . htmlspecialchars($order['created_at']) . "</p>";
    echo "</div>";
}

include 'footer.php'; // Include footer HTML
?>

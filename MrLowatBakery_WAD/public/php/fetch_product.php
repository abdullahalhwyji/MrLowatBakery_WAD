<?php
include_once 'connection.php'; // Database connection

// Fetch all product details from database
$query = "SELECT * FROM products";
$result = $conn->query($query);

$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($products);
?>
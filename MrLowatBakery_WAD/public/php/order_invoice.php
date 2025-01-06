<?php
// Include database connection
include('connection.php');

$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true); 

$order_id = $data['order_id'];

// Fetch transaction data from the database
$sql = "SELECT p.name, oi.quantity, oi.price, o.order_status, u.address, u.name AS username, u.tel FROM orders o 
            JOIN order_items oi ON oi.order_id = o.order_id
            JOIN products p ON p.product_id = oi.product_id
            JOIN users u ON u.user_id = o.user_id
            WHERE o.order_id = $order_id";
$result = $conn->query($sql);

$transactions = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $transactions[] = $row;
    }
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($transactions);
?>

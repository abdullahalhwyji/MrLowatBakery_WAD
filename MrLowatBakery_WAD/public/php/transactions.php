<?php
// Include database connection
include('connection.php');

// Fetch transaction data from the database
$sql = "SELECT t.transaction_id, 
            t.order_id, 
            t.payment_method, 
            t.payment_status, 
            t.transaction_date, 
            o.delivery_method,
            o.total_price, 
            o.order_status
            FROM transactions t 
            JOIN orders o ON t.order_id = o.order_id";
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

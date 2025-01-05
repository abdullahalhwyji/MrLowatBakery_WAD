<?php
// Include database connection
include('connection.php');

// Fetch transaction data from the database
$sql = "SELECT * FROM transactions";
$result = $conn->query($sql);

$transactions = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $transactions[] = $row;
    }
} else {
    // Fallback to dummy data if no database records
    $transactions = [
        [
            "id" => 1,
            "transaction_id" => "TRX001",
            "payment_method" => "Debit Card",
            "status" => "Pending",
            "date" => "2024-12-30",
            "amount" => 20.00,
        ],
        [
            "id" => 2,
            "transaction_id" => "TRX002",
            "payment_method" => "E-Wallet",
            "status" => "Shipped",
            "date" => "2024-12-28",
            "amount" => 15.50,
        ],
    ];
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($transactions);
?>

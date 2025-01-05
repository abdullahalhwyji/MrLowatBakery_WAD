<?php
require('fpdf186/fpdf.php');

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Debugging: Check the POST data
    var_dump($_POST);
    exit;

    $receiptType = $_POST['receipt_type'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];

    // Example data - this would typically come from a database
    $transactions = [
        ['2025-01-01', '1001', 'Debit Card', 'success', '100.00 MYR'],
        ['2025-01-02', '1002', 'E-Wallet', 'failure', '50.00 MYR'],
        ['2025-01-03', '1003', 'QR Pay', 'success', '75.00 MYR'],
        ['2025-01-04', '1004', 'Debit Card', 'pending', '120.00 MYR'],
        ['2025-01-05', '1005', 'E Wallet', 'success', '45.00 MYR'],
        ['2025-01-06', '1006', 'QR Pay', 'failure', '30.00 MYR'],
        ['2025-01-07', '1007', 'Debit Card', 'success', '150.00 MYR'],
        ['2025-01-08', '1008', 'E-Wallet', 'pending', '60.00 MYR'],
        ['2025-01-09', '1009', 'QR Pay', 'success', '90.00 MYR'],
        ['2025-01-10', '1010', 'Debit Card', 'failure', '80.00 MYR'],
        ['2025-01-11', '1011', 'Debit Card', 'success', '200.00 MYR'],
        ['2025-01-12', '1012', 'E-Wallet', 'success', '110.00 MYR'],
        ['2025-01-13', '1013', 'QR Pay', 'pending', '95.00 MYR'],
        ['2025-01-14', '1014', 'Debit Card', 'failure', '150.00 MYR'],
        ['2025-01-15', '1015', 'E-Wallet', 'success', '130.00 MYR'],
        ['2025-01-16', '1016', 'QR Pay', 'success', '70.00 MYR'],
        ['2025-01-17', '1017', 'Debit Card', 'pending', '180.00 MYR'],
        ['2025-01-18', '1018', 'E Wallet', 'failure', '60.00 MYR'],
        ['2025-01-19', '1019', 'QR Pay', 'success', '220.00 MYR'],
        ['2025-01-20', '1020', 'Debit Card', 'success', '160.00 MYR']
    ];

    // Filter transactions based on date range
    $filteredTransactions = array_filter($transactions, function($transaction) use ($startDate, $endDate) {
        $transactionDate = $transaction[0];
        return $transactionDate >= $startDate && $transactionDate <= $endDate;
    });

    if (empty($filteredTransactions)) {
        echo "No transactions found for the selected date range.";
        exit;
    }

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);

    // Header
    $pdf->Cell(190, 10, 'Transaction Report', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(190, 10, "From: $startDate To: $endDate", 0, 1, 'C');
    $pdf->Ln(10);

    // Table Header
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, 'Date', 1);
    $pdf->Cell(50, 10, 'Invoice No', 1);
    $pdf->Cell(50, 10, 'Type', 1);
    $pdf->Cell(25, 10, 'Status', 1);
    $pdf->Cell(25, 10, 'Amount', 1);
    $pdf->Ln();

    // Table Data
    $pdf->SetFont('Arial', '', 12);
    foreach ($filteredTransactions as $transaction) {
        $pdf->Cell(40, 10, $transaction[0], 1);
        $pdf->Cell(50, 10, $transaction[1], 1);
        $pdf->Cell(50, 10, $transaction[2], 1);
        $pdf->Cell(25, 10, $transaction[3], 1);
        $pdf->Cell(25, 10, $transaction[4], 1);
        $pdf->Ln();
    }

    $pdf->Output('D', 'Transaction_Report.pdf');
    exit;
}
?>

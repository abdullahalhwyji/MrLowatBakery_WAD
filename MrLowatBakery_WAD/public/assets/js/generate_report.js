document.addEventListener("DOMContentLoaded", function() {
    // Sample data - this should ideally be generated dynamically from your database
    const transactions = [
        { id: 1, payment_method: "Debit card", status: "success", amount: 100 },
        { id: 2, payment_method: "E wallet", status: "failure", amount: 50 },
        { id: 3, payment_method: "QR Pay", status: "success", amount: 75 },
        { id: 4, payment_method: "Debit Card", status: "pending", amount: 120 },
        { id: 5, payment_method: "E Wallet", status: "success", amount: 45 },
        { id: 6, payment_method: "QR Pay", status: "failure", amount: 30 },
        { id: 7, payment_method: "Debit Card", status: "success", amount: 150 },
        { id: 8, payment_method: "E Wallet", status: "pending", amount: 60 },
        { id: 9, payment_method: "QR Pay", status: "success", amount: 90 },
        { id: 10, payment_method: "Debit Card", status: "failure", amount: 80 },
    ];

    // Extract data for the chart
    const paymentMethods = ['Debit Card', 'E Wallet', 'QR Pay'];
    const successCount = [0, 0, 0];
    const failureCount = [0, 0, 0];

    transactions.forEach(transaction => {
        const methodIndex = paymentMethods.indexOf(transaction.payment_method);
        if (methodIndex !== -1) {
            if (transaction.status === 'success') {
                successCount[methodIndex] += transaction.amount;
            } else if (transaction.status === 'failure') {
                failureCount[methodIndex] += transaction.amount;
            }
        }
    });

    // Set up the chart data
    const ctx = document.getElementById("transactionChart").getContext("2d");
    const transactionChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: paymentMethods,
            datasets: [
                {
                    label: 'Success Amount (MYR)',
                    data: successCount,
                    backgroundColor: 'rgba(0, 255, 0, 0.6)', // Green for success
                    borderColor: 'rgba(0, 255, 0, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Failure Amount (MYR)',
                    data: failureCount,
                    backgroundColor: 'rgba(255, 0, 0, 0.6)', // Red for failure
                    borderColor: 'rgba(255, 0, 0, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Amount (MYR)'
                    }
                }
            }
        }
    });
});

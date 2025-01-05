document.addEventListener("DOMContentLoaded", () => {
    const generateInvoiceBtn = document.getElementById("generate-invoice-btn");
    const invoiceModal = document.getElementById("invoice-modal");
    const invoiceBody = document.getElementById("invoice-body");
    const closeModal = document.querySelector(".close");

    // Dummy Transactions
    const dummyTransactions = [
        {
            transaction_id: "TRX001",
            description: "Chocolate Cake",
            qty: 1,
            unit_price: 20.0,
            date: "2024-12-30",
        },
        {
            transaction_id: "TRX002",
            description: "Vanilla Cupcake",
            qty: 1,
            unit_price: 15.5,
            date: "2024-12-28",
        },
    ];

    // Populate Invoice Modal
    function populateInvoice() {
        invoiceBody.innerHTML = "";

        if (dummyTransactions.length === 0) {
            invoiceBody.innerHTML = `
                <tr>
                    <td colspan="5" style="text-align: center;">No data yet</td>
                </tr>`;
        } else {
            dummyTransactions.forEach((transaction, index) => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${transaction.description}</td>
                    <td>${transaction.date}</td>
                    <td>${transaction.qty}</td>
                    <td>${transaction.unit_price.toFixed(2)}</td>
                `;
                invoiceBody.appendChild(row);
            });
        }

        invoiceModal.style.display = "block";
    }

    // Close Modal
    closeModal.addEventListener("click", () => {
        invoiceModal.style.display = "none";
    });

    // Generate Invoice Button Click
    generateInvoiceBtn.addEventListener("click", populateInvoice);
});

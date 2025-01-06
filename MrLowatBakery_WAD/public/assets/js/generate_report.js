document.addEventListener("DOMContentLoaded", () => {
    const generateInvoiceBtn = document.getElementById("generate-invoice-btn");
    const invoiceModal = document.getElementById("invoice-modal");
    const invoiceBody = document.getElementById("invoice-body");
    const invoiceTotal = document.getElementById("invoice-total");
    const invoiceDate = document.getElementById("invoice-date");
    const transactionBody = document.getElementById("transaction-body");
    const closeModal = document.querySelector(".close");

    // Fetch and populate transaction history
    fetchTransactionHistory();

    // Generate invoice event
    generateInvoiceBtn.addEventListener("click", async () => {
        const startDate = document.getElementById("start-date").value;
        const endDate = document.getElementById("end-date").value;

        // Validate date input
        if (!startDate || !endDate || new Date(startDate) > new Date(endDate)) {
            alert("Please choose appropriate start and end dates.");
            return;
        }

        try {
            const response = await fetch("transactions.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ start_date: startDate, end_date: endDate }),
            });

            if (response.ok) {
                const data = await response.json();

                if (data.success && data.transactions.length > 0) {
                    populateInvoice(data.transactions);
                } else {
                    alert("No data yet.");
                }
            } else {
                displayErrorInInvoice("The data cannot be reloaded.");
            }
        } catch (error) {
            console.error("Error fetching invoice data:", error);
            displayErrorInInvoice("The data cannot be reloaded.");
        }
    });

    // Populate invoice data
    function populateInvoice(transactions) {
        invoiceBody.innerHTML = "";
        let totalAmount = 0;

        transactions.forEach((item, index) => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${index + 1}</td>
                <td>${item.description}</td>
                <td>${item.date}</td>
                <td>${item.qty}</td>
                <td>${item.unit_price.toFixed(2)}</td>
                <td>${item.amount.toFixed(2)}</td>
            `;
            invoiceBody.appendChild(row);
            totalAmount += item.amount;
        });

        // Set current date
        const today = new Date();
        const formattedDate = today.toISOString().split("T")[0];
        invoiceDate.textContent = formattedDate;

        // Update total amount
        invoiceTotal.textContent = totalAmount.toFixed(2);
        invoiceModal.style.display = "block";
    }

    // Display error in invoice modal
    function displayErrorInInvoice(message) {
        invoiceBody.innerHTML = `<tr><td colspan="6">${message}</td></tr>`;
        invoiceTotal.textContent = "0.00";
        invoiceModal.style.display = "block";
    }

    // Close modal
    closeModal.addEventListener("click", () => {
        invoiceModal.style.display = "none";
    });

    // Fetch transaction history
    async function fetchTransactionHistory() {
        try {
            const response = await fetch("transactions.php");

            if (response.ok) {
                const data = await response.json();

                if (data.success && data.transactions.length > 0) {
                    populateTransactionHistory(data.transactions);
                } else {
                    transactionBody.innerHTML = "<tr><td colspan='6'>No data yet.</td></tr>";
                }
            } else {
                displayErrorInTransactionHistory("The data cannot be reloaded.");
            }
        } catch (error) {
            console.error("Error fetching transaction history:", error);
            displayErrorInTransactionHistory("The data cannot be reloaded.");
        }
    }

    // Populate transaction history
    function populateTransactionHistory(transactions) {
        transactionBody.innerHTML = transactions
            .map(
                (transaction) =>
                    `<tr>
                        <td>${transaction.id}</td>
                        <td>${transaction.transaction_id}</td>
                        <td>${transaction.date}</td>
                        <td>${transaction.payment_method}</td>
                        <td>${transaction.status}</td>
                        <td>${transaction.amount.toFixed(2)}</td>
                    </tr>`
            )
            .join("");
    }

    // Display error in transaction history
    function displayErrorInTransactionHistory(message) {
        transactionBody.innerHTML = `<tr><td colspan="6">${message}</td></tr>`;
    }
});

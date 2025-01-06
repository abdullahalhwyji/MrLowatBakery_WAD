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

    // Fetch transaction history
    async function fetchTransactionHistory() {
        try {
            const response = await fetch("../php/transactions.php");

            if (response.ok) {
                const data = await response.json();

                if (data.length > 0) {
                    populateTransactionHistory(data);
                } else {
                    transactionBody.innerHTML = "<tr><td colspan='6'>No data yet.</td></tr>";
                }
            } else {
                displayErrorInTransactionHistory("The data cannot be reloaded.");
            }
        } catch (error) {
            // console.error("Error fetching transaction history:", error);
            displayErrorInTransactionHistory("The data cannot be reloaded.");
        }
    }

    // Populate transaction history
    function populateTransactionHistory(transactions) {
        transactionBody.innerHTML = transactions
            .map(
                (transaction, index) =>
                    `<tr>
                        <td>${index + 1}</td>
                        <td>${transaction.transaction_id}</td>
                        <td>${transaction.transaction_date}</td>
                        <td>${transaction.payment_method}</td>
                        <td>${transaction.payment_status}</td>
                        <td>${transaction.total_price}</td>
                        <td><button type="button" class="generate-invoice-btn" data-id="${transaction.order_id}">Generate</button></td>
                    </tr>`
            )
            .join("");

        const totalAmount = transactions.reduce((sum, transaction) => sum + parseFloat(transaction.total_price), 0);
        document.getElementById("total-amount").textContent = totalAmount;
        document.getElementById("total-transactions").textContent = transactions.length;

        const buttons = document.querySelectorAll('.generate-invoice-btn');
        // console.log(buttons);
        buttons.forEach((button, index) => {
            button.addEventListener('click', async () => {
                await generateOrderInvoce(button);
            });
        });
    }

    // Display error in transaction history
    function displayErrorInTransactionHistory(message) {
        transactionBody.innerHTML = `<tr><td colspan="6">${message}</td></tr>`;
    }

    // Generate invoice event
    async function generateOrderInvoce(element) {
        // const startDate = document.getElementById("start-date").value;
        // const endDate = document.getElementById("end-date").value;

        const order_id = element.dataset.id;

        // Validate date input
        // if (!startDate || !endDate || new Date(startDate) > new Date(endDate)) {
        //     alert("Please choose appropriate start and end dates.");
        //     return;
        // }

        try {
            const response = await fetch("../php/order_invoice.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                // body: JSON.stringify({ start_date: startDate, end_date: endDate }),
                body: JSON.stringify({ order_id: order_id}),
            });

            if (response.ok) {
                const data = await response.json();

                if (data.length > 0) {
                    populateInvoice(data);
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
    }

    // Populate invoice data
    function populateInvoice(transactions) {
        invoiceBody.innerHTML = "";
        let totalAmount = 0;

        console.log(transactions);

        transactions.forEach((item, index) => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${index + 1}</td>
                <td>${item.name}</td>
                <td>${item.quantity}</td>
                <td>${item.order_status}</td>
                <td>${item.price}</td>
            `;
            invoiceBody.appendChild(row);
            totalAmount += Number(item.price);
            document.getElementById("userName").textContent = item.username;
            document.getElementById("userAddress").textContent = item.address;
            document.getElementById("userTel").textContent = "T:"+item.tel;
        });

        // Set current date
        const today = new Date();
        const formattedDate = today.toISOString().split("T")[0];
        invoiceDate.textContent = formattedDate;

        // Update total amount
        invoiceTotal.textContent = totalAmount;
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
});

document.addEventListener("DOMContentLoaded", () => {
    const productTable = document.getElementById("product-table");
    const productForm = document.getElementById("product-form");
    const productNameInput = document.getElementById("product-name");
    const productPriceInput = document.getElementById("product-price");
    const productStockInput = document.getElementById("product-stock");
    const productCategoryInput = document.getElementById("product-category");

    let editingProductId = null; // To track the product being edited

    // Handle Edit Button Click
    productTable.addEventListener("click", (event) => {
        if (event.target.classList.contains("edit-btn")) {
            const row = event.target.closest("tr");
            editingProductId = row.cells[0].textContent;
            productNameInput.value = row.cells[1].textContent;
            productPriceInput.value = parseFloat(row.cells[2].textContent.replace("$", ""));
            productStockInput.value = row.cells[3].textContent;
            productCategoryInput.value = row.cells[4].textContent.toLowerCase();
            productForm.scrollIntoView({ behavior: "smooth" });
        }
    });

    // Handle Delete Button Click
    productTable.addEventListener("click", (event) => {
        if (event.target.classList.contains("delete-btn")) {
            const row = event.target.closest("tr");
            if (confirm(`Are you sure you want to delete ${row.cells[1].textContent}?`)) {
                row.remove();
            }
        }
    });

    // Handle Form Submission for Adding or Editing a Product
    productForm.addEventListener("submit", (event) => {
        event.preventDefault();

        const name = productNameInput.value.trim();
        const price = `$${parseFloat(productPriceInput.value).toFixed(2)}`;
        const stock = productStockInput.value.trim();
        const category = productCategoryInput.options[productCategoryInput.selectedIndex].text;

        if (editingProductId) {
            // Update Existing Product
            const rows = productTable.querySelectorAll("tbody tr");
            rows.forEach((row) => {
                if (row.cells[0].textContent === editingProductId) {
                    row.cells[1].textContent = name;
                    row.cells[2].textContent = price;
                    row.cells[3].textContent = stock;
                    row.cells[4].textContent = category;
                }
            });
            editingProductId = null; // Reset editing state
        } else {
            // Add New Product
            const newRow = productTable.insertRow();
            newRow.innerHTML = `
                <td>${productTable.rows.length - 1}</td>
                <td>${name}</td>
                <td>${price}</td>
                <td>${stock}</td>
                <td>${category}</td>
                <td><img src="path/to/default/image.jpg" alt="${name}" /></td>
                <td>
                    <button class="edit-btn" data-id="${productTable.rows.length - 1}">Edit</button>
                    <button class="delete-btn" data-id="${productTable.rows.length - 1}">Delete</button>
                </td>
            `;
        }

        productForm.reset(); // Clear the form after submission
    });
});

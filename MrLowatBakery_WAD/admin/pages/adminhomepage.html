<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Mr. Lowat Bakery</title>
    <link rel="stylesheet" href="../assets/style/adminhomepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<header>
    <div class="logo">Mr. Lowat Bakery</div>
    <div class="icon-links">
        <button class="logout-btn" onclick="logout()">Logout</button>
    </div>
</header>

<div class="container">
    <!-- Left Section (Sidebar) -->
    <div class="left-section">
        <h3>Admin Dashboard</h3>
        <button class="nav-btn" onclick="showProfile()">Profile</button>
        <button class="nav-btn" onclick="showOrders()">Orders</button>
        <button class="nav-btn" onclick="showProducts()">Products</button>
        <button class="nav-btn" onclick="showSummaryTransaction()">Transaction</button>
        <button class="nav-btn" onclick="showRegisteredMember()">Registered Member</button>
    </div>

    <!-- Middle Section (Content) -->
    <div class="middle-section">
        <!-- Menu Section (This will be displayed first) -->
        <div class="menu-content section-content">
            <h2 class="section-title">Welcome to the Admin Dashboard</h2>
            <p>Click on the options from the left sidebar to manage the bakery.</p>
        </div>

        <!-- Profile Section -->
        <div class="profile-content section-content" style="display: none;">
            <h2 class="section-title">Profile</h2>
            <div class="profile-card">
                <form id="profile-form">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" value="admin@example.com">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" value="password123">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact Number</label>
                        <input type="text" id="contact" name="contact" value="0123456789">
                    </div>
                    <div class="form-group">
                        <label for="contact">Address</label>
                        <input type="text" id="address" name="address" value="123, Jalan Kuching">
                    </div>
                    <div class="form-group">
                        <button type="submit">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Orders Section -->
        <div class="orders-content section-content" style="display: none;">
            <h2 class="section-title">Orders</h2>

            <!-- Order List Table -->
            <div class="order-list">
                <h3>Order List</h3>
                <table>
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>2025-01-02</td>
                        <td>Pending</td>
                        <td><button onclick="viewOrderDetails(1)">View</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jane Smith</td>
                        <td>2025-01-01</td>
                        <td>Shipped</td>
                        <td><button onclick="viewOrderDetails(2)">View</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- Order Details -->
            <div class="order-details" id="order-details" style="display: none;">
                <h3>Order Details</h3>

                <!-- Customer Information -->
                <div class="customer-details">
                    <h4>Customer Information</h4>
                    <p><strong>Customer Name:</strong> <span id="customer-name"></span></p>
                    <p><strong>Email:</strong> <span id="customer-email"></span></p>
                    <p><strong>Contact:</strong> <span id="customer-contact"></span></p>
                    <p><strong>Address:</strong> <span id="customer-address"></span></p>
                </div>

                <!-- Order Items -->
                <div class="order-items">
                    <h4>Order Items</h4>
                    <table>
                        <thead>
                        <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody id="order-items-table">
                        </tbody>
                    </table>
                </div>

                <!-- Shipping Information -->
                <div class="shipping-details">
                    <h4>Shipping Information</h4>
                    <label for="tracking-number">Tracking Number:</label>
                    <input type="text" id="tracking-number" class="editable-field">
                    <label for="shipping-status">Shipping Status:</label>
                    <select id="shipping-status" class="editable-field">
                        <option value="In Transit">In Transit</option>
                        <option value="Delivered">Delivered</option>
                        <option value="Pending">Pending</option>
                    </select>
                    <button class="save-button" onclick="updateShippingInfo()">Save Shipping Info</button>
                </div>

                <!-- Order Status -->
                <div class="order-status">
                    <h4>Order Status:</h4>
                    <select id="order-status" class="editable-field">
                        <option value="Pending">Pending</option>
                        <option value="Shipped">Shipped</option>
                        <option value="Completed">Completed</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                    <button class="save-button" onclick="updateOrderStatus()">Save Order Status</button>
                </div>

                <!-- Payment Method -->
                <div class="payment-method">
                    <h4>Payment Method:</h4>
                    <p id="payment-method"></p> <!-- Display payment method -->
                </div>

                <!-- Back Button -->
                <button class="back-button" onclick="backToOrderList()">Back to Order List</button>
            </div>
        </div>

        <script>
            const orders = [
                {
                    orderId: 1,
                    customerName: 'John Doe',
                    email: 'johndoe@example.com',
                    contact: '0123456789',
                    address: '123, Jalan ABC',
                    orderDate: '2025-01-02',
                    items: [
                        { name: 'Chocolate Cake', quantity: 2, price: 15.00 }
                    ],
                    trackingNumber: 'ABC123',
                    shippingStatus: 'In Transit',
                    orderStatus: 'Pending',
                    paymentMethod: 'Credit Card' // Added payment method
                },
                {
                    orderId: 2,
                    customerName: 'Jane Smith',
                    email: 'janesmith@example.com',
                    contact: '0198765432',
                    address: '456, Jalan XYZ',
                    orderDate: '2025-01-01',
                    items: [
                        { name: 'Red Velvet Cake', quantity: 1, price: 20.00 }
                    ],
                    trackingNumber: 'XYZ987',
                    shippingStatus: 'Delivered',
                    orderStatus: 'Shipped',
                    paymentMethod: 'PayPal' // Added payment method
                }
            ];

            let selectedOrderId;

            function toggleOrders() {
                document.querySelector('.orders-content').style.display = 'block';
            }

            function viewOrderDetails(orderId) {
                const order = orders.find(o => o.orderId === orderId);
                selectedOrderId = orderId;

                if (order) {
                    document.getElementById('customer-name').textContent = order.customerName;
                    document.getElementById('customer-email').textContent = order.email;
                    document.getElementById('customer-contact').textContent = order.contact;
                    document.getElementById('customer-address').textContent = order.address;

                    const itemsHTML = order.items.map(item => `
                        <tr>
                            <td>${item.name}</td>
                            <td>${item.quantity}</td>
                            <td>$${item.price.toFixed(2)}</td>
                            <td>$${(item.quantity * item.price).toFixed(2)}</td>
                        </tr>
                    `).join('');
                    document.getElementById('order-items-table').innerHTML = itemsHTML;

                    document.getElementById('tracking-number').value = order.trackingNumber;
                    document.getElementById('shipping-status').value = order.shippingStatus;
                    document.getElementById('order-status').value = order.orderStatus;
                    document.getElementById('payment-method').textContent = order.paymentMethod; // Display payment method

                    document.querySelector('.order-list').style.display = 'none';
                    document.getElementById('order-details').style.display = 'block';
                }
            }

            function updateShippingInfo() {
                const order = orders.find(o => o.orderId === selectedOrderId);
                if (order) {
                    order.trackingNumber = document.getElementById('tracking-number').value;
                    order.shippingStatus = document.getElementById('shipping-status').value;
                    alert('Shipping info updated!');
                }
            }

            function updateOrderStatus() {
                const order = orders.find(o => o.orderId === selectedOrderId);
                if (order) {
                    order.orderStatus = document.getElementById('order-status').value;
                    alert('Order status updated!');
                }
            }

            function backToOrderList() {
                document.querySelector('.order-list').style.display = 'block';
                document.getElementById('order-details').style.display = 'none';
            }
        </script>


        <!-- Products Section -->
        <div class="products-content section-content" style="display: none;">
            <h2 class="section-title">Products</h2>
            <p>Manage bakery products here.</p>

            <!-- Manage Products Button -->
            <button id="manage-products-btn">Manage Products</button>

            <!-- Product Management Section -->
            <div id="product-management-section" style="display: none;">
                <h2>Manage Products</h2>

                <!-- Add Category Form -->
                <form id="add-category-form">
                    <label for="new-category-name">New Category Name:</label>
                    <input type="text" id="new-category-name" placeholder="Enter new category name" required>
                    <button type="submit">Add Category</button>
                </form>

                <!-- Add Product Form -->
                <form id="product-form">
                    <label for="product-name">Product Name:</label>
                    <input type="text" id="product-name" placeholder="Enter product name" required>

                    <label for="product-price">Price:</label>
                    <input type="number" id="product-price" placeholder="Enter price" required>

                    <label for="product-stock">Stock:</label>
                    <input type="number" id="product-stock" placeholder="Enter stock quantity" required>

                    <label for="product-category">Category:</label>
                    <select id="product-category" required>
                        <option value="" disabled selected>Select category</option>
                    </select>

                    <label for="product-image">Product Image:</label>
                    <input type="file" id="product-image" accept="image/*">

                    <button type="submit">Add Product</button>
                </form>

                <!-- Product Table -->
                <h3>Product List</h3>
                <table id="product-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Dynamically added rows -->
                    </tbody>
                </table>
            </div>
        </div>

        <script>
            // Initial Data Structure
            const data = {
                cake: [],
                cupcake: [],
                tart: [],
                brownies: [],
                burnedcheesecake: [],
                specialpromotion: [],
            };

            // Elements
            const manageProductsBtn = document.getElementById("manage-products-btn");
            const productManagementSection = document.getElementById("product-management-section");
            const productCategorySelect = document.getElementById("product-category");
            const addCategoryForm = document.getElementById("add-category-form");
            const newCategoryInput = document.getElementById("new-category-name");
            const productForm = document.getElementById("product-form");
            const productTableBody = document.getElementById("product-table").querySelector("tbody");

            // Toggle Management Section
            manageProductsBtn.addEventListener("click", () => {
                const isVisible = productManagementSection.style.display === "block";
                productManagementSection.style.display = isVisible ? "none" : "block";
            });

            // Populate Categories
            function populateCategories() {
                productCategorySelect.innerHTML = '<option value="" disabled selected>Select category</option>';
                for (const category in data) {
                    const option = document.createElement("option");
                    option.value = category;
                    option.textContent = category.charAt(0).toUpperCase() + category.slice(1);
                    productCategorySelect.appendChild(option);
                }
            }

            // Add New Category
            addCategoryForm.addEventListener("submit", (e) => {
                e.preventDefault();
                const categoryName = newCategoryInput.value.trim().toLowerCase();
                if (!data[categoryName]) {
                    data[categoryName] = [];
                    populateCategories();
                }
                newCategoryInput.value = "";
            });

            // Add New Product
            productForm.addEventListener("submit", (e) => {
                e.preventDefault();
                const productName = document.getElementById("product-name").value.trim();
                const productPrice = parseFloat(document.getElementById("product-price").value);
                const productStock = parseInt(document.getElementById("product-stock").value, 10);
                const productCategory = document.getElementById("product-category").value;
                const productImage = document.getElementById("product-image").files[0]?.name || "placeholder.jpg";

                if (productName && productCategory && !isNaN(productPrice) && !isNaN(productStock)) {
                    const newProduct = { name: productName, price: productPrice, stock: productStock, image: productImage };
                    data[productCategory].push(newProduct);
                    renderProductTable();
                    productForm.reset();
                }
            });

            // Render Product Table
            function renderProductTable() {
                productTableBody.innerHTML = "";
                Object.entries(data).forEach(([category, products]) => {
                    products.forEach((product, index) => {
                        const row = document.createElement("tr");
                        row.innerHTML = `
                            <td>${index + 1}</td>
                            <td>${product.name}</td>
                            <td>${product.price}</td>
                            <td>${product.stock}</td>
                            <td>${category.charAt(0).toUpperCase() + category.slice(1)}</td>
                            <td><img src="${product.image}" alt="${product.name}" width="50"></td>
                            <td>
                                <button class="edit-btn">Edit</button>
                                <button class="delete-btn">Delete</button>
                            </td>
                        `;
                        productTableBody.appendChild(row);
                    });
                });
            }

            // Initialize
            populateCategories();
            renderProductTable();
        </script>


        <!-- Users Section (Initially hidden) -->
        <div class="users-content section-content" style="display: none;">
            <h2 class="section-title">Users</h2>
            <p>Manage users here.</p>
        </div>
    </div>
    <!-- Transaction Section -->
    <div class="transactions-content section-content" style="display: none;">
        <h2 class="section-title">Transaction Summary</h2>

        <!-- Filter Section -->
        <div class="filter-section">
            <label for="filter-period">Filter by:</label>
            <select id="filter-period" onchange="filterTransactions()">
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
                <option value="monthly">Monthly</option>
            </select>
        </div>

        <!-- Transaction Records -->
        <div class="transaction-records">
            <h3>Transaction Records</h3>
            <table id="transaction-table">
                <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <!-- Transaction records will be dynamically inserted here -->
                </tbody>
            </table>
        </div>

        <!-- Transaction Summary -->
        <div class="transaction-summary">
            <h3>Summary</h3>
            <p><strong>Total Transactions:</strong> <span id="total-transactions">0</span></p>
            <p><strong>Total Amount:</strong> <span id="total-amount">$0.00</span></p>
        </div>
    </div>

    <script>
        // Sample transaction data for demonstration purposes
        const transactions = [
            { id: 1, date: '2025-01-01', amount: 50.00, status: 'Completed' },
            { id: 2, date: '2025-01-01', amount: 30.00, status: 'Completed' },
            { id: 3, date: '2025-01-02', amount: 20.00, status: 'Pending' },
            { id: 4, date: '2025-01-03', amount: 45.00, status: 'Completed' },
            { id: 5, date: '2025-01-03', amount: 70.00, status: 'Completed' },
            { id: 6, date: '2025-01-04', amount: 100.00, status: 'Completed' },
            // Add more transactions as necessary
        ];

        // Show Transaction Section
        function showSummaryTransaction() {
            resetSections();
            document.querySelector('.transactions-content').style.display = 'block';
            displayTransactions('daily'); // Default filter is daily
        }

        // Reset all sections visibility
        function resetSections() {
            const sections = document.querySelectorAll('.section-content');
            sections.forEach(section => {
                section.style.display = 'none';
            });
        }

        // Filter transactions by selected period
        function filterTransactions() {
            const period = document.getElementById('filter-period').value;
            displayTransactions(period);
        }

        // Display transactions based on selected period (daily, weekly, or monthly)
        function displayTransactions(period) {
            let filteredTransactions;

            const today = new Date();
            const currentDate = today.toISOString().split('T')[0]; // 'YYYY-MM-DD'

            // Filter transactions based on the selected period
            if (period === 'daily') {
                filteredTransactions = transactions.filter(transaction => transaction.date === currentDate);
            } else if (period === 'weekly') {
                const startOfWeek = getStartOfWeek(today);
                filteredTransactions = transactions.filter(transaction => {
                    return new Date(transaction.date) >= startOfWeek;
                });
            } else if (period === 'monthly') {
                const startOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
                filteredTransactions = transactions.filter(transaction => {
                    return new Date(transaction.date) >= startOfMonth;
                });
            }

            // Display the filtered transactions in the table
            const tableBody = document.querySelector('#transaction-table tbody');
            tableBody.innerHTML = '';
            let totalAmount = 0;
            filteredTransactions.forEach(transaction => {
                const row = `
                    <tr>
                        <td>${transaction.id}</td>
                        <td>${transaction.date}</td>
                        <td>$${transaction.amount.toFixed(2)}</td>
                        <td>${transaction.status}</td>
                    </tr>
                `;
                tableBody.innerHTML += row;
                totalAmount += transaction.amount;
            });

            // Update the summary section
            document.getElementById('total-transactions').textContent = filteredTransactions.length;
            document.getElementById('total-amount').textContent = `$${totalAmount.toFixed(2)}`;
        }

        // Get the start of the week (Monday)
        function getStartOfWeek(date) {
            const day = date.getDay(),
                diff = date.getDate() - day + (day == 0 ? -6 : 1); // Adjust when day is Sunday
            return new Date(date.setDate(diff));
        }

        // Display the transactions section on page load
        window.onload = function() {
            showSummaryTransaction(); // Show transactions by default
        }
    </script>

</div>
<script>
    // Logout function
    function logout() {
        alert('Logged out successfully!');
        window.location.href = 'index.html'; // Redirect to homepage
    }

    // Function to show Profile Section
    function showProfile() {
        resetSections();
        document.querySelector('.profile-content').style.display = 'block';
    }

    // Function to show Orders Section
    function showOrders() {
        resetSections();
        document.querySelector('.orders-content').style.display = 'block';
    }

    // Function to show Products Section
    function showProducts() {
        resetSections();
        document.querySelector('.products-content').style.display = 'block';
    }

    // Function to show Users Section
    function showUsers() {
        resetSections();
        document.querySelector('.users-content').style.display = 'block';
    }

    // Reset all sections visibility
    function resetSections() {
        const sections = document.querySelectorAll('.section-content');
        sections.forEach(section => {
            section.style.display = 'none';
        });
    }

    // Display Menu Section first
    window.onload = function() {
        resetSections();
        document.querySelector('.menu-content').style.display = 'block';
    }
    function showRegisteredMember() {
    // Redirect to the Registered Member page
    window.location.href = "adminuser.html";
}
</script>

</body>
</html>

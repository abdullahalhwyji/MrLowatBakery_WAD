<?php
session_start();
include('../php/connection.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Mr. Lowat Bakery</title>
    <link rel="stylesheet" href="../assets/style/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
<header>
    <h1>Mr. Lowat Bakery</h1>
    <!-- Search Bar for Categories -->
    <div class="search-bar">
    <input type="text" id="categorySearchInput" placeholder="Search for categories..." onkeyup="searchCategories()">
    </div>

    </div>
    <div class="icon-links">
        <a href="../pages/index.html">
            <i class="fas fa-home"></i>
            <span>Home</span>
        </a>
        <a href="#" id="about-us-btn">
            <i class="fas fa-info-circle"></i>
            <span>About Us</span>
        </a>
        <a href="#" id="contact-btn">
            <i class="fas fa-phone-alt"></i>
            <span>Contact</span>
        </a>
        <?php if(isset($_SESSION["user_id"])){ ?>
        <a href="../pages/profile.php">
            <i class="fas fa-user"></i>
            <span>Profile</span>
        </a>
        <a href="../pages/logout.php" onclick="return confirm('Are you sure you want to logout?')">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
        <?php }else{ ?>
        <a href="../pages/login.html">
            <i class="fas fa-sign-in-alt"></i>
            <span>Login</span>
        </a>
        <?php } ?>
    </div>
</header>

<!-- About Us Popup -->
<div class="popup-overlay" id="about-us-popup">
    <div class="popup-content">
        <h2>About Us</h2>
        <p>Mr. Lowat Bakery is a home-based and family-owned bakery that has been serving the community for years.
            We offer a wide range of freshly baked goods, including brownies, cheese tarts, cakes, and cupcakes. Our products are made with the finest ingredients and are baked fresh daily. Whether you're looking for a sweet treat or a snack, we have something for everyone. Visit us today and experience the delicious taste of Mr. Lowat Bakery.</p>
        <button class="popup-close" onclick="closePopup('about-us-popup')">Close</button>
    </div>
</div>

<!-- Contact Popup -->
<div class="popup-overlay" id="contact-popup">
    <div class="popup-content">
        <h2>Contact</h2>
        <p>Phone: 016-402-5451</p>
        <p><a href="https://api.whatsapp.com/send/?phone=60164025451" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a></p>
        <p>
            Follow us on social media:
            <a href="https://www.facebook.com/mrlowatbakery/" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>,
            <a href="https://www.instagram.com/mrlowatbake/" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
        </p>
        <button class="popup-close" onclick="closePopup('contact-popup')">Close</button>
    </div>
</div>
<script>
    // Open "About Us" popup
        document.getElementById('about-us-btn').addEventListener('click', function() {
            document.getElementById('about-us-popup').style.display = 'flex';
        });

        // Open "Contact Us" popup
        document.getElementById('contact-btn').addEventListener('click', function() {
            document.getElementById('contact-popup').style.display = 'flex';
        });

        // Close popup function
        function closePopup(popupId) {
            document.getElementById(popupId).style.display = 'none';
        }
</script>


<div class="container">
    <!-- Left Section -->
    <div class="left-section">
        <h3>Navigation</h3>
        <?php if(isset($_SESSION["user_id"])){ ?>
        <button class="nav-btn" onclick="location.href='../pages/profile.php'"><i class="fas fa-user"></i> Profile</button>
        <?php } ?>
        <button id="menu-category-btn" class="nav-btn dropdown-btn"><i class="fas fa-cake"></i> Menu Category</button>
        <div id="menu-category-dropdown" class="dropdown-content">
            <button onclick="showCategory('cake')" class="light-orange">Cake</button>
            <button onclick="showCategory('cupcake')" class="light-orange">Cupcake</button>
            <button onclick="showCategory('tart')" class="light-orange">Tart</button>
            <button onclick="showCategory('brownies')" class="light-orange">Brownies</button>
            <button onclick="showCategory('burnedCheesecake')" class="light-orange">Burned Cheesecake</button>
            <button onclick="showCategory('promotion')" class="light-orange">Special Promotion</button>
        </div>
        <button class="nav-btn" onclick="location.href='../pages/login.html'"><i class="fas fa-shopping-cart"></i> Cart</button>
        <button class="nav-btn" onclick="location.href='../pages/login.html'"><i class="fas fa-receipt"></i> My Orders</button>
    </div>

    <div class="container">
        <!-- Middle Section -->
        <div class="middle-section">
            <h2>Featured Items</h2>
            <div class="featured-items">
                <div class="featured-item">
                    <img src="../assets/images/feature_cupcake2.jpg" alt="Cupcakes">
                    <h3 style="font-size: 1rem;">Cupcakes</h3>
                    <p style="font-size: 0.9rem;">Delicious, moist cupcakes available in various flavors.</p>
                </div>
                <div class="featured-item">
                    <img src="../assets/images/feature_brownies.jpg" alt="Brownies">
                    <h3 style="font-size: 1rem;">Brownies</h3>
                    <p style="font-size: 0.9rem;">Rich, chocolatey brownies with a chewy texture.</p>
                </div>
                <div class="featured-item">
                    <img src="../assets/images/feature_cake.jpg" alt="Cake">
                    <h3 style="font-size: 1rem;">Cake</h3>
                    <p style="font-size: 0.9rem;">Moist and flavorful cakes perfect for celebrations.</p>
                </div>
                <div class="featured-item">
                    <img src="../assets/images/feature_burned_cheesecake_6inch.jpg" alt="Burned Cheesecake">
                    <h3 style="font-size: 1rem;">Burned Cheesecake</h3>
                    <p style="font-size: 0.9rem;">Spanish dessert with a burnt top and creamy interior.</p>
                </div>
                <div class="featured-item">
                    <img src="../assets/images/feature_tart.jpg" alt="Tart">
                    <h3 style="font-size: 1rem;">Tart</h3>
                    <p style="font-size: 0.9rem;">Crispy pastry filled with sweet or savory fillings.</p>
                </div>
            </div>
    
        <!-- Order More Section -->
        <h2>Order More</h2>
        <?php
// Include the connection file
include('../php/connection.php');

// Fetch 6 random products from different categories
$query = "SELECT name, description, image_url, category 
          FROM products 
          GROUP BY category 
          ORDER BY RAND() 
          LIMIT 6";

$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $name = htmlspecialchars($row['name']); // Sanitize output
        $description = htmlspecialchars($row['description']);
        $imageUrl = htmlspecialchars($row['image_url']);

        echo <<<HTML
        <div class="order-more-item">
            <img src="$imageUrl" alt="$name" class="order-more-image">
            <div class="order-more-details">
                <h3>$name</h3>
                <p>$description</p>
            </div>
            <button class="customize-btn" onclick="addToCart('$name')">
                <i class="fas fa-plus"></i>
            </button>
        </div>
HTML;
    }
} else {
    echo '<p>No products available.</p>';
}
?>


    </div>
    
    <!-- Right Section -->
    <div class="right-section">
        <h2>Real-Time Cart</h2>
        <div class="cart-items" id="right-cart-items">
            <!-- Cart items will be dynamically rendered here -->
        </div>
        <div class="cart-total">
            <h4>Total:</h4>
            <p id="right-cart-total">$0.00</p>
        </div>
        <!-- Checkout Button -->
        <button class="checkout-btn" id="checkout-button">Proceed to Checkout</button>
    </div>

    <!-- Popup Modal -->
    <div id="popup-modal" class="modal">
        <div class="modal-content">
            <span id="close-popup" class="close">&times;</span>
            <p>Please login/register to checkout.</p>
        </div>
    </div>
<script>
    // Get modal and button elements
    const modal = document.getElementById("popup-modal");
    const closePopup = document.getElementById("close-popup");
    const checkoutButton = document.querySelector(".checkout-btn"); // Adjusted for class selector
    const redirectDelay = 2000; // Delay in milliseconds before redirecting

    // Show the modal when the checkout button is clicked
    checkoutButton.addEventListener("click", (event) => {
        event.preventDefault(); // Prevent default behavior
        modal.style.display = "block"; // Show the modal

        // Redirect to the login page after a delay
        setTimeout(() => {
            window.location.href = "../pages/login.html";
        }, redirectDelay);
    });

    // Close the modal when the close button is clicked
    closePopup.addEventListener("click", () => {
        modal.style.display = "none";
    });

    // Close the modal if the user clicks outside the modal content
    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });

</script>

    <!-- About Us Popup -->
<div class="popup-overlay" id="about-us-popup">
    <div class="popup-content">
        <h2>About Us</h2>
        <p>Mr. Lowat Bakery is a home-based and family-owned bakery that has been serving the community for years.
            We offer a wide range of freshly baked goods, including brownies, cheese tarts, cakes, and cupcakes. Our products are made with the finest ingredients and are baked fresh daily. Whether you're looking for a sweet treat or a snack, we have something for everyone. Visit us today and experience the delicious taste of Mr. Lowat Bakery.</p>
        <button class="popup-close" onclick="closePopup('about-us-popup')">Close</button>
    </div>
</div>

<!-- Contact Popup -->
<div class="popup-overlay" id="contact-popup">
    <div class="popup-content">
        <h2>Contact</h2>
        <p>Phone: 016-402-5451</p>
        <p><a href="https://api.whatsapp.com/send/?phone=60164025451" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a></p>
        <p>
            Follow us on social media:
            <a href="https://www.facebook.com/mrlowatbakery/" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>,
            <a href="https://www.instagram.com/mrlowatbake/" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
        </p>
        <button class="popup-close" onclick="closePopup('contact-popup')">Close</button>
    </div>
</div>


<script>
    // Open "About Us" popup
        document.getElementById('about-us-btn').addEventListener('click', function() {
            document.getElementById('about-us-popup').style.display = 'flex';
        });

        // Open "Contact Us" popup
        document.getElementById('contact-btn').addEventListener('click', function() {
            document.getElementById('contact-popup').style.display = 'flex';
        });

        // Close popup function
        function closePopup(popupId) {
            document.getElementById(popupId).style.display = 'none';
        }

        // Show category function for dropdown
        function showCategory(category) {
            // You can define logic to show the selected category or navigate to it
            alert('Showing category: ' + category);
        }

        // Add to cart function
        function addToCart(itemName) {
            const cartItems = document.getElementById('right-cart-items');
            const newItem = document.createElement('div');
            newItem.textContent = itemName;
            cartItems.appendChild(newItem);

            // Update total price (assuming each item has a predefined price)
            const itemPrice = 10.00; // For example, hardcoded price
            const totalPriceElement = document.getElementById('right-cart-total');
            let currentTotal = parseFloat(totalPriceElement.textContent.replace('$', ''));
            let newTotal = currentTotal + itemPrice;
            totalPriceElement.textContent = `$${newTotal.toFixed(2)}`;

            // Show alert
            alert(`${itemName} has been added to your cart.`);
        }

        // Redirect to cart (assuming you have a cart page)
        function redirectToCart() {
            window.location.href = 'cart.html'; // Adjust URL as needed
        }

    // Toggle category dropdown visibility
    document.getElementById('menu-category-btn').addEventListener('click', function () {
        const dropdownContent = document.getElementById('menu-category-dropdown');
        dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
    });

    // Add item to cart
    function addToCart(itemName) {
        const cartItemsContainer = document.getElementById('right-cart-items');
        const cartTotal = document.getElementById('right-cart-total');

        // Check if item is already in the cart
        let existingItem = cartItemsContainer.querySelector(`#cart-item-${itemName}`);
        if (!existingItem) {
            const newItem = document.createElement('div');
            newItem.id = `cart-item-${itemName}`;
            newItem.classList.add('cart-item');
            newItem.innerHTML = `<p>${itemName}</p><button class="remove-btn" onclick="removeFromCart('${itemName}')">Remove</button>`;
            cartItemsContainer.appendChild(newItem);
        }

        // Update cart total
        updateCartTotal();
    }

    // Remove item from cart
    function removeFromCart(itemName) {
        const item = document.getElementById(`cart-item-${itemName}`);
        if (item) {
            item.remove();
        }

        // Update cart total
        updateCartTotal();
    }

    // Update cart total
    function updateCartTotal() {
        const cartItems = document.querySelectorAll('.cart-item');
        let total = 0;

        cartItems.forEach(item => {
            // Get item price (for now, hardcoding for demo purposes)
            const price = 30; // Example price, could be dynamically set based on item added
            total += price;
        });

        document.getElementById('right-cart-total').textContent = `$${total.toFixed(2)}`;
    }
</script>

<script>
    const categories = {
    cake: [
        { name: "Tiered Sponge Cake (Vanilla)", description: "A beautifully layered sponge cake, perfect for any celebration.", image: "../assets/images/tiered_sponge_cake.jpg", price: 70},
        { name: "Tiered Sponge Cake (Chocolate)", description: "A beautifully layered sponge cake, perfect for any celebration.", image: "../assets/images/tiered_sponge_cake.jpg", price: 70 },
        { name: "Tiered Sponge Cake (Red Velvet)", description: "A beautifully layered sponge cake, perfect for any celebration.", image: "../assets/images/tiered_sponge_cake.jpg", price: 70 },
        { name: "Tiered Sponge Cake (Pandan)", description: "A beautifully layered sponge cake, perfect for any celebration.", image: "../assets/images/tiered_sponge_cake.jpg", price: 70 },
        { name: "Apam @ Moist Cake (Vanilla)", description: "Soft, moist cake with a traditional touch.", image: "../assets/images/apam_cake.jpg", price: 30 },
        { name: "Apam @ Moist Cake (Chocolate)", description: "Soft, moist cake with a traditional touch.", image: "../assets/images/apam_cake.jpg", price: 30 },
        { name: "Apam @ Moist Cake (Red Velvet)", description: "Soft, moist cake with a traditional touch.", image: "../assets/images/apam_cake.jpg", price: 30 },
        { name: "Apam @ Moist Cake (Pandan)", description: "Soft, moist cake with a traditional touch.", image: "../assets/images/apam_cake.jpg", price: 30 },
        { name: "Bite Size Cake (Vanilla)", description: "Small, flavorful cakes for bite-sized enjoyment.", image: "../assets/images/bite_size_cake.jpg", price: 35 },
        { name: "Bite Size Cake (Chocolate)", description: "Small, flavorful cakes for bite-sized enjoyment.", image: "../assets/images/bite_size_cake.jpg", price: 35 },
        { name: "Bite Size Cake (Red Velvet)", description: "Small, flavorful cakes for bite-sized enjoyment.", image: "../assets/images/bite_size_cake.jpg", price: 35 },
        { name: "Bite Size Cake (Pandan)", description: "Small, flavorful cakes for bite-sized enjoyment.", image: "../assets/images/bite_size_cake.jpg", price: 35 },
        { name: "Sponge Cake Simple Decoration (Vanilla)", description: "Classic sponge cake with a simple and elegant decoration.", image: "../assets/images/simple_sponge_cake.jpg", price: 42 },
        { name: "Sponge Cake Simple Decoration (Chocolate)", description: "Classic sponge cake with a simple and elegant decoration.", image: "../assets/images/simple_sponge_cake.jpg", price: 42 },
        { name: "Sponge Cake Simple Decoration (Red Velvet)", description: "Classic sponge cake with a simple and elegant decoration.", image: "../assets/images/simple_sponge_cake.jpg", price: 42 },
        { name: "Sponge Cake Simple Decoration (Pandan)", description: "Classic sponge cake with a simple and elegant decoration.", image: "../assets/images/simple_sponge_cake.jpg", price: 42 }
    ],
    cupcake: [
        { name: "Mini Cupcakes 16 pieces (Vanilla)", description: "Delicious cupcakes with amazing designs.", image: "../assets/images/mini_cupcakes_16.jpg", price: 30 },
        { name: "Mini Cupcakes 16 pieces (Chocolate)", description: "Delicious cupcakes with amazing designs.", image: "../assets/images/mini_cupcakes_16.jpg", price: 30 },
        { name: "Mini Cupcakes 16 pieces (Red Velvet)", description: "Delicious cupcakes with amazing designs.", image: "../assets/images/mini_cupcakes_16.jpg", price: 30 },
        { name: "Mini Cupcakes 16 pieces (Pandan)", description: "Delicious cupcakes with amazing designs.", image: "../assets/images/mini_cupcakes_16.jpg", price: 30 },
        { name: "Mini Size Cupcakes 25 pieces (Vanilla)", description: "Delicious cupcakes with amazing designs.", image: "../assets/images/mini_cupcakes_25.jpg", price: 40 },
        { name: "Mini Size Cupcakes 25 pieces (Chocolate)", description: "Delicious cupcakes with amazing designs.", image: "../assets/images/mini_cupcakes_25.jpg", price: 40 },
        { name: "Mini Size Cupcakes 25 pieces (Red Velvet)", description: "Delicious cupcakes with amazing designs.", image: "../assets/images/mini_cupcakes_25.jpg", price: 40 },
        { name: "Mini Size Cupcakes 25 pieces (Pandan)", description: "Delicious cupcakes with amazing designs.", image: "../assets/images/mini_cupcakes_25.jpg", price: 40 },
        { name: "Normal Cupcakes 16 pieces (Vanilla)", description: "Delicious cupcakes with amazing designs.", image: "../assets/images/normal_cupcakes.jpg", price: 48 },
        { name: "Normal Cupcakes 16 pieces (Chocolate)", description: "Delicious cupcakes with amazing designs.", image: "../assets/images/normal_cupcakes.jpg", price: 48 },
        { name: "Normal Cupcakes 16 pieces (Red Velvet)", description: "Delicious cupcakes with amazing designs.", image: "../assets/images/normal_cupcakes.jpg", price: 48 },
        { name: "Normal Cupcakes 16 pieces (Pandan)", description: "Delicious cupcakes with amazing designs.", image: "../assets/images/normal_cupcakes.jpg", price: 48},
        { name: "Normal Size Cupcakes 25 pieces (Vanilla)", description: "Delicious cupcakes with amazing designs.", image: "../assets/images/normal_cupcakes_25.jpg", price: 60.80 },
        { name: "Normal Size Cupcakes 25 pieces (Chocolate)", description: "Delicious cupcakes with amazing designs.", image: "../assets/images/normal_cupcakes_25.jpg", price: 60.80 },
        { name: "Normal Size Cupcakes 25 pieces (Red Velvet)", description: "Delicious cupcakes with amazing designs.", image: "../assets/images/normal_cupcakes_25.jpg", price: 60.80 },
        { name: "Normal Size Cupcakes 25 pieces (Pandan)", description: "Delicious cupcakes with amazing designs.", image: "../assets/images/normal_cupcakes_25.jpg", price: 60.80 }
    ],
    tart: [
        { name: "Mini Cheese Tart (Original)", description: "Choose your favorite flavor with different topping options.", image: "../assets/images/mini_cheese_tart.jpg", price: 43},
        { name: "Mini Cheese Tart (Nutella)", description: "Choose your favorite flavor with different topping options.", image: "../assets/images/mini_cheese_tart.jpg", price: 43 },
        { name: "Mini Cheese Tart (Cadbury)", description: "Choose your favorite flavor with different topping options.", image: "../assets/images/mini_cheese_tart.jpg", price: 43 },
        { name: "Mini Cheese Tart (Mix and Match)", description: "Choose your favorite flavor and mix and match different toppings.", image: "../assets/images/mini_cheese_tart.jpg", price: 43 },
        { name: "Giant Cheese Tart (6 inch - Original)", description: "Includes mini tarts.", image: "../assets/images/giant_cheese_tart.jpg", price: 58 },
        { name: "Giant Cheese Tart (6 inch - Nutella)", description: "Includes mini tarts.", image: "../assets/images/giant_cheese_tart.jpg", price: 58 },
        { name: "Giant Cheese Tart (7 inch - Cadbury)", description: "Includes mini tarts.", image: "../assets/images/giant_cheese_tart_7inch.jpg", price: 68 },
        { name: "Giant Cheese Tart (7 inch - Original)", description: "Includes mini tarts.", image: "../assets/images/giant_cheese_tart_7inch.jpg", price: 68 }
    ],
    brownies: [
        { name: "6 Inch Brownies (Chocolate)", description: "Various topping choices and can add on your own deco/topper.", image: "../assets/images/brownies_6inch.jpg", price: 25 },
        { name: "6 Inch Brownies (Nutella)", description: "Various topping choices and can add on your own deco/topper.", image: "../assets/images/brownies_6inch.jpg", price: 27 },
        { name: "6 Inch Brownies (Cream Cheese)", description: "Various topping choices and can add on your own deco/topper.", image: "../assets/images/brownies_6inch.jpg", price: 30 },
        { name: "6 Inch Brownies (Nuts)", description: "Various topping choices and can add on your own deco/topper.", image: "../assets/images/brownies_6inch.jpg", price: 32 },
        { name: "8 Inch Brownies (Chocolate)", description: "Various topping choices and can add on your own deco/topper.", image: "../assets/images/brownies_8inch.jpg", price: 35 },
        { name: "8 Inch Brownies (Nutella)", description: "Various topping choices and can add on your own deco/topper.", image: "../assets/images/brownies_8inch.jpg", price: 38 },
        { name: "8 Inch Brownies (Cream Cheese)", description: "Various topping choices and can add on your own deco/topper.", image: "../assets/images/brownies_8inch.jpg", price: 45 },
        { name: "8 Inch Brownies (Nuts)", description: "Various topping choices and can add on your own deco/topper.", image: "../assets/images/brownies_8inch.jpg" , price: 48}
    ],
    burnedCheesecake: [
        { name: "Classic Burned Cheesecake", description: "Rich and creamy cheesecake with a caramelized top.", image: "../assets/images/burnt_cheesecake_6inch.jpg", price: 40 },
        { name: "Custom Design Classic Burned Cheesecake", description: "Design your own cheesecake with a caramelized top.", image: "../assets/images/burnt_cheesecake_6inch.jpg", price: 55 }
    ],
    promotion: [
        { name: "Dessert Table Package A", description: "Combination of Mini Cheese Tart, Moist Cake, Burnt Cheesecake, and Mini Cupcakes at a discounted price.", image: "../assets/images/promotionA.jpg", price: 145 },
        { name: "Dessert Table Package B", description: "Combination of Sponge Cake, Mini Cheese Tart, Cream Puff, and Roti Sosej at a discounted price.", image: "../assets/images/promotionB.jpg", price: 175 },
        { name: "Dessert Table Package C", description: "Combination of Sponge Cake, Moist Cake, Cream Puff, and Cheese Tart at a discounted price.", image: "../assets/images/promotionC.jpg", price: 145 },
        { name: "Dessert Table Package D", description: "Combination of Bite-size Cake, Moist Cake, Burnt Cheesecake, and Mini Cupcakes at a discounted price.", image: "../assets/images/promotionD.jpg", price: 140 },
        { name: "Dessert Table Package E", description: "Combination of Mini Cheese Tart, Bite-size Cake, Cream Puff, and Fruit Tart at a discounted price.", image: "../assets/images/promotionE.jpg", price: 135 },
        { name: "Dessert Table Package F", description: "Combination of Sponge Cake, Moist Cake, Cream Puff, and Cheese Tart at a discounted price.", image: "../assets/images/promotionF.jpg", price: 125 },
        { name: "Dessert Table Package G", description: "Combination of Bite-size Cake, Moist Cake, Cream Puff, and Cheese Tart at a discounted price.", image: "../assets/images/promotionG.jpg", price: 117 }
    ]
};

// Function to navigate to the selected category in the middle section
function navigateToCategory(categoryName) {
    const middleSection = document.getElementById('middleSection');
    const selectedCategory = categories[categoryName.toLowerCase()];

    middleSection.innerHTML = `<h2>${categoryName}</h2>`;

    selectedCategory.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.classList.add('product-item');
        productDiv.innerHTML = `
            <img src="../assets/images/${product.name.toLowerCase().replace(/ /g, '_')}.jpg" alt="${product.name}">
            <h3>${product.name}</h3>
            <button class="customize-btn" onclick="addToCart('${product.name}', 'images/${product.name.toLowerCase().replace(/ /g, '_')}.jpg', '${product.description || ''}')">
                <i class="fas fa-plus"></i>
            </button>
        `;
        middleSection.appendChild(productDiv);
    });
}

function showCategory(category) {
    const middleSection = document.querySelector('.middle-section');
    const items = categories[category.toLowerCase()] || [];

    // Clear and populate middle section
    middleSection.innerHTML = `
        <h2>${category.charAt(0).toUpperCase() + category.slice(1)}</h2>
        <div class="category-list">
            ${items.length > 0
                ? items.map(item => `
                    <div class="category-item">
                        <img src="${item.image}" alt="${item.name}" class="category-image">
                        <div class="category-details">
                            <h3>${item.name}</h3>
                            <p>${item.description}</p>
                            <p><strong>Price: $${item.price.toFixed(2)}</strong></p>
                        </div>
                        <button class="customize-btn" onclick="addToCart('${item.name}', '${item.image}', '${item.description}', ${item.price})">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                `).join('')
                : '<p>No items available in this category.</p>'
            }
        </div>
    `;
}




    // Add item to cart
    function addToCart(itemName, itemImage = '', itemDescription = '', itemPrice = 10.00) {
        const cartItemsContainer = document.getElementById('right-cart-items');
        const cartTotalElement = document.getElementById('right-cart-total');

        // Check if the item already exists in the cart
        let existingItem = cartItemsContainer.querySelector(`[data-item-name="${itemName}"]`);
        if (existingItem) {
            // Update quantity
            const quantityElement = existingItem.querySelector('.item-quantity');
            let quantity = parseInt(quantityElement.textContent);
            quantity++;
            quantityElement.textContent = quantity;

            // Update price
            const itemPriceElement = existingItem.querySelector('.item-price');
            let updatedPrice = quantity * itemPrice;
            itemPriceElement.textContent = `$${updatedPrice.toFixed(2)}`;
        } else {
            // Create new cart item
            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item');
            cartItem.setAttribute('data-item-name', itemName);
            cartItem.innerHTML = `
                <img src="${itemImage}" alt="${itemName}" class="cart-item-image">
                <div class="cart-item-details">
                    <h3>${itemName}</h3>
                    <p>${itemDescription}</p>
                    <p>Price: <span class="item-price">$${itemPrice.toFixed(2)}</span></p>
                    <p>Quantity: <span class="item-quantity">1</span></p>
                </div>
                <button class="remove-btn" onclick="removeFromCart('${itemName}', ${itemPrice})">Remove</button>
            `;
            cartItemsContainer.appendChild(cartItem);
        }

        // Update total price
        updateCartTotal(itemPrice);
    }

    // Remove item from cart
    function removeFromCart(itemName, itemPrice) {
        const cartItemsContainer = document.getElementById('right-cart-items');
        const cartItem = cartItemsContainer.querySelector(`[data-item-name="${itemName}"]`);
        if (cartItem) {
            const quantityElement = cartItem.querySelector('.item-quantity');
            let quantity = parseInt(quantityElement.textContent);

            if (quantity > 1) {
                // Decrease quantity
                quantity--;
                quantityElement.textContent = quantity;

                // Update price
                const itemPriceElement = cartItem.querySelector('.item-price');
                let updatedPrice = quantity * itemPrice;
                itemPriceElement.textContent = `$${updatedPrice.toFixed(2)}`;
            } else {
                // Remove item if quantity is 1
                cartItem.remove();
            }

            // Update total price
            updateCartTotal(-itemPrice);
        }
    }

    // Update total price
    function updateCartTotal(change) {
        const cartTotalElement = document.getElementById('right-cart-total');
        let currentTotal = parseFloat(cartTotalElement.textContent.replace('$', '')) || 0;
        let newTotal = currentTotal + change;
        cartTotalElement.textContent = `$${newTotal.toFixed(2)}`;
    }


function searchCategories() {
    const input = document.getElementById('categorySearchInput').value.toLowerCase();
    const middleSection = document.querySelector('.middle-section');
    middleSection.innerHTML = ''; // Clear the current content

    // Filter and display matching categories
    for (const category in categories) {
        const items = categories[category].filter(item => 
            item.name.toLowerCase().includes(input) || 
            item.description.toLowerCase().includes(input)
        );

        if (items.length > 0) {
            middleSection.innerHTML += `
                <h2>${category.charAt(0).toUpperCase() + category.slice(1)}</h2>
                <div class="category-list">
                    ${items.map(item => `
                        <div class="category-item">
                            <img src="${item.image}" alt="${item.name}" class="category-image">
                            <div class="category-details">
                                <h3>${item.name}</h3>
                                <p>${item.description}</p>
                                <p><strong>Price: $${item.price.toFixed(2)}</strong></p>
                            </div>
                            <button class="customize-btn" onclick="addToCart('${item.name}', '${item.image}', '${item.description}', ${item.price})">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    `).join('')}
                </div>
            `;
        }
    }

    // If no results, display a message
    if (!middleSection.innerHTML) {
        middleSection.innerHTML = `<h2>No items match your search.</h2>`;
    }
}


</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('fetch_product.php')
            .then(response => response.json())
            .then(products => {
                const container = document.getElementById('order-more-container');
                products.forEach(product => {
                    const productDiv = document.createElement('div');
                    productDiv.className = 'order-more-item';
                    productDiv.innerHTML = `
                        <img src="../assets/images/${product.image}" alt="${product.name}" class="order-more-image">
                        <div class="order-more-details">
                            <h3>${product.name}</h3>
                            <p>${product.description}</p>
                        </div>
                        <button class="customize-btn" onclick="addToCart('${product.name}')">
                            <i class="fas fa-plus"></i>
                        </button>
                    `;
                    container.appendChild(productDiv);
                });
            })
            .catch(error => console.error('Error fetching products:', error));
    });
    </script>

</body>
</html>
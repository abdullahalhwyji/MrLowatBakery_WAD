const cart = [
    { name: "Burnt Cheesecake", quantity: 1, price: 15 },
    { name: "Chocolate Tart", quantity: 2, price: 10 },
];

const cartContainer = document.getElementById("cart-container");
const subtotalElement = document.getElementById("subtotal");
const discountElement = document.getElementById("discount");
const taxesElement = document.getElementById("taxes");
const totalElement = document.getElementById("total");
const checkoutButton = document.getElementById("checkout-button");

const deliveryFee = 4.00;
const taxRate = 0.06;
const discountRate = 0.10;

function calculateSummary() {
    let subtotal = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
    let discount = subtotal * discountRate;
    let taxes = (subtotal - discount) * taxRate;
    let total = subtotal - discount + taxes + deliveryFee;

    subtotalElement.textContent = subtotal.toFixed(2);
    discountElement.textContent = discount.toFixed(2);
    taxesElement.textContent = taxes.toFixed(2);
    totalElement.textContent = total.toFixed(2);

    // Enable the checkout button only if the cart has items
    checkoutButton.disabled = cart.length === 0;
    if (cart.length > 0) {
        checkoutButton.textContent = 'Proceed to Payment';  // Change button text
    }
}

function renderCart() {
    cartContainer.innerHTML = "";
    cart.forEach((item, index) => {
        const div = document.createElement("div");
        div.innerHTML = `
            <p>${item.name} (x${item.quantity}) - $${item.price * item.quantity}</p>
            <button onclick="removeItem(${index})"><i class="fas fa-trash-alt"></i></button>
        `;
        cartContainer.appendChild(div);
    });
    calculateSummary();
}

function removeItem(index) {
    cart.splice(index, 1);
    renderCart();
}

document.getElementById("clear-cart").addEventListener("click", () => {
    cart.length = 0;
    renderCart();
});

// Handle checkout button click to redirect to payment page
checkoutButton.addEventListener("click", function() {
    if (cart.length > 0) {
        window.location.href = "payment.html";  // Redirect to payment page
    }
});

// Initial render of the cart
renderCart();

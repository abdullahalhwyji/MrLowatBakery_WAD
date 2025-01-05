// payment.js

document.getElementById('submit-payment').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent page reload on form submission

    // Get form values
    const paymentMethod = document.getElementById('payment-method').value;
    const deliveryTime = document.getElementById('delivery-time').value;
    const address = document.getElementById('address').value;
    const instructions = document.getElementById('instructions').value;

    // Basic validation: Check if required fields are filled
    if (!deliveryTime || !address) {
        alert("Please fill out all required fields.");
    } else {
        // Here, you would typically submit the data to a server, for now, we just show an alert
        alert(`
            Order Summary:
            Payment Method: ${paymentMethod}
            Delivery Time: ${deliveryTime}
            Delivery Address: ${address}
            Special Instructions: ${instructions || "None"}
        `);

        // Optionally, redirect the user to a confirmation page or thank you page
        window.location.href = "thank-you.html"; // Replace with your actual thank-you or confirmation page
    }
});

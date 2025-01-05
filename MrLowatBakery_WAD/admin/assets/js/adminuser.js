const members = [
  {
    id: 1,
    name: "John Doe",
    email: "john.doe@example.com",
    phone: "123-456-7890",
    address: "123 Main Street",
    orders: [
      { orderId: "A001", item: "Cake", quantity: 2, price: "$20", status: "Completed" },
      { orderId: "A002", item: "Pastry", quantity: 1, price: "$5", status: "Pending" }
    ]
  },
  {
    id: 2,
    name: "Jane Smith",
    email: "jane.smith@example.com",
    phone: "987-654-3210",
    address: "456 Elm Street",
    orders: [
      { orderId: "B001", item: "Cupcake", quantity: 3, price: "$15", status: "Completed" },
      { orderId: "B002", item: "Donut", quantity: 5, price: "$10", status: "Shipped" }
    ]
  }
];

const memberList = document.getElementById("member-list");
const detailsContent = document.getElementById("details-content");
const orderHistory = document.getElementById("order-history");
const orderList = document.getElementById("order-list");

// Populate the member list
members.forEach((member) => {
  const row = document.createElement("tr");
  row.innerHTML = `
    <td>${member.name}</td>
    <td>${member.email}</td>
    <td><button onclick="showMemberDetails(${member.id})">View Details</button></td>
  `;
  memberList.appendChild(row);
});

// Show member details and order history
function showMemberDetails(id) {
  const member = members.find((m) => m.id === id);

  // Show member details
  detailsContent.innerHTML = `
    <p><strong>Name:</strong> ${member.name}</p>
    <p><strong>Email:</strong> ${member.email}</p>
    <p><strong>Phone:</strong> ${member.phone}</p>
    <p><strong>Address:</strong> ${member.address}</p>
  `;

  // Show order history
  orderHistory.style.display = "block";
  orderList.innerHTML = ""; // Clear previous data
  member.orders.forEach((order) => {
    const orderRow = document.createElement("tr");
    orderRow.innerHTML = `
      <td>${order.orderId}</td>
      <td>${order.item}</td>
      <td>${order.quantity}</td>
      <td>${order.price}</td>
      <td>${order.status}</td>
    `;
    orderList.appendChild(orderRow);
  });
}
// Logout function
    function logout() {
        alert('Logged out successfully!');
        window.location.href = 'index.html'; // Redirect to homepage
    }

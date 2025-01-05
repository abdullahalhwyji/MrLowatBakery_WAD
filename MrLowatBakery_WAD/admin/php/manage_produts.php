<?php
session_start();
include 'connection.php'; // Include database connection

$query = "SELECT * FROM products"; // Adjust query as needed
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr data-id='{$row['id']}'>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['price']}</td>
                <td>{$row['stock']}</td>
                <td>{$row['category']}</td>
                <td><img src='{$row['image_url']}' alt='{$row['name']}' width='50'></td>
                <td>
                    <button class='edit-button' data-id='{$row['id']}'>Edit</button>
                    <button class='delete-button' data-id='{$row['id']}'>Delete</button>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No products found</td></tr>";
}
?>
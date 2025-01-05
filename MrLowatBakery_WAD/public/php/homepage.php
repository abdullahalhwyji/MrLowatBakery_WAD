<?php
// Start the session
session_start();

include 'connection.php'; // Include database connection

// Fetch categories from the database
function getCategories($conn) {
    $query = "SELECT DISTINCT category FROM products ORDER BY category ASC";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Fetch products based on category (if provided)
function getProducts($conn, $category = null) {
    $query = "SELECT * FROM products";
    if ($category) {
        $query .= " WHERE category = '" . mysqli_real_escape_string($conn, $category) . "'";
    }
    $query .= " ORDER BY name ASC";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Add item to cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }

    header('Location: homepage.php');
    exit;
}

$categories = getCategories($conn);
$selected_category = isset($_GET['category']) ? $_GET['category'] : null;
$products = getProducts($conn, $selected_category);
?>
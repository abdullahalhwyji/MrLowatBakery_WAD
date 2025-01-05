<?php
session_start();
include 'connection.php'; // Include database connection

// Fetch categories and products
function getCategories($conn) {
    $query = "SELECT DISTINCT category FROM products ORDER BY category ASC";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getProducts($conn, $category = null) {
    $query = "SELECT * FROM products";
    if ($category) {
        $query .= " WHERE category = '" . mysqli_real_escape_string($conn, $category) . "'";
    }
    $query .= " ORDER BY name ASC";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

$categories = getCategories($conn);
$selected_category = isset($_GET['category']) ? $_GET['category'] : null;
$products = getProducts($conn, $selected_category);

include 'header.php'; // Include header HTML
?>

<div id="middleSection">
    <?php foreach ($products as $product): ?>
        <div class="product">
            <h2><?php echo htmlspecialchars($product['name']); ?></h2>
            <p><?php echo htmlspecialchars($product['description']); ?></p>
            <p>Price: RM <?php echo number_format($product['price'], 2); ?></p>
            <form action="add_to_cart.php" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                <input type="number" name="quantity" value="1" min="1">
                <button type="submit">Add to Cart</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'footer.php'; // Include footer HTML ?>

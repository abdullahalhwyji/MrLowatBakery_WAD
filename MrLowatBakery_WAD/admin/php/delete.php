<?php
include '../../public/php/connection.php'; // Include database connection

if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    $stmt = $conn->prepare("DELETE FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Product deleted successfully');
                window.location.href = '../pages/adminhomepage.php';
            </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
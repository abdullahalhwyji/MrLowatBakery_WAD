<?php
session_start();
include '../../public/php/connection.php'; // Include database connection

$name = $_POST['name'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$category = $_POST['category'];

if(isset($_POST["add-product"])){

    $targetDirectory = "../../public/assets/images/"; // Target directory
            
    // Get the file name and target path
    $fileName = time()."_".basename($_FILES['image_url']['name']);
    $targetFilePath = $targetDirectory . $fileName;

    // Get the file type (MIME type)
    $fileType = mime_content_type($_FILES['image_url']['tmp_name']);

    // You can add your own conditions here to limit allowed file types
    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png']; // Example for images and PDFs

    if (in_array($fileType, $allowedTypes)) {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['image_url']['tmp_name'], $targetFilePath)) {
            // Insert the product into the database
            $sql = "INSERT INTO products (name, price, stock, category, image_url) VALUES ('$name', '$price', '$stock', '$category', '$fileName')";
            $result = $conn->query($sql);

            if ($result) {
                echo "<script>
                    alert('Product added successfully');
                    window.location.href = '../pages/adminhomepage.php';
                </script>";
            } else {
                $_SESSION['error'] = "Failed to add product";
                header("Location: ../add_product.php");
            }
        } else {
            echo "<script>
                alert('Error!');
                window.location.href = '../pages/adminhomepage.php';
            </script>";
        }
    }

}

if(isset($_POST["edit-product"])){

    $product_id = $_POST["product_id"];
    $sql = "UPDATE products SET name='$name', price='$price', stock='$stock', category='$category' WHERE product_id = '$product_id'";
    $result = $conn->query($sql);

    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == 0) {

        $targetDirectory = "../../public/assets/images/"; // Target directory
            
        // Get the file name and target path
        $fileName = time()."_".basename($_FILES['image_url']['name']);
        $targetFilePath = $targetDirectory . $fileName;

        // Get the file type (MIME type)
        $fileType = mime_content_type($_FILES['image_url']['tmp_name']);

        // You can add your own conditions here to limit allowed file types
        $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png']; // Example for images and PDFs

        if (in_array($fileType, $allowedTypes)) {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES['image_url']['tmp_name'], $targetFilePath)) {
                // Insert the product into the database
                $sql2 = "UPDATE products SET image_url = '$fileName' WHERE product_id = '$product_id'";
                $result2= $conn->query($sql2);  
            } 
        }
    }

    if ($result) {
        echo "<script>
            alert('Product edited successfully');
            window.location.href = '../pages/adminhomepage.php';
        </script>";
    } else {
        echo "<script>
            alert('Error!');
            window.location.href = '../pages/adminhomepage.php';
        </script>";
    }

}

?>
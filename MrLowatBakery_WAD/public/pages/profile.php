<?php
session_start();
include('../php/connection.php');

if(!isset($_SESSION["user_id"])){
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Mr. Lowat Bakery</title>
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
        <a href="../pages/index.php">
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
<main>
    <div class="profile-container">
        <div class="profile-card">
            <h1>Your Profile</h1>
            <div class="profile-info">
                <div class="info-item">
                    <i class="fas fa-user-circle"></i>
                    <strong>Name:</strong>
                    <span id="profileName"><?=$row["name"];?></span>
                </div>
                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <strong>Email:</strong>
                    <span id="profileEmail"><?=$row["email"];?></span>
                </div>
                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <strong>Address:</strong>
                    <span id="profileAddress"><?=$row["address"];?></span>
                </div>
                <div class="info-item">
                    <i class="fas fa-phone"></i>
                    <strong>Telephone:</strong>
                    <span id="profileTel"><?=$row["tel"];?></span>
                </div>
            </div>
            <a href="../pages/profileedit.php" class="edit-btn">Edit Profile</a>
        </div>
    </div>
</main>

<footer>
    <p>&copy; 2024 Mr. Lowat Bakery. All rights reserved.</p>
</footer>

<script src="../assets/js/scripts.js"></script>
</body>
</html>

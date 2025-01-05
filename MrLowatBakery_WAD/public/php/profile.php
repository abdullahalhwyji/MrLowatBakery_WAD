<?php
session_start();
include 'connection.php'; // Include database connection

$user_id = $_SESSION['user_id']; // Assuming user ID is stored in session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update user profile logic here (e.g., updating name, email)
}

$query = "SELECT * FROM users WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

include 'header.php'; // Include header HTML

?>

<h2>Your Profile</h2>
<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>">
    
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
    
    <label>Address:</label>
    <input type="text" name="address" value="<?php echo htmlspecialchars($user['address']); ?>">
    
    <label>Phone:</label>
    <input type="text" name="tel" value="<?php echo htmlspecialchars($user['tel']); ?>">
    
    <button type="submit">Update Profile</button>
</form>

<?php include 'footer.php'; // Include footer HTML ?>

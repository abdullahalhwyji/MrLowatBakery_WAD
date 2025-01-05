<?php //BELUM TRY SEND EMAIL
include_once 'connection.php'; // Include database connection file

$error = ''; // Initialize error as blank

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Check if email exists
    $stmt = $conn->prepare("SELECT id, name FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name);
        $stmt->fetch();

        // Generate unique token
        $token = bin2hex(random_bytes(32));
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // Store token in the database
        $tokenStmt = $conn->prepare("INSERT INTO password_resets (user_id, token, expires_at) VALUES (?, ?, ?)");
        $tokenStmt->bind_param("iss", $id, $token, $expiry);
        $tokenStmt->execute();

        // Send reset email
        $resetLink = "http://yourdomain.com/resetPassword.php?token=$token"; // CHANGE THIS TO YOUR DOMAIN
        $subject = "Password Reset Request";
        $message = "Dear $name,\n\n";
        $message .= "We received a request to reset your password. Click the link below to reset your password:\n";
        $message .= "$resetLink\n\n";
        $message .= "If you didn't request this, you can safely ignore this email.\n\n";
        $message .= "Best regards,\nMr. Lowat Bakery Team";

        $headers = "From: no-reply@mrlowatbakery.com\r\n";
        $headers .= "Reply-To: support@mrlowatbakery.com\r\n";

        if (mail($email, $subject, $message, $headers)) {
            $success = "A password reset link has been sent to your email.";
        } else {
            $error = "Failed to send the reset link. Please try again.";
        }
    } else {
        $error = "No account found with that email.";
    }
}
?>

<!-- HTML code for forgotPassword.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password - Mr. Lowat Bakery</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <header>
    <nav>
      <h1>Mr. Lowat Bakery</h1>
      <div class="nav-links">
        <ul>
          <li><a href="../pages/index.html"><i class="fas fa-home"></i> Home</a></li>
          <li><a href="#"><i class="fas fa-cake"></i> Menu</a></li>
          <li><a href="../pages/register.html"><i class="fas fa-user"></i> Register</a></li>
          <li><a href="../pages/login.html"><i class="fas fa-sign-in-alt"></i> Login</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <main>
    <form id="forgotPasswordForm" method="POST" action="">
      <h1>Forgot Password</h1>
      <p>Enter your email address to receive a password reset link.</p>

      <?php if (isset($success)): ?>
        <p style="color: green;"><?= htmlspecialchars($success) ?></p>
      <?php elseif (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
      <?php endif; ?>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Your email" required>
      </div>

      <button type="submit">Send Reset Link</button>
      <p>Remember your password? <a href="../pages/login.html">Login here</a>.</p>
    </form>
  </main>

  <footer>
    <p>&copy; 2024 Mr. Lowat Bakery. All rights reserved.</p>
  </footer>
</body>
</html>

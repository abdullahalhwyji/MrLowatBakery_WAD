<?php

include_once 'connection.php'; // Include database connection file

$error = ''; // Initialize error as blank

session_start(); // Start session to store user data if login is successful

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input
    if (empty($email) || empty($password)) {
        $error = "Please fill in all fields.";
    } else {
        // Query to check if user exists
        $stmt = $conn->prepare("SELECT id, name, password, role FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $name, $hashedPassword, $role);
            $stmt->fetch();

            // Verify password
            if (password_verify($password, $hashedPassword)) {
                // Store user data in session
                $_SESSION['user_id'] = $id;
                $_SESSION['name'] = $name;
                $_SESSION['role'] = $role;

                // Redirect based on role
                if ($role === 'admin') {
                    header("Location: adminhomepage.php"); // Redirect to admin homepage
                } else {
                    header("Location: user_dashboard.php"); // Redirect to user dashboard (TUKAR KLK)
                }
                exit;
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "No account found with that email.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Mr. Lowat Bakery</title>
  <link rel="stylesheet" href="../assets/style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <header>
    <nav>
        <h1>Mr. Lowat Bakery</h1>
        <div class="nav-links">
          <ul>
            <li><a href="../pages/index.html"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="#"><i class="fas fa-cake"></i>Menu</a></li>
            <li><a href="https://api.whatsapp.com/send/?phone=60164025451"><i class="fas fa-phone"></i>Contact</a></li>
            <li><a href="../pages/register.html"><i class="fas fa-user"></i>Register</a></li>
          </ul>
        </div>
    </nav>
  </header>

  <main>
    <form id="loginForm" method="POST" action="">
      <h1>Login</h1>
      <p>Enter your email and password to access your account.</p>

      <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
      <?php endif; ?>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Your email" required>
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Your password" required>
      </div>

      <button type="submit">Login</button>
      <p>Forgot your password? <a href="../pages/forgotPassword.html">Reset here</a>.</p>
      <p>Don't have an account? <a href="../pages/register.html">Register here</a>.</p>
    </form>
  </main>

  <footer>
    <p>&copy; 2024 Mr. Lowat Bakery. All rights reserved.</p>
  </footer>

  <script src="../assets/js/scripts.js"></script>
</body>
</html>

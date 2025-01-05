<?php //THIS IS THE REGISTER.PHP FILE (ONLY THE PHP PART FOR REGISTER.HTML)
//TOK D PAKE

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input to prevent XSS
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $password = $_POST['password']; // Will be hashed, so no need to escape here
    $confirmPassword = $_POST['confirmPassword'];
    $address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');
    $tel = htmlspecialchars($_POST['tel'], ENT_QUOTES, 'UTF-8');

    // Check if passwords match
    if ($password !== $confirmPassword) {
        die("Passwords do not match!");
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format!");
    }

    // Validate telephone format (e.g., 10-digit numbers)
    if (!preg_match('/^[0-9]{10}$/', $tel)) {
        die("Invalid telephone number!");
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Database connection
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "mrlowatbakery";

    // Create connection with error handling
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO users (name, email, password, address, tel) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Statement preparation failed: " . $conn->error);
    }
    $stmt->bind_param("sssss", $name, $email, $hashedPassword, $address, $tel);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        echo "Registration successful! <a href='../pages/login.html'>Login here</a>";
    } else {
        echo "Error: " . htmlspecialchars($stmt->error, ENT_QUOTES, 'UTF-8');
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
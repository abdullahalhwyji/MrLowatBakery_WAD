<?php
include_once 'connection.php';

session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = "Please fill in all fields.";
    } else {
        $stmt = $conn->prepare("SELECT user_id, name, password, role FROM users WHERE email = ?");
        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($user_id, $name, $hashedPassword, $role);
                $stmt->fetch();

                if (password_verify($password, $hashedPassword)) {
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['name'] = $name;
                    $_SESSION['role'] = $role;

                    // Redirect based on role
                    header("Location: " . ($role === 'admin' ? "/MrLowatBakery_WAD/MrLowatBakery_WAD/admin/pages/adminhomepage.html" : "../pages/homepage.html"));
                    exit;
                } else {
                    $error = "Incorrect password.";
                }
            } else {
                $error = "No account found with that email.";
            }
        } else {
            $error = "Query failed: " . $conn->error;
        }
    }
}
?>

<?php
session_start();
include '../../public/php/connection.php'; // Include database connection

$query = "SELECT user_id, name, email FROM users";
$result = mysqli_query($conn, $query);

$users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

echo json_encode($users);
?>
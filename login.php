<?php
session_start();

require __DIR__ . '/backend/Database.php';

$title = "Admin Login – Raym Sneaker Store";
$description = "Login to access the Raym Sneaker Store admin dashboard.";

$conn  = Database::getInstance()->getConnection();
$error = "";

// Handle login BEFORE including header.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admins WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password_hash'])) {
        $_SESSION['admin_id']   = $admin['id'];
        $_SESSION['admin_name'] = $admin['name'];

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}

// Only now include header.php
include __DIR__ . '/includes/header.php';
?>

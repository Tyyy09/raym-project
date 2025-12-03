<?php
// Show errors during development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Use __DIR__ to ensure correct include paths
include __DIR__ . '/backend/Database.php';

$title = "Admin Login – Raym Sneaker Store";
$description = "Login to access the Raym Sneaker Store admin dashboard.";
include __DIR__ . '/includes/header.php';

$conn  = Database::getInstance()->getConnection();
$error = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT * FROM admins WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password_hash'])) {
            // Login successful → store session
            $_SESSION['admin_id']   = $admin['id'];
            $_SESSION['admin_name'] = $admin['name'];

            // Redirect to dashboard
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid email or password.";
        }
    } catch (PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }
}
?>

<main id="main">
    <section class="login">
        <h1>Admin Login</h1>
        <p>Please enter your credentials to access the admin dashboard.</p>

        <?php if (!empty($error)): ?>
            <p style="color:red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <?php if (isset($_GET['registered'])): ?>
            <p style="color:green;">Registration successful! Please log in.</p>
        <?php endif; ?>

        <form class="login-form" action="login.php" method="post">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button type="submit" class="btn">Login</button>
        </form>

        <p class="register-link">
            Don’t have an account? <a href="register.php">Register here</a>.
        </p>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

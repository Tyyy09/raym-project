<?php
session_start();

// Correct relative path — adjust depending on where Database.php is
include __DIR__ . '/backend/Database.php';

$title = "Admin Registration – Raym Sneaker Store";
$description = "Create a new admin account for the Raym Sneaker Store dashboard.";
include __DIR__ . '/includes/header.php';

$conn = Database::getInstance()->getConnection();
$error = "";
$success = "";


// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    if ($password !== $confirm) {
        $error = "Passwords do not match.";
    } else {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $conn->prepare("INSERT INTO admins (name, email, password_hash) 
                                    VALUES (:name, :email, :password_hash)");
            $stmt->execute([
                    ':name' => $name,
                    ':email' => $email,
                    ':password_hash' => $password_hash
            ]);
            // Redirect to login after success
            header("Location: login.php?registered=1");
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $error = "Email already exists.";
            } else {
                $error = "Database error: " . $e->getMessage();
            }
        }
    }
}
?>

<main id="main">
    <section class="register">
        <h1>Admin Registration</h1>
        <p>Fill out the form below to create your admin account.</p>

        <?php if (!empty($error)): ?>
            <p class="alertWrong"><?php echo htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <p class="alertCorrect"><?php echo htmlspecialchars($success) ?></p>
        <?php endif; ?>

        <form class="register-form" action="register.php" method="post">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter a password" required>

            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter your password" required>

            <button type="submit" class="btn">Register</button>
        </form>

        <p class="login-link">
            Already have an account? <a href="login.php">Login here</a>.
        </p>
    </section>
</main>

<?php include 'includes/footer.php'; ?>

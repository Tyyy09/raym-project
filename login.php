<?php
$title = "Admin Login – Raym Sneaker Store";
$description = "Login to access the Raym Sneaker Store admin dashboard.";
include 'includes/header.php';

?>

<main id="main">
    <section class="login">
        <h1>Admin Login</h1>
        <p>Please enter your credentials to access the admin dashboard.</p>

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

<?php include 'includes/footer.php'; ?>

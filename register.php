<?php
$title = "Admin Registration – Raym Sneaker Store";
$description = "Create a new admin account for the Raym Sneaker Store dashboard.";
include 'includes/header.php';
?>

<main id="main">
    <section class="register">
        <h1>Admin Registration</h1>
        <p>Fill out the form below to create your admin account.</p>

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


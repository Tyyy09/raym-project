<?php
$title = "Contact – Raym Sneaker Store";
$description = "Reach out to Raym Sneaker Store for inquiries, feedback, or support.";
include 'includes/header.php';
?>

<main id="main">
    <section class="contact">
        <h1>Contact Us</h1>
        <p>We’d love to hear from you! Whether you have questions about sneakers, orders, or collaborations, drop us a line.</p>

        <div class="contact-grid">
            <!-- Contact Info -->
            <div class="contact-info">
                <h2>Store Info</h2>
                <p><strong>Email:</strong> support@raymsneakers.com</p>
                <p><strong>Phone:</strong> (705) 123‑4567</p>
                <p><strong>Address:</strong> 123 Sneaker Street, Barrie, ON</p>

                <h3>Follow Us</h3>
                <ul class="social-links">
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                </ul>
            </div>

            <!-- Contact Form -->
            <div class="contact-form">
                <h2>Send a Message</h2>
                <form action="contact.php" method="post">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>

                    <label for="email">Your Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>

                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" placeholder="Write your message here..." required></textarea>

                    <button type="submit" class="btn">Send Message</button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>

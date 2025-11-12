<?php
$title = "Homepage – Raym Sneaker Store";
$description = "Exclusive sneakers curated for sneakerheads.";
include 'includes/header.php';
?>
<main id="main">
    <!-- Hero Section -->
    <section class="hero">
        <h1>Step Into Style</h1>
        <p>Discover the latest drops and timeless classics.</p>
        <a class="btn" href="shop.php">Shop Sneakers</a>
    </section>
    <section class="cta">
        <h2>Ready to Elevate Your Style?</h2>
        <p>Browse our full collection of exclusive sneakers and find your perfect pair today.</p>
    </section>
    <!-- Featured Sneakers -->
    <section class="featured">
        <h2>Featured Sneakers</h2>
        <div class="grid">
            <!-- Card 1 -->
            <article class="card">
                <div class="card-image">
                    <img src="images/assets/nike-air-max.jpg" alt="Nike Air Max">
                </div>
                <div class="card-content">
                    <h3>Nike Air Max</h3>
                    <p class="price">$180.00</p>
                    <a href="product.php" class="btn">View Product</a>
                </div>
            </article>

            <!-- Card 2 -->
            <article class="card">
                <div class="card-image">
                    <img src="images/assets/air-jordan-1.jpg" alt="Air Jordan 1">
                </div>
                <div class="card-content">
                    <h3>Air Jordan 1</h3>
                    <p class="price">$220.00</p>
                    <a href="product.php" class="btn">View Product</a>
                </div>
            </article>

            <!-- Card 3 -->
            <article class="card">
                <div class="card-image">
                    <img src="images/assets/yeezy.jpg" alt="Yeezy Boost 350">
                </div>
                <div class="card-content">
                    <h3>Yeezy Boost 350</h3>
                    <p class="price">$250.00</p>
                    <a href="product.php" class="btn">View Product</a>
                </div>
            </article>

            <!-- Card 4 -->
            <article class="card">
                <div class="card-image">
                    <img src="images/assets/reebox-vintage.jpg" alt="Reebox C85 Vintage">
                </div>
                <div class="card-content">
                    <h3>Reebox C85 Vintage</h3>
                    <p class="price">$130.00</p>
                    <a href="product.php" class="btn">View Product</a>
                </div>
            </article>

            <!-- Card 5 -->
            <article class="card">
                <div class="card-image">
                    <img src="images/assets/samba.jpg" alt="Adidas Samba OG">
                </div>
                <div class="card-content">
                    <h3>Adidas Samba OG</h3>
                    <p class="price">$140.00</p>
                    <a href="product.php" class="btn">View Product</a>
                </div>
            </article>

            <!-- Card 6 -->
            <article class="card">
                <div class="card-image">
                    <img src="images/assets/dunk-low.jpg" alt="Nike Dunk Low Panda">
                </div>
                <div class="card-content">
                    <h3>Nike Dunk Low</h3>
                    <p class="price">$160.00</p>
                    <a href="product.php" class="btn">View Product</a>
                </div>
            </article>
        </div>
    </section>
    <!-- Login CTA -->
    <section class="cta-login">
        <h2>Already a Member?</h2>
        <p>Log in to manage your orders, wishlist, and exclusive offers.</p>
        <a href="login.php" class="btn btn-large">Login</a>
    </section>

</main>
<?php include 'includes/footer.php'; ?>

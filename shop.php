<?php
$title = "Shop – Raym Sneaker Store";
$description = "Browse our full collection of sneakers from top brands.";
include __DIR__ . '/includes/header.php';
include __DIR__ . '/backend/Database.php';

// Get DB connection
$conn = Database::getInstance()->getConnection();

// Fetch all sneakers
$stmt = $conn->query("SELECT name, price, image_path, slug FROM sneakers ORDER BY name ASC");
$sneakers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main id="main">
    <!-- Banner Section -->
    <section class="shop-banner">
        <div class="banner-content">
            <h1>Step Into Style</h1>
            <p>Discover the latest sneakers from Adidas, Nike, and more.</p>
            <a href="#sneaker-grid" class="btn btn-large">Shop Now</a>
        </div>
    </section>
    <!-- Shoes Section -->
    <section class="featured">
        <h2>Our Collection</h2>
        <div id="sneaker-grid" class="grid">

            <?php if ($sneakers): ?>
                <?php foreach ($sneakers as $s): ?>
                    <article class="card">
                        <div class="card-image">
                            <img src="<?= htmlspecialchars($s['image_path']) ?>"
                                 alt="<?= htmlspecialchars($s['name']) ?>">
                        </div>
                        <div class="card-content">
                            <h3 class="card-title"><?= htmlspecialchars($s['name']) ?></h3>
                            <p class="price">$<?= htmlspecialchars($s['price']) ?> CAD</p>
                            <a href="product.php?slug=<?= urlencode($s['slug']) ?>" class="btn">Buy Now</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="product-error">No sneakers available at the moment.</p>
            <?php endif; ?>

        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

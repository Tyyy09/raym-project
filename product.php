<?php
$title = "Product – Raym Sneaker Store";
$description = "Detailed sneaker information and purchase options.";
include __DIR__ . '/includes/header.php';
include __DIR__ . '/backend/Database.php';

// DB connection
$conn = Database::getInstance()->getConnection();

// Get slug
$slug = $_GET['slug'] ?? null;
$product = null;

if ($slug) {
    $stmt = $conn->prepare("SELECT * FROM sneakers WHERE slug = :slug");
    $stmt->bindParam(":slug", $slug, PDO::PARAM_STR);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<main id="main">
    <section class="product-section container">
        <h2 class="product-name"><?php echo htmlspecialchars($product['name']); ?></h2>

        <article class="product-layout">
            <!-- Left: Product Image -->
            <figure class="product-image">
                <img src="<?php echo htmlspecialchars($product['image_path']); ?>"
                     alt="<?php echo htmlspecialchars($product['name']); ?>">
            </figure>

            <!-- Right: Product Info -->
            <div class="product-info">
                <p class="brand">Brand: <span><?php echo htmlspecialchars($product['brand']); ?></span></p>
                <p class="priceP">$<?php echo htmlspecialchars($product['price']); ?> CAD</p>
                <p class="description"><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>

                <ul class="specs">
                    <li><strong>Color:</strong> <?php echo htmlspecialchars($product['color'] ?? 'Varies'); ?></li>
                    <li><strong>Material:</strong> <?php echo htmlspecialchars($product['material'] ?? 'Leather/Textile'); ?></li>
                    <li><strong>Release Year:</strong> <?php echo htmlspecialchars($product['release_year'] ?? '2025'); ?></li>
                </ul>

                <div class="size-select-group">
                    <label for="size">Choose Size:</label>
                    <select id="size" name="size">
                        <option value="" disabled selected>-- Select a size --</option>
                        <?php foreach (['7','8','9','10','11','12'] as $size): ?>
                            <option value="<?php echo $size; ?>"><?php echo $size; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button class="btn add-to-cart"
                        onclick="const s=document.getElementById('size').value
                                if(s){alert('Successfully Buy: <?php echo htmlspecialchars($product['name']); ?>, Size ' + s);}
                                else{alert('Please select a size first.');}">
                    Buy Now
                </button>
            </div>
        </article>
    </section>
</main>



<?php include __DIR__ . '/includes/footer.php'; ?>

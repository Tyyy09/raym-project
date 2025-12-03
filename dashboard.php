<?php
session_start();

// Protect the dashboard: only logged-in admins can see it
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../login.php");
    exit;
}

$title = "Admin Dashboard – Raym Sneaker Store";
$description = "Welcome to the Raym Sneaker Store admin dashboard.";
include __DIR__ . '/includes/header.php';
include __DIR__ . '/backend/Database.php';

// DB connection
$conn = Database::getInstance()->getConnection();

// Fetch sneakers
$query = "SELECT * FROM sneakers ORDER BY created_at DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$sneakers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main id="main" class="dashboard-main">
    <section class="dashboard-section">
        <!-- Welcome + Navigation -->
        <h1 class="dashboard-title">
            Welcome, <?= htmlspecialchars($_SESSION['admin_name']); ?>!
        </h1>
        <p class="dashboard-subtitle">
            You are now logged in to the admin dashboard.
        </p>

        <nav class="dashboard-nav">
            <ul class="dashboard-menu">
                <li class="dashboard-menu-item">
                    <a href="backend/logout.php" class="dashboard-link logout-link">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Sneaker List -->
        <h2 class="dashboard-title">Manage Sneaker List</h2>
        <a href="backend/add_product.php" class="btn-add">Add Sneaker</a>
        <table class="sneaker-table">
            <thead>
            <tr>
                <th class="col-id">ID</th>
                <th class="col-name">Name</th>
                <th class="col-brand">Brand</th>
                <th class="col-price">Price</th>
                <th class="col-actions">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($sneakers as $sneaker): ?>
                <tr>
                    <td><?= htmlspecialchars($sneaker['id']); ?></td>
                    <td><?= htmlspecialchars($sneaker['name']); ?></td>
                    <td><?= htmlspecialchars($sneaker['brand']); ?></td>
                    <td>$<?= htmlspecialchars($sneaker['price']); ?></td>
                    <td>
                        <a href="backend/update_product.php?id=<?= $sneaker['id']; ?>" class="btn-edit">Edit</a>
                        <a href="backend/delete_product.php?id=<?= $sneaker['id']; ?>" class="btn-delete"
                           onclick="return confirm('Are you sure you want to delete this sneaker?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

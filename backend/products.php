<?php
include 'Database.php';
$conn = Database::getInstance()->getConnection();

$query = "SELECT * FROM sneakers ORDER BY created_at DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$sneakers = $stmt->fetchAll();
?>

<h1 class="sneaker-title">Sneaker List</h1>
<a href="add_product.php" class="btn-add">Add Sneaker</a>

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
            <td><?php echo htmlspecialchars($sneaker['id']); ?></td>
            <td><?php echo htmlspecialchars($sneaker['name']); ?></td>
            <td><?php echo htmlspecialchars($sneaker['brand']); ?></td>
            <td>$<?php echo htmlspecialchars($sneaker['price']); ?></td>
            <td>
                <a href="update_product.php?id=<?php echo $sneaker['id']; ?>" class="btn-edit">Edit</a>
                <a href="delete_product.php?id=<?php echo $sneaker['id']; ?>" class="btn-delete">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<?php
include 'Database.php';
$conn = Database::getInstance()->getConnection();

if ($_POST) {
    $slug = strtolower(str_replace(' ', '-', $_POST['name']));
    $query = "INSERT INTO sneakers (name, brand, slug, description, price, image_path)
              VALUES (:name, :brand, :slug, :description, :price, :image_path)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":name", $_POST['name']);
    $stmt->bindParam(":brand", $_POST['brand']);
    $stmt->bindParam(":slug", $slug);
    $stmt->bindParam(":description", $_POST['description']);
    $stmt->bindParam(":price", $_POST['price']);
    $stmt->bindParam(":image_path", $_POST['image_path']);
    if ($stmt->execute()) {
        header("Location: products.php");
        exit;
    } else {
        echo "Error adding sneaker.";
    }
}
?>

<h1>Add Sneaker</h1>
<form method="post">
    <label>Name:</label><input type="text" name="name" required><br>
    <label>Brand:</label><input type="text" name="brand" required><br>
    <label>Description:</label><textarea name="description"></textarea><br>
    <label>Price:</label><input type="number" step="0.01" name="price" required><br>
    <label>Image Path:</label><input type="text" name="image_path" required><br>
    <button type="submit">Add Sneaker</button>
</form>

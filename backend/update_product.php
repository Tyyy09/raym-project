<?php
include 'Database.php';
$conn = Database::getInstance()->getConnection();

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM sneakers WHERE id = :id");
$stmt->bindParam(":id", $id);
$stmt->execute();
$sneaker = $stmt->fetch();

if ($_POST) {
    $slug = strtolower(str_replace(' ', '-', $_POST['name']));
    $update = "UPDATE sneakers 
               SET name = :name, brand = :brand, slug = :slug, description = :description, 
                   price = :price, image_path = :image_path 
               WHERE id = :id";
    $stmt = $conn->prepare($update);
    $stmt->bindParam(":name", $_POST['name']);
    $stmt->bindParam(":brand", $_POST['brand']);
    $stmt->bindParam(":slug", $slug);
    $stmt->bindParam(":description", $_POST['description']);
    $stmt->bindParam(":price", $_POST['price']);
    $stmt->bindParam(":image_path", $_POST['image_path']);
    $stmt->bindParam(":id", $id);
    if ($stmt->execute()) {
        header("Location: products.php");
        exit;
    } else {
        echo "Error updating sneaker.";
    }
}
?>

<h1>Edit Sneaker</h1>
<form method="post">
    <label>Name:</label><input type="text" name="name" value="<?php echo htmlspecialchars($sneaker['name']) ?>"><br>
    <label>Brand:</label><input type="text" name="brand" value="<?php echo htmlspecialchars($sneaker['brand']) ?>"><br>
    <label>Description:</label><textarea name="description"><?php echo htmlspecialchars($sneaker['description']) ?></textarea><br>
    <label>Price:</label><input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($sneaker['price']) ?>"><br>
    <label>Image Path:</label><input type="text" name="image_path" value="<?php echo htmlspecialchars($sneaker['image_path']) ?>"><br>
    <button type="submit">Update Sneaker</button>
</form>

<?php
include 'Database.php';
$conn = Database::getInstance()->getConnection();

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM sneakers WHERE id = :id");
$stmt->bindParam(":id", $id);

if ($stmt->execute()) {
    header("Location: products.php");
    exit;
} else {
    echo "Error deleting sneaker.";
}
?>

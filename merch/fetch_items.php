<?php
// Include the database connection file
include '../config.php';

try {
    // Prepare and execute the SQL query to fetch 'id', 'name', and 'price'
    $stmt = $conn->prepare("SELECT id, name, price FROM items");
    $stmt->execute();

    // Fetch all the data as an associative array
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
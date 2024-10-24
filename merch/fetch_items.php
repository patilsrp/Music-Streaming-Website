<?php
// Include the database connection file
include '../config.php';

try {
    // Query to fetch items from the database
    $sql = "SELECT name, price, image FROM items"; // Assuming `items` is your table
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Fetch the items
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error fetching items: " . $e->getMessage();
}
?>

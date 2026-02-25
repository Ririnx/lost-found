<?php 
include ("../misc/connect.php");

$itemName = trim($_POST['itemName'] ?? '');
$category = $_POST['categories'] ?? '';
$status = $_POST['status'] ?? '';
$description = trim($_POST['description'] ?? '');

function getEnumValues($conn, $table, $column) {
    $sql = "SHOW COLUMNS FROM `$table` LIKE '$column'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row && preg_match("/^enum\((.*)\)$/i", $row['Type'], $matches)) {
        return str_getcsv($matches[1], ',', "'");
    }

    return [];
}

$statusEnum = getEnumValues($conn, 'item', 'status');
$categoryEnum = getEnumValues($conn, 'item', 'categories');

if (!in_array($status, $statusEnum) && !in_array($category, $categoryEnum)) {
    echo "<script>alert('Invalid status or category selected!'); window.history.back();</script>";
    exit;
}

$sql = "INSERT INTO item (item_name, categories, status, description) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $itemName, $category, $status, $description);

if ($stmt->execute()) {
    echo "
    <script>
        alert('Data Submitted Successfully!');
        window.location.href = 'view.php';
    </script>";
} else {
    echo "<script>alert('Error Submitting Data!');</script>" . $conn->error;
}

$conn->close();
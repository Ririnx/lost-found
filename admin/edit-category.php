<?php
include("../misc/connect.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $category = trim($_POST['category'] ?? '');
    $status = $_POST['status'] ?? '';

    function getEnumValues($conn, $table, $column)
    {
        $sql = "SHOW COLUMNS FROM `$table` LIKE '$column'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if ($row && preg_match("/^enum\((.*)\)$/i", $row['Type'], $matches)) {
            return str_getcsv($matches[1], ',', "'");
        }

        return [];
    }

    $statusEnum = getEnumValues($conn, 'categories', 'status');

    $sql = "UPDATE categories SET `category-name` = ?, status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $category, $status, $id);



    if ($stmt->execute()) {
        echo "
        <script>
            alert('Category Updated Successfully!');
            window.location.href = 'view.php';
        </script>";
    } else {
        echo "<script>alert('Error Updating Category!');</script>" . $conn->error;
    }
} else {
    echo "<script>alert('Invalid Request!');</script>";
}

$conn->close();

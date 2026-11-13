<?php
$host = "localhost";
$username = "root";
$password = "123456";
$dbname = "smcproject";

// MySQLi connection
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

if (isset($_GET['Grievance_id'])) {
    $Grievance_id = $_GET['Grievance_id'];

    $stmt = $conn->prepare("DELETE FROM grievance WHERE Grievance_id = ?");
    $stmt->bind_param("i", $Grievance_id);

    if ($stmt->execute()) {
        header("location:tables.php");
        echo "Record deleted successfully.";

    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

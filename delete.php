<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admit";

if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $id = $_GET['id'];

    try {
        date_default_timezone_set('Asia/Dhaka');
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Delete the record based on ID
        $sql_delete = "DELETE FROM admit_cards WHERE id = :id";
        $stmt = $conn->prepare($sql_delete);
        $stmt->execute(['id' => $id]);

        // Redirect to the list page after successful deletion
        header("Location: index.php");
        exit();

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    echo "Invalid ID or ID not provided.";
    exit();
}
?>

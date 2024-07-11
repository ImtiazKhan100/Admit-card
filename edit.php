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

        // Fetch the record based on ID
        $sql_fetch_single = "SELECT * FROM admit_cards WHERE id = :id";
        $stmt = $conn->prepare($sql_fetch_single);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            echo "Record not found.";
            exit();
        }

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve and sanitize form data
            $name = htmlspecialchars($_POST['name']);
            $father_name = htmlspecialchars($_POST['father_name']);
            $mother_name = htmlspecialchars($_POST['mother_name']);
            $exam_center = htmlspecialchars($_POST['exam_center']);
            $date_time = htmlspecialchars($_POST['date_time']);
            $email = htmlspecialchars($_POST['email']);

            // Update the record in the database
            $sql_update = "UPDATE admit_cards SET name = :name, father_name = :father_name, mother_name = :mother_name, exam_center = :exam_center, date_time = :date_time, email = :email WHERE id = :id";
            $stmt = $conn->prepare($sql_update);
            $stmt->execute([
                'name' => $name,
                'father_name' => $father_name,
                'mother_name' => $mother_name,
                'exam_center' => $exam_center,
                'date_time' => $date_time,
                'email' => $email,
                'id' => $id
            ]);

            // Redirect to the list page after successful update
            header("Location: index.php");
            exit();
        }

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    echo "Invalid ID or ID not provided.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admit Card</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3 class="mb-4">Edit Admit Card</h3>
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="father_name">Father's Name</label>
                        <input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo htmlspecialchars($row['father_name']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="mother_name">Mother's Name</label>
                        <input type="text" class="form-control" id="mother_name" name="mother_name" value="<?php echo htmlspecialchars($row['mother_name']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exam_center">Exam Center</label>
                        <input type="text" class="form-control" id="exam_center" name="exam_center" value="<?php echo htmlspecialchars($row['exam_center']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="date_time">Date and Time</label>
                        <input type="text" class="form-control" id="date_time" name="date_time" value="<?php echo htmlspecialchars($row['date_time']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

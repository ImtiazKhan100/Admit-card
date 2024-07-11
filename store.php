<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admit";

date_default_timezone_set('Asia/Dhaka');
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Processed</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">

                <img src="img.png" class="img-fluid rounded" alt="Descriptive Alt Text">
                <p></p>
                <p></p>
                <p></p>

                <h3 class="mb-4">Admit Card for the post of Assistant Director </h3>
                <div class="alert alert-success" role="alert">
                    <?php
                    // Check if form is submitted
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Retrieve and sanitize form data
                        $name = htmlspecialchars($_POST['name']);
                        $father_name = htmlspecialchars($_POST['father_name']);
                        $mother_name = htmlspecialchars($_POST['mother_name']);
                        $exam_center = htmlspecialchars($_POST['exam_center']);
                        $datetime = htmlspecialchars($_POST['datetime']);
                        $email = htmlspecialchars($_POST['email']);

                        // Display the data
                        echo "<p>Name: $name</p>";
                        echo "<p>Father's Name: $father_name</p>";
                        echo "<p>Mother's Name: $mother_name</p>";
                        echo "<p>Exam Center: $exam_center</p>";
                        echo "<p>Date and Time: $datetime</p>";
                        echo "<p>Email: $email</p>";


                        // sql to create table
                        $sql = "INSERT INTO `admit_cards` (`name`, `father_name`, `mother_name`, `exam_center`, `date_time`, `email`) 
                        VALUES (:name, :father_name, :mother_name, :exam_center, :date_time, :email)";

                        $stmt = $conn->prepare($sql);

                        // Bind parameters
                        $stmt->bindParam(':name', $name);
                        $stmt->bindParam(':father_name', $father_name);
                        $stmt->bindParam(':mother_name', $mother_name);
                        $stmt->bindParam(':exam_center', $exam_center);
                        $stmt->bindParam(':date_time', $date_time);
                        $stmt->bindParam(':email', $email);

                        // Execute the statement
                        $stmt->execute();
                    } else {
                        // Redirect to the form page if accessed directly without POST data
                        header("Location: index.html");
                        exit();
                    }
                    ?>



                    <a href="index.php" class="btn btn-primary">Back to Form</a>
                </div>
            </div>
        </div>
        <footer class="bg-dark text-white text-right py-3 mt-5">
            <div class="container">
                <p>Commander M Rafiul Hasan (TAS)</p>
                Member (Admin and Finance)

                </ul>
                </nav>
            </div>

        </footer>
        <footer class="bg-dark text-white text-left py-3 mt-5">
            <div class="container">
                <p>&copy; Copyright @2022 RanksITT Ltd. All rights reserved.</p>

            </div>
        </footer>
        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
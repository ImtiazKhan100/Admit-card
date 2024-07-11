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

        // Fetch single record from admit_cards table based on ID
        $sql_fetch_single = "SELECT * FROM admit_cards WHERE id = :id";
        $stmt = $conn->prepare($sql_fetch_single);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    echo "Invalid ID or ID not provided.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admit Card Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-segment {
            margin-bottom: 1rem;
        }
        .profile-segment .card {
            background-color: #dfffe2; /* Light green background */
            border: 1px solid #b2d8b5; /* Slightly darker green border */
            color: #333; /* Dark text color for contrast */
        }
        .profile-segment .card-title {
            font-weight: bold;
        }
        .profile-segment .card-body {
            padding: 1rem;
        }
    </style>
</head>
<body>
<?php include('navbar.php'); ?>
    <div class="container mt-5">
        <h3 class="mb-4 text-center">Admit Card Profile</h3>
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="profile-segment">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Name</h5>
                            <p class="card-text"><?php echo htmlspecialchars($row['name']); ?></p>
                        </div>
                    </div>
                </div>
                <div class="profile-segment">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Father's Name</h5>
                            <p class="card-text"><?php echo htmlspecialchars($row['father_name']); ?></p>
                        </div>
                    </div>
                </div>
                <div class="profile-segment">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Mother's Name</h5>
                            <p class="card-text"><?php echo htmlspecialchars($row['mother_name']); ?></p>
                        </div>
                    </div>
                </div>
                <div class="profile-segment">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Exam Center</h5>
                            <p class="card-text"><?php echo htmlspecialchars($row['exam_center']); ?></p>
                        </div>
                    </div>
                </div>
                <div class="profile-segment">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Date and Time</h5>
                            <p class="card-text"><?php echo htmlspecialchars($row['date_time']); ?></p>
                        </div>
                    </div>
                </div>
                <div class="profile-segment">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Email</h5>
                            <p class="card-text"><?php echo htmlspecialchars($row['email']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

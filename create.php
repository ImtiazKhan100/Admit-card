<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Form Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php include('navbar.php'); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="store.php" method="POST">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                    <label for="father_name">Father's Name</label>
                    <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Enter father's name" required>
                    <label for="mother_name">Mother's Name</label>
                    <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Enter mother's name" required>
                    <label for="exam_center">Exam Center</label>
                    <input type="text" class="form-control" id="exam_center" name="exam_center" placeholder="Enter exam center location" required>
                    <label for="datetime">Date and Time</label>
                    <input type="datetime-local" class="form-control" id="datetime" name="datetime" required>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>

    <!-- Footer Section -->

    

    <footer class="bg-dark text-white text-left py-3 mt-5">
        <div class="container">
            <img src="ritt.png" class="img-fluid rounded" alt="Descriptive Alt Text">
            <p>&copy; Copyright @2022 RanksITT Ltd. All rights reserved</p>

        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
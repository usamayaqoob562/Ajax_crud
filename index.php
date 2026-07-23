<?php
include 'auth.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2>Student Directory</h2>
            <p class="text-muted mb-0">Welcome, <strong><?php echo $_SESSION['user_name']; ?></strong></p>
        </div>
        <a href="logout.php" class="btn btn-outline-danger">Logout</a>
    </div>

    <hr>

    <div id="studentTable">
        <!-- Read-Only Data Loaded Here -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>
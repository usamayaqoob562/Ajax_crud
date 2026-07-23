<?php
session_start();

// Temporary Debugger (Redirection Band)
if (!isset($_SESSION['user_id'])) {
    die("<h2 style='color:red; text-align:center;'>Session Set Nahi Hua! Login page par session create nahi ho raha.</h2>");
}

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    die("<h2 style='color:orange; text-align:center;'>User Logged in hai lekin Admin Role nahi mila. Current Role: " . ($_SESSION['user_role'] ?? 'None') . "</h2>");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Admin Dashboard</h2>
        <div>
            <!-- Add Student Button (Permission Check) -->
            <?php if (function_exists('hasPermission') && hasPermission('add_student')): ?>
                <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                    + Add Student
                </button>
            <?php else: ?>
                <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                    + Add Student
                </button>
            <?php endif; ?>
            
            <a href="logout.php" class="btn btn-outline-danger">Logout</a>
        </div>
    </div>

    <hr>

    <div id="studentTable">
        <!-- Data loaded via JS -->
    </div>
</div>

<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="studentForm">
                    <div class="mb-3">
                        <label>First Name</label>
                        <input type="text" class="form-control" id="first_name">
                    </div>
                    <div class="mb-3">
                        <label>Last Name</label>
                        <input type="text" class="form-control" id="last_name">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label>Mobile</label>
                        <input type="text" class="form-control" id="mobile">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" id="saveStudent">Add Student</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Student Modal -->
<div class="modal fade" id="editStudentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editStudentForm">
                    <input type="hidden" id="edit_id">
                    <div class="mb-3">
                        <label>First Name</label>
                        <input type="text" class="form-control" id="edit_first_name">
                    </div>
                    <div class="mb-3">
                        <label>Last Name</label>
                        <input type="text" class="form-control" id="edit_last_name">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" id="edit_email">
                    </div>
                    <div class="mb-3">
                        <label>Mobile</label>
                        <input type="text" class="form-control" id="edit_mobile">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" id="updateStudent">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>
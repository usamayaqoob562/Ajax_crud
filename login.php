<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header text-center text-primary">
                    <h4>User Login</h4>
                </div>
                <div class="card-body">
                    <form id="loginForm">
                        <div class="mb-3">
                            <label>Email Address</label>
                            <input type="email" id="login_email" class="form-control" placeholder="Enter email" required>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" id="login_password" class="form-control" placeholder="Enter password" required>
                        </div>
                        <button type="button" id="loginUser" class="btn text-primary w-100">Login</button>
                    </form>
                    <a href="signup.php">create account</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>

</body>
</html>
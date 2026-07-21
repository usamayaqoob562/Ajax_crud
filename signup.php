<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Signup</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<body>


<div class="container mt-5">


<div class="row justify-content-center">


<div class="col-md-5">


<div class="card">


<div class="card-header text-center">

<h3>Create Account</h3>

</div>


<div class="card-body">


<form id="signupForm">


<div class="mb-3">

<label>First Name</label>

<input 
type="text"
class="form-control"
id="signup_first_name">

</div>



<div class="mb-3">

<label>Last Name</label>

<input 
type="text"
class="form-control"
id="signup_last_name">

</div>



<div class="mb-3">

<label>Email</label>

<input 
type="email"
class="form-control"
id="signup_email">

</div>




<div class="mb-3">

<label>Password</label>

<input 
type="password"
class="form-control"
id="signup_password">

</div>



<button 
type="button"
class="btn btn-primary w-100"
id="registerUser">

Register

</button>


</form>


</div>


</div>


</div>


</div>


</div>



<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


<script src="script.js"></script>


</body>

</html>
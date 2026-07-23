<?php
include "conn.php"; 

$first_name = $_POST['first_name'];
$last_name  = $_POST['last_name'];
$email      = $_POST['email'];
$password   = $_POST['password'];


$checkEmail = mysqli_query($conn, "SELECT id FROM users WHERE email = '$email'");

if(mysqli_query($conn,$sql)){

    echo "1";

}
else{

    echo mysqli_error($conn);

}


$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$hashed_password')";

if (mysqli_query($conn, $sql)) {
    echo "1"; 
} else {
    echo "error"; 
}
?>
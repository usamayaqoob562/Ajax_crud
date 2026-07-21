<?php
session_start();
include "conn.php";

$email    = $_POST['email'];
$password = $_POST['password'];

$sql    = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row['password'])) {
        
        $_SESSION['user_id']   = $row['id'];
        $_SESSION['user_name'] = $row['first_name'];
        $_SESSION['user_role'] = $row['role'];

        echo $row['role']; 
        exit(); 
        
    } else {
        echo "invalid_password";
        exit();
    }
} else {
    echo "user_not_found";
    exit();
}
?>
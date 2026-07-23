<?php
include "auth.php";

// Permission check
if (!hasPermission('add_student')) {
    echo "Unauthorized Access!";
    exit();
}

include "conn.php";

$first_name = $_POST['first_name'];
$last_name  = $_POST['last_name'];
$email      = $_POST['email'];
$mobile     = $_POST['mobile'];

$sql = "INSERT INTO students(first_name,last_name,email,mobile)
VALUES('$first_name','$last_name','$email','$mobile')";

if(mysqli_query($conn,$sql)){
    echo 1;
}else{
    echo mysqli_error($conn);  
}
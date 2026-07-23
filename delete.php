<?php
include "auth.php";

// Permission check
if (!hasPermission('delete_student')) {
    echo "Unauthorized Access!";
    exit();
}

include "conn.php";
$id = $_POST['id'];


$sql = "DELETE FROM students WHERE id='$id'";


if(mysqli_query($conn,$sql)){

    echo 1;

}else{

    echo 0;

}


?>
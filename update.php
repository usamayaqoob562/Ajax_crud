<?php
include "auth.php";

// Permission check
if (!hasPermission('edit_student')) {
    echo "Unauthorized Access!";
    exit();
}

include "conn.php";



$id = $_POST['id'];

$first_name = $_POST['first_name'];

$last_name = $_POST['last_name'];

$email = $_POST['email'];

$mobile = $_POST['mobile'];



$sql = "UPDATE students SET

first_name='$first_name',

last_name='$last_name',

last_name='$last_name',

email='$email',

mobile='$mobile'

WHERE id='$id'";



if(mysqli_query($conn,$sql)){

    echo 1;

}
else{

    echo 0;

}


?>
<?php

include("conn.php");


$id = $_POST['id'];


$sql = "SELECT * FROM students WHERE id='$id'";


$result = mysqli_query($conn,$sql);


$data = mysqli_fetch_assoc($result);


echo json_encode($data);


?>
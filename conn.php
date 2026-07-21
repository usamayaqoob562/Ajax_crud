<?php

$conn = mysqli_connect("localhost","root","","ajax_crud");

if(!$conn){
    die("Connection Failed : ".mysqli_connect_error());
}

?>
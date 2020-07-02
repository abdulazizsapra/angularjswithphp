<?php
$data = json_decode(file_get_contents("php://input"));

require_once("connection.php");

$first_name = mysqli_real_escape_string( $conn,$data->first_name);
$last_name = mysqli_real_escape_string( $conn,$data->last_name);
$query = "INSERT INTO `users`( `first_name`, `last_name`) VALUES ('$first_name','$last_name')";
$result = mysqli_query($conn, $query);

if($result){
    echo "Data Inserted!";
} else {
    echo "Error";
}


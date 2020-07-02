<?php
$data = json_decode(file_get_contents("php://input"));
require_once("connection.php");

$first_name = mysqli_real_escape_string( $conn,$data->first_name);
$last_name = mysqli_real_escape_string( $conn,$data->last_name);
$id = $data->id;
$query = "UPDATE `users` SET `first_name`='$first_name',`last_name`='$last_name' WHERE user_id='$id'";
$result = mysqli_query($conn, $query);

if($result){
    echo "Data Updated!";
} else {
    echo "Error";
}


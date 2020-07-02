<?php
$data = json_decode(file_get_contents("php://input"));


require_once("connection.php");

$id = $data->id;
$query = "DELETE FROM `users` WHERE user_id='$id'";
$result = mysqli_query($conn, $query);

if($result){
    echo "Data Deleted!";
} else {
    echo "Error";
}


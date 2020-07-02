<?php
require_once("connection.php");

    $query= "select * from users";
    $result = mysqli_query($conn,$query);
    $output=[];
    if (mysqli_num_rows($result)) {
        while($row = mysqli_fetch_array($result)){
            $output[]=$row;
        }
        echo json_encode($output);
    }

?>
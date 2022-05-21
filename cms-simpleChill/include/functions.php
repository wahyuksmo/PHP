<?php 

$conn = new mysqli("localhost","root","","coba-cms");


function queryData($query) {
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}






?>
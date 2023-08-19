<?php

include('../conn.php');
$sql = "SELECT * FROM `notes`";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}

?>
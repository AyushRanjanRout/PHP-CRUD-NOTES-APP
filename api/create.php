<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
include('../conn.php');
$data = json_decode(file_get_contents("php://input"),true);
$name = $data['title'];
$des = $data['desc'];
$sql = "INSERT INTO `notes` (`sno`, `title`, `descr`, `date`) VALUES (NULL, '$name', '$des', current_timestamp());";
$result = mysqli_query($conn,$sql);
if(!$result){
    
    echo json_encode(array('message'=>'Not Inserted'));
}
else{
    
    echo json_encode(array('message'=>'Successfully Inserted'));
}
?>
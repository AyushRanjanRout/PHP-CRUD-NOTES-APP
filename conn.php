<?php

$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "notes";

$conn = new mysqli($host,$dbuser,$dbpass,$dbname);
if($conn->connect_error){
    die("Connection Failed ".$conn->connect_error );
}

?>
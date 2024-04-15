<?php
$host = "localhost" ;
$user = "root" ;
$db_password = "" ;
$db_name = "employee_system" ;
$conn = new mysqli($host,$user,$db_password,$db_name) ;
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
?>
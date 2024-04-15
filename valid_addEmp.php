<?php
include 'db_connection.php' ;
function valid ($input){
    $input=trim($input);
    $input=htmlspecialchars($input);
    return $input ;
}
$error = array();
$flag =true ;


$sql = "select * from employees 
where email = '$email'  " ;
$result = $conn->query($sql);
if($result->num_rows >0){
$error[] ="email";
$flag =false;
}


?>
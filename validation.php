<?php

function valid_email ($input){
    $input=trim($input);
    $input=htmlspecialchars($input);
    return $input ;
}
function valid_password ($input){
    $input=htmlspecialchars($input);
    return $input ;
}

function valid($email , $password){
    $flag = true ;
    $error = array() ;
    if(!isset($email) || !filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){
        $error[] = "email" ;
        $flag = false ;
    }
    if(!isset($password) || empty($password) || strlen($password)<5){
        $error[] = "password" ;
        $flag = false ;
    }
    if($flag == false){
        header('Location:empLogin.php?error='.implode(",",$error));
        exit ;
    }
}

?>
<?php

class VALIDATION {

    public $email ;
    public $password ;
    public $phone ;

    public function valid_email($_email){
        $this->email = trim($_email);
        $this->email = htmlspecialchars($_email);
        return $this->email ;
    }
    public function valid_password($_password){
        $this->email = htmlspecialchars($_password);
        return $this->password ;
    }
    public function validation($_email,$_password){
        $error = array() ;
       if(empty($_email) || !filter_input($_email , FILTER_VALIDATE_EMAIL)){
        $error[] = "email";
       }
       if(strlen($_password)<5){
        $error[]="password" ;
       }
    }
     
}

?>
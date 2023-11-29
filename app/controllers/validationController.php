<?php

class validation extends App{
 public function __construct() {
         if(!session::get('logged_in')){
             session::destroy();
            header("Location:".URLController::getBaseUrl()."/login");
            exit(); 
         }
        parent::__construct();
       
    }
}

?>
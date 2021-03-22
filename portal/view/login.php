<?php
session_start();

// import school logic
require_once("../control/school.php");

// form submitted with POST method
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if( !empty($_POST['username']) and !empty($_POST['password'])){
        $username = cleanData($_POST['username']);
        $password = cleanData($_POST['password']);

        // method of school object
        $access =  $semrem->staffLogin($username, $password);

        // validate user details
        if( $access == True){
            $_SESSION['USER'] = $username;
            redirect("./");
        } else {
            $_SESSION['LOGIN_ERROR'] = "Invalid email/password, please try again. ";
            redirect(".././");
        }
    } else {
        $_SESSION['LOGIN_ERROR'] = "Both fields are requred";
        redirect(".././");
    } 

}
<?php
    session_start();

    // school logic
    require_once "../control/school.php";

    // get student id 
    if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['id'])){
        $semrem->deleteStudent($_GET['id']);
        $_SESSION['DELETE_STUDENT'] = $_GET['fn'] ." ". $_GET['ln'] ;
        redirect("./");
    }
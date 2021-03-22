<?php
    session_start();
    require_once "../control/school.php";
    
    if( $_SERVER['REQUEST_METHOD'] == "POST" and isset($_GET['id'])){

        $firstName = cleanData($_POST['upFirstName']);
        $lastName = cleanData($_POST['upLastName']);
        $contact = cleanData($_POST['upContact']);
        $email = cleanData($_POST['upEmail']);
        $gender = cleanData($_POST['upGender']);

        $data = array([$firstName, $lastName,$contact,$email,$gender]);

        $semrem->updateStudent($_GET['id'], $data[0]);
        $_SESSION['UPDATE_STUDENT'] = $firstName ." ".$lastName;
        redirect('./');
     
          

    }
    
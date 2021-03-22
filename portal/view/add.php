<?php
  session_start();

  // school logic
  require_once "../control/school.php";


  // add student form submission
  if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $firstName = cleanData($_POST['firstName']);
    $lastName = cleanData($_POST['lastName']);
    $contact = cleanData($_POST['contact']);
    $email = cleanData($_POST['email']);
    $gender = cleanData($_POST['gender']);

    $data = array([$firstName, $lastName,$contact,$email,$gender]);

    // school method to ADD STUDENT
    $add =  $semrem->addStudent($data[0]);

    // validate email and contact existence in school db 
    if( is_string($add)){
      echo "Email / Contact alreay exist";
      die;
    }else {

      $_SESSION['ADD_STUDENT'] = $firstName ." ". $lastName;
      redirect("./");

    } 

}
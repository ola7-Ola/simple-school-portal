<?php

function logReport($error){
    $log  = $error ." :". date("F j, Y g:i A") .PHP_EOL; 
    file_put_contents("../log-".date("j-n-Y",time()).'.log',$log,FILE_APPEND);

}

class db{
    private $server;
    private $user;
    private $password;
    private $conn;


    function __construct($server = "localhost", $user = "root", $password = "rootUser"){
        $this->server =  $server;
        $this->user =  $user;
        $this->password =  $password;
    }

    // Connection to database
    public function connect_db($db){
        try {
            $this->conn = new PDO("mysql:host={$this->server};dbname={$db}",$this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            logReport("connection failed" .$e->getMessage());
        }
    }

    function __destruct()
    {
        $this->conn = null;
    }
}


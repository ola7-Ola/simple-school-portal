<?php
require_once "conn_db.php";
// clean data 
function cleanData($data) : mixed {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// redirect pages
function redirect($url){
    header("location: ".$url);
    die;
}

// SCHOOL 
class school extends db {

    // database name
    private static $db = "school";
    protected $dbc;

    //connect to db 
    private function conn_db(){
        try{
            $this->dbc = parent::connect_db(self::$db);
        }catch(PDOException $e){
            logReport($e->getMessage());
        }
    }
    
    // validate user email
    private function emailVal($email): bool {

        $this->conn_db();
        try {
            // validate email and contact
            $sql = "SELECT id FROM student WHERE email = :email";
    
            $emailVal = $this->dbc->prepare($sql);
            $emailVal->bindParam(":email", $email, PDO::PARAM_STR);

            $emailVal->execute();
            return $emailVal->fetch() ? True : False;
        } catch (PDOException $e) {
            logReport($e->getMessage());
            
        }
    }

    // validate user contact
    private function contactVal($phone): bool {

        // connect to database
        $this->conn_db();
        try {
            // validate contact 
            $sql = "SELECT id FROM student WHERE contact = :phone";

            $conVal = $this->dbc->prepare($sql);
            $conVal->bindParam(":phone",$phone, PDO::PARAM_STR);

        
            $conVal->execute();
            return $conVal->fetch() ? True : False;
        } catch (PDOException $e) {
            logReport($e->getMessage());

        }
    }
    
    // staff login method
    public function staffLogin($username, $password){

        // connect to staff database using parent method
        $this->conn_db();

        try {
            $sql =  "SELECT * FROM staff where username = :user and password = :passwd";
            $stmt = $this->dbc->prepare($sql);
            
            $stmt->bindParam(':user', $username, PDO::PARAM_STR);
            $stmt->bindParam(':passwd', $password, PDO::PARAM_STR);

            $stmt->execute();
            return $stmt->fetchColumn();
        }catch(PDOException $e){
            logReport($e->getMessage());
        }
    }

    // school student details 
    public function studentDetails(){
        // connect to school database using parent method
        $this->conn_db();
        
        try{

            $sql = "SELECT * FROM student";
            $stmt =  $this->dbc->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            logReport($e->getMessage());
        }
    }

    // Add student to school
    public function addStudent($data){

        // connect to school database using base class method
        $this->conn_db();
        try {
         // validate email and contact 
            if (  !$this->emailVal($data[3]) && !$this->contactVal($data[2]) ){

                // query
                $sql = "INSERT into  student (firstName , lastName, gender, email, contact) 
                        values (:firstName,:lastName,:gender,:email,:contact)";

                $stmt = $this->dbc->prepare($sql);

                
                $stmt->bindParam(":firstName",$data[0], PDO::PARAM_STR);
                $stmt->bindParam(":lastName",$data[1], PDO::PARAM_STR);
                $stmt->bindParam(":contact",$data[2], PDO::PARAM_STR);
                $stmt->bindParam(":email",$data[3], PDO::PARAM_STR);
                $stmt->bindParam(":gender",$data[4], PDO::PARAM_STR);

            } else {
                return "Email/Contact already Exist";
            }

            return $stmt->execute();
        }catch(PDOException $e){
            logReport($e->getMessage());

        }
        
    }

    // Delete Student from school
    public function deleteStudent($id){
        // connect to school database using base class method
        $this->conn_db();

        try {
            $sql = "DELETE from student where id = :id";
            $stmt = $this->dbc->prepare($sql);
            $stmt->bindParam(":id",$id, PDO::PARAM_INT);
    
            $stmt->execute();
            return $stmt->fetchColumn();
        }catch(PDOException $e){
            logReport($e->getMessage());
        }
    }

    // update student record
    public function updateStudent($id, $student){
        // connect to school database using base class method
        $this->conn_db();

        try {
            $sql = "UPDATE student set firstName=:fName,
                lastName=:lName, contact=:contact, email=:email, 
                gender =:gender where id = :id";

            $stmt =  $this->dbc->prepare($sql);
            $stmt->bindParam(":id",$id, PDO::PARAM_INT);
            $stmt->bindParam(":fName",$student[0], PDO::PARAM_STR);
            $stmt->bindParam(":lName",$student[1], PDO::PARAM_STR);
            $stmt->bindParam(":contact",$student[2], PDO::PARAM_STR);
            $stmt->bindParam(":email",$student[3], PDO::PARAM_STR);
            $stmt->bindParam(":gender",$student[4], PDO::PARAM_STR);
        
        
            $stmt->execute();
            return True;
        }catch(PDOException $e){
            logReport($e->getMessage());
        }
        
    }

}


// instance 
$semrem = new school();

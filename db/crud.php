<?php
    class crud{
        //private database object
        private $db;
        
        //constructor to initialize private variable to the database connection 
        function __construct($conn) //parameter
        {
            $this->db = $conn; //this database to get the value that $conn has
        }
        // function to insert a new record into the attendee database
        public function insertAttendees($fname, $lname, $dob, $email, $contact, $specialty){
            try {
                //define sql statement to be executed
                $sql = "INSERT INTO attendee (firstname, lastname, dateofbirth, emailaddress, contactnumber, specialty_id) VALUES (:fname,:lname,:dob,:email,:contact,:specialty)";
                //bind all placeholders to the actual values
                $stmt = $this->db->prepare($sql); //prepare for execution
                $stmt->bindparam(':fname', $fname);
                $stmt->bindparam(':lname', $lname);
                $stmt->bindparam(':dob', $dob);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':contact', $contact);
                $stmt->bindparam(':specialty', $specialty);
                //execute statement
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function editAttendee($id,$fname, $lname, $dob, $email, $contact, $specialty){
            try{
                $sql = "UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,`emailaddress`=:email,`contactnumber`=:contact,`specialty_id`=:specialty WHERE attendee_id = :id ";
                $stmt = $this->db->prepare($sql); //prepare for execution, bind all placeholders to the actual values
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname', $fname);
                $stmt->bindparam(':lname', $lname);
                $stmt->bindparam(':dob', $dob);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':contact', $contact);
                $stmt->bindparam(':specialty', $specialty);
                //execute statement
                $stmt->execute();
                return true;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

        public function getAttendees(){
            try {
                $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id";
                $result = $this->db->query($sql); //this db query will pass on the file 
                return $result; //this function will return whatever comesback in $result
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

        public function getAttendeeDetails($id){
            try {
                $sql = "select * from attendee a inner join specialties s on a.specialty_id = s.specialty_id where attendee_id = :id";
                $stmt = $this->db->prepare($sql); 
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        } //getting all the columns from table attendee where the attendee_id is equal to :id, after it prepares the statement it binds the :id to the value came in the $id

        public function deleteAttendee($id){
            try{
                $sql = "delete from attendee where attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $return = true;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
            
        }

        public function getSpecialties(){
            try {
                $sql = "SELECT * FROM `specialties`";
                $result = $this->db->query($sql); 
                return $result;
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

        

    }
?>
<?php
    require_once 'db/conn.php'; // 1
    // get values from post operation 
    if(isset($_POST['submit'])) { // if post submit variable exist then    2
        //extract values from the $_POST array
        $id = $_POST['id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];

        // call crud function   3
        $result = $crud->editAttendee($id,$fname, $lname, $dob, $email, $contact, $specialty);
    
        //redirect to index.php   4
        if($result) {
            header("Location: viewrecords.php");
        }
        else{
            include 'includes/errormessage.php';
        }
    }
    else{
        include 'includes/errormessage.php';
    }
    //summary once you click submit on edit it will post of the unmodified or modified data and it will go to the databaserequire_once 'db/conn.php'; (1) then get all the values (2), call all the operations which will run the the updates in the database (3) and if that was successful it will redirect to the (4) header("index.php"); otherwise there will be errore message

?>
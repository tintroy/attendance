<?php
    require_once 'db/conn.php';
    if(!$_GET['id']){ // 
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }else{
        //when you go on this page, check and you get the id, run the code to delete it in the database then redirect once the operation was successful
        //Get id values
        $id = $_GET['id'];

        //Call Delete Function  
        $result = $crud->deleteAttendee($id);
        //Redirect to list
        if($result){
            header("Location: viewrecords.php");
        }
        else{
            echo ' ';
        }

        
    }
?>
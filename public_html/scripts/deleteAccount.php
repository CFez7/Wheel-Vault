<?php
    require_once("../../includes/session.php");
    require_once("../../includes/connect.php");
?>
<?php 
    if(isset($_POST["confirmDelete"])) {
        $accountID = $_SESSION["userID"];
        $deletepass = $_POST["deletepass"];
        $password = $_SESSION["upassword"];
    } else {
        $_SESSION["accountmessage"] = "Error.";  
        header("Location: ../account.php");
    }
?>
<!-- *NOTE* This doe remove users listings but NOT the images associated with those listings. This needs to be addressed. -->
<?php

        // if entered password is correct carry on
        if(crypt($deletepass, $password) == $password) {
            
            // Gather all listings associated with this user.
            $tables = array("listings","users");
            foreach($tables as $table) {
                
                // Set query for deletion of all user listings and users details
                $query = "DELETE FROM $table WHERE user_id='{$accountID}'";
                
                $result = mysqli_query($connection, $query); 
            }
                       
            if($result) {
                // Destroy session, logging the user out of session
                session_start ();
                session_destroy ();
                header("Location: ../index.php");
            } else {
                $_SESSION["accountmessage"] = "Something went wrong!";  
                header("Location: ../account.php");
            }
           
       } else {
           $_SESSION["accountmessage"] = "Password did not match!";  
           header("Location: ../account.php");
       }
?>
<?php 
        mysqli_close($connection);
?>

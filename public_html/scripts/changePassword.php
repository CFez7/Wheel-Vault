<?php
    require_once("../../includes/session.php");
    require_once("../../includes/connect.php");
?>
<?php 
      // if the change password button has been pressed, append form data to variables
      if(isset($_POST["changePassword"])) {
        
        $upassword = $_POST["upassword"];
        $newpassword = $_POST["newpassword"];
        $userID = $_SESSION["userID"];
        $currentpass = $_SESSION["upassword"];
        
    } else {
        $_SESSION["message"] = "Error.";  
        header("Location: ../account.php");
    }
?>
<?php

    // Checks that the user has filled in form fields.
    if($newpassword == "" or $upassword == "") {
        $_SESSION["accountmessage"] = "Please fill all fields!";  
        header("Location: ../account.php");
    } else {
        
        // If the encrypted users password matches the encryption of the entered password carry on
        
        if(crypt($upassword, $_SESSION["upassword"]) == $_SESSION["upassword"]) { 
            
            // Make new password the data to be hashed
            
            $password_hash = crypt($newpassword);
            
            // change password within the database to the newly encrypted password

            $query = "UPDATE users SET upassword='{$password_hash}' WHERE user_id='{$userID}'";

            $result = mysqli_query($connection, $query); 

           if($result) {
               
               // if successful, update session password to the new password

                $_SESSION["upassword"] = $hash_password;

                $_SESSION["accountmessage"] = "Password updated!";
                header("Location: ../account.php");

            } else {

                $_SESSION["accountmessage"] = "Something went wrong!";
                header("Location: ../account.php");
           }

        } else {
            $_SESSION["accountmessage"] = "Wrong password entered!";  
            header("Location: ../account.php");
        }
    }
?>
<?php 
        mysqli_close($connection);
?>

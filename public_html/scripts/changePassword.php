<?php
    require_once("../../includes/session.php");
    require_once("../../includes/connect.php");
?>
<?php 
        
      if(isset($_POST["changePassword"])) {
        
        $upassword = $_POST["upassword"];
        $newpassword = $_POST["newpassword"];
        $passcheck = $_POST["passcheck"];
        $userID = $_SESSION["userID"];
        
    } else {
        $_SESSION["message"] = "Error.";  
        header("Location: ../account.php");
    }
?>
<?php

     if($newpassword != "") {
         
        if($newpassword == $passcheck) {
            
           if($_SESSION["upassword"] == $upassword) {

                $query = "UPDATE users SET upassword='{$newpassword}' WHERE id='{$userID}'";

                $result = mysqli_query($connection, $query); 

                $_SESSION["upassword"] = $newpassword;

                $_SESSION["message"] = "Password Updated!";
                header("Location: ../account.php");

           } else {
               $_SESSION["message"] = "Wrong current password";  
               header("Location: ../account.php");
           }
        } else {
           $_SESSION["message"] = "Passwords did not match!";  
           header("Location: ../account.php");
        }
     } else {
         $_SESSION["message"] = "No password entered";  
         header("Location: ../account.php");
     }
?>
<?php
    require_once("../../includes/session.php");
    require_once("../../includes/connect.php");
?>
<?php 
        
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

    if($newpassword == "" or $upassword == "") {
        $_SESSION["accountmessage"] = "Please fill all fields!";  
        header("Location: ../account.php");
    } else {

        if(crypt($upassword, $_SESSION["upassword"]) == $_SESSION["upassword"]) { 

            $password_hash = crypt($newpassword);

            $query = "UPDATE users SET upassword='{$password_hash}' WHERE user_id='{$userID}'";

            $result = mysqli_query($connection, $query); 

           if($result) {

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
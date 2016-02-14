<?php
    require_once("../../includes/session.php");
    require_once("../../includes/connect.php");
?>
<?php 
        
      $accountID = $_SESSION["userID"];
         
?>
<?php
       if($_SESSION["upassword"] == $_POST["deletePass"]) {
           
        $query = "DELETE FROM users WHERE id = '{$accountID}' ";
           
        $result = mysqli_query($connection, $query); 

        session_start ();
        session_destroy ();
    
        $_SESSION["accountmessage"] = "Account Deleted";
        header("Location: ../index.php");
           
       } else {
           $_SESSION["accountmessage"] = "Password did not match!";  
           header("Location: ../account.php");
       }
?>
<?php 
        mysqli_close($connection);
?>
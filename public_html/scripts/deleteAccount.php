<?php
    require_once("../../includes/session.php");
    require_once("../../includes/connect.php");
?>
<?php 
        
      $listingID = $_POST["listingID"];
         
?>
<?php
       if($_SESSION["upassword"] == $_POST["deletePass"]) {
           
        $query = "DELETE FROM listings WHERE id = '{$listingID}' ";
           
        $result = mysqli_query($connection, $query); 

        session_start ();
        session_destroy ();
    
        $_SESSION["message"] = "Post deleted!";
        header("Location: ../index.php");
           
       } else {
           $_SESSION["message"] = "Password did not match!";  
           header("Location: ../index.php");
       }
?>
<?php 
        mysqli_close($connection);
?>
<?php
    require_once("../../includes/session.php");
    require_once("../../includes/connect.php");
?>
<?php 
        
    $listingID = $_POST["listingID"];
    $mainImage = $_POST["mainImage"];
    $thumb1 = $_POST["thumb1"];
    $thumb2 = $_POST["thumb2"];
    $thumb3 = $_POST["thumb3"]; 
    $thumb4 = $_POST["thumb4"];
    $enteredpass = $_POST["deletePass"];
         
?>
<?php
       if(crypt($enteredpass, $_SESSION["upassword"]) == $_SESSION["upassword"]) { 
           
        $query = "DELETE FROM listings WHERE listing_id = '{$listingID}' ";
           
        if($mainImage !== "default") {
            
            unlink('../../includes/listings/'.$mainImage);
            
        }
           
        if($thumb1 !== "default") {
            
            unlink('../../includes/listings/'.$thumb1);
            
        }
           
        if($thumb2 !== "default") {
            
            unlink('../../includes/listings/'.$thumb2);
            
        }
           
        if($thumb3 !== "default") {
            
            unlink('../../includes/listings/'.$thumb3);
            
        }
           
        if($thumb4 !== "default") {
            
            unlink('../../includes/listings/'.$thumb4);
            
        }

           
        $result = mysqli_query($connection, $query); 

    
        $_SESSION["message"] = "Post Deleted!";
        header("Location: ../index.php");
           
       } else {
           $_SESSION["message"] = "Password did not match!";  
           header("Location: ../myposts.php");
       }
?>
<?php 
        mysqli_close($connection);
?>
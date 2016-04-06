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
<?php
        if(crypt($deletepass, $password) == $password) {
            
            $tables = array("listings","users");
            foreach($tables as $table) {
                
                $query = "DELETE FROM $table WHERE user_id='{$accountID}'";
                
                $result = mysqli_query($connection, $query); 
            }
                       
            if($result) {
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
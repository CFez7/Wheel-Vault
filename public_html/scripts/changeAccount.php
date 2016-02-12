<?php
    require_once("../../includes/session.php");
    require_once("../../includes/connect.php");
?>
<?php 
        
      if(isset($_POST["changeDetails"])) {
        $name = $_POST["changename"];
        $email = $_POST["changeemail"];
        $phone = $_POST["changephone"];
        $location = $_POST["changelocation"];
        $upassword = $_POST["upassword"];
        $userID = $_SESSION["userID"];
    } else {
        $_SESSION["accountmessage"] = "Error.";  
        header("Location: ../account.php");
    }
?>
<?php
        if(empty($_POST['changeemail'])) {
            $_SESSION['accountmessage'] = "Email field cannot be left empty!";
            header("Location: ../account.php");
        } else {
        if(empty($_POST['changename'])) {
                $_SESSION['accountmessage'] = "Name field cannot be left empty!";
                header("Location: ../account.php");
        } else { 
?>
<?php
       if($_SESSION["upassword"] == $upassword) {
           
            $query = "UPDATE users SET name='{$name}', email='{$email}', phone='{$phone}', location='{$location}' WHERE id='{$userID}'";

            $result = mysqli_query($connection, $query); 

            $_SESSION["userID"] = $userID;
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $name;
            $_SESSION["phone"] = $phone;
            $_SESSION["location"] = $location;

            $_SESSION["accountmessage"] = "Account Updated!";
            header("Location: ../account.php");
           
       } else {
           $_SESSION["accountmessage"] = "Wrong password entered!";  
           header("Location: ../account.php");
       }
     }
    }
?>
<?php 
    if(isset($_POST["addpost"])) {
        mysqli_close($connection);
    }
?>
<?php
    // link database and session
    require_once("../../includes/session.php");
    require_once("../../includes/connect.php");
?>
<?php 
      // If change details has been pressed, check data base be passed through or error.
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
        // If any fields are blank, prompt user.
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
       // If password entered matches that in the database (encrypted), go ahead with the update.
       if(crypt($upassword, $_SESSION["upassword"]) == $_SESSION["upassword"]) { 
           
           // Set query update to replace all details where userID matches that of the user logged in.
            $query = "UPDATE users SET name='{$name}', email='{$email}', phone='{$phone}', location='{$location}' WHERE id='{$userID}'";

            $result = mysqli_query($connection, $query); 

            // Change all session details to the updated versions
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
        // Close database connection
        mysqli_close($connection);
    }
?>

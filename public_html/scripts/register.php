<?php
    require_once("../../includes/session.php");
    require_once("../../includes/connect.php");
?>
<?php 
    
    if(isset($_POST["register"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $location = $_POST["location"];
        $upassword = $_POST["upassword"];
        $checkpass = $_POST["checkpass"];
    } else {
        $name = "";
        $email = ""; 
        $phone = ""; 
        $location = "";
        $upassword = "";
        $checkpass = "";
    }
?>
<?php
        // these if statements check that all fields have been filled out before sending the data.
        // if a field is missed it sets the session message to match that field.
        if(isset($_POST['register'])) {
            if(empty($_POST['name'])) {
                $_SESSION['regmessage'] = "Name field empty!";
            } else {
            if(empty($_POST['email'])) {
                $_SESSION['regmessage'] = "Email field empty!";
            } else {
            if(empty($_POST['upassword'])) {
                $_SESSION['regmessage'] = "Password field empty!";   
            } else {
            if($_POST['upassword'] != $_POST['checkpass']) {
                $_SESSION['regmessage'] = "Passwords do not match!"; 
            } else {
            // if all fields are filled out it inserts them into the users table.
            $query = "INSERT INTO users (name, email, phone, location, upassword) VALUES ('{$name}', '{$email}', '{$phone}', '{$location}','{$upassword}')";
        
        $result = mysqli_query($connection, $query); 

        // if there are results (data was sent) display they are registered. if not say it went wrong.
        if($result) {
            $_SESSION["regmessage"] = "You are now a registered user!";   
        } else {
            $_SESSION["regmessage"] = "Whoops! Something went wrong!"; 
         }
        }
       }
      } 
     }
    }
?>
<?php
    header("Location: ../register.php");
?>
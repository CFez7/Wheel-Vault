<?php
    
    require_once("../../includes/session.php");
    require_once("../../includes/connect.php");

    if(isset($_POST["login"])) {
        // sets username and password for the query as that of the form filled out.
        $email = $_POST["email"];
        $upassword = $_POST["upassword"];

        // checks to see if the username and password match within the users database. If so it logs the user in.
        $query = "SELECT * FROM users WHERE email='{$email}' AND upassword='{$upassword}' LIMIT 1";

        $result = mysqli_query($connection, $query);

        // when session starts it attaches this information to the current session to use elsewhere.
        if($user = mysqli_fetch_assoc($result)) {
            $_SESSION["message"] = "";
            $_SESSION["userID"] = $user["id"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["name"] = $user["name"];
            $_SESSION["phone"] = $user["phone"];
            $_SESSION["location"] = $user["location"];
            $_SESSION["upassword"] = $user["upassword"];

        } else {
            // if the password and username didnt match display this as an error message.
            $_SESSION["message"] = "Wrong username/password";
        }

    }
    header("Location: ../index.php");
?>
<?php 
    if(isset($_POST["addpost"])) {
        mysqli_close($connection);
    }
?>
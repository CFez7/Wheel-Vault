<?php 
    include_once("../includes/header.php"); 
    $_SESSION["uploadMessage"] = "";
    $_SESSION["accountmessage"] = "";
    $_SESSION["message"] = "";
?>
<body class="ibg"> <!-- gives this body class ibg (to stop background slideshow) -->

    <div class="container">
        <!-- show navigation bar found at nav.php -->
        <div class="head">
            <?php include '../includes/nav.php'; ?>
        </div>
        <div class="log"> 
            <!-- If session username is set, display welcome, logout. If not show log in. -->
            <?php if(isset($_SESSION["name"])) { ?>
                <?php include '../includes/logged-in-nav.php'; ?>
            <?php } else { ?>
                    <?php include '../includes/login-nav.php'; ?>
            <?php } ?>
        </div>

        <div class="content">
            <div>
                <!-- If user gains access to this page without being logged in, the user is prompted to do so -->
                <?php if(!isset($_SESSION["name"])) { ?>
                    <p style="text-align:center">Please log in to view account posts.</p>
                <?php }else{ ?>
                <?php 
        
                    $ownerID = $_SESSION["userID"];
    
                    // show all listings that belong to the logged in user
                            
                    $query = "SELECT * FROM listings WHERE user_id = '{$ownerID}'";
                    
                    $result = mysqli_query($connection, $query);
                    
                    if(mysqli_num_rows($result)>0){

                        while($row = mysqli_fetch_array($result)) {

                            include '../includes/box.php';  

                        }
                    } else { 
                ?>
                <!-- if no results are found, tell the user -->
                        <p style="text-align:center">You currently have no posts.</p>
                <?php    
                    }
                ?>
            </div>
        </div>

    <?php } ?>
    <?php
        include_once("../includes/footer.php"); 
    ?>

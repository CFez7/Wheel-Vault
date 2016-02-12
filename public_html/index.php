<?php include_once("../includes/header.php"); ?>
<body class="ibg"> <!-- gives this body class ibg (to stop background slideshow) -->

        <div class="container">
            <!-- show navigation bar found at nav.php -->
            <div class="head">
                <?php include '../includes/nav.php'; ?>
            </div>
            <div class="log"> 
                
                <!-- If session username is set, display welcome, logout. If not show log in. -->
                <p class="sessionMessage">
                    <?php if(isset($_SESSION["message"])) {
                        echo ucfirst($_SESSION["message"]);}
                    ?>
                </p>
                <?php if(isset($_SESSION["name"])) { ?>
                    <?php include '../includes/logged-in-nav.php'; ?>
                <?php } else { ?>
                        <?php include '../includes/login-nav.php'; ?>
                <?php } ?>
            </div>
        
            <!-- Include sort/filter data form -->
            <?php include '../includes/sort.php' ?>
            
            <!-- query to display all current listings -->
            <?php 

                $query = "SELECT * FROM listings";
                $result = mysqli_query($connection, $query); 

                if(!$result) {
                    die("Query Error");  
                }

            ?>  
            <?php 
/*php has many if statements so that no matter which filters you choose or leave blank it will always give back the relavent results. Basic query set as 'SELECT * FROM listings' then is adds to this query using .= based on whether it needs to add WHERE or AND to the query. This is decided by the if statements based on which filters are selected */

                if(isset($_POST["filter"])) {
                    
                    $query = "SELECT * FROM listings";
                    
                    if(!empty($_POST["location"])) {
                        $query .= " WHERE location='{$_POST["location"]}'";
                    }
                    
                    if(!empty($_POST["sleeps"])) {
                        if(!empty($_POST["location"])) {
                            $query .= " AND sleeps='{$_POST["sleeps"]}'";
                        } else {
                            $query .= " WHERE sleeps='{$_POST["sleeps"]}'";
                        }    
                    }
                    
                    if(!empty($_POST["type"])) {
                        
                        if(empty($_POST["sleeps"]) && empty($_POST["location"])) {
                            $query .= " WHERE type='{$_POST["type"]}'";
                        } 
                    }
                    
                    if(!empty($_POST["type"])) {
                        
                        if(!empty($_POST["sleeps"]) && !empty($_POST["location"])) {
                            $query .= " AND type='{$_POST["type"]}'";
                        } 
                    }
                    
                    if(empty($_POST["location"])) {
                        
                        if(!empty($_POST["sleeps"]) && !empty($_POST["type"])) {
                            $query .= " AND type='{$_POST["type"]}'";
                        } 
                    }
                    
                    if(!empty($_POST["location"])) {
                        
                        if(empty($_POST["sleeps"]) && !empty($_POST["type"])) {
                            $query .= " AND type='{$_POST["type"]}'";
                        } 
                    }
                                    
                    $result = mysqli_query($connection, $query);
                }

                if(!$result) {
                    die("Query Error");  
                }
            ?>
        
            <!-- contents div to show all listings using box.php -->
            <div class="content">
                <?php 
              //  include '../includes/advert.php';
                
                while($row = mysqli_fetch_assoc($result)) {
                    
                    include '../includes/box.php';  
                    
                }

                ?>
                <span id="stretch"></span>
            </div>
        </div>
        <?php
            mysqli_free_result($result);
            include_once("../includes/footer.php"); 
        ?>
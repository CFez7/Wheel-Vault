<?php 
    include_once("../includes/header.php"); 
    $_SESSION["uploadMessage"] = "";
    $_SESSION["accountmessage"] = "";
?>
<body class="ibg"> <!-- gives this body class ibg (to stop background slideshow) -->

        <div class="container">
            <!-- show navigation bar found at nav.php -->
            <div class="head">
                <?php include '../includes/nav.php'; ?>
            </div>
            <div class="log"> 
                
                <!-- If session username is set, display welcome with logout button. If not, show log in button. -->
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
                        
                $loadMore = $_SESSION["loadeditems"];
                        
                $query = "SELECT * FROM listings LIMIT 16";
                $result = mysqli_query($connection, $query); 

                if(!$result) {
                    die("Query Error");  
                }

            ?>  
            <?php 
/*php has many if statements so that no matter which filters you choose or leave blank it will always give back the relavent results. 
Basic query set as 'SELECT * FROM listings' then queries are added using .= based on whether it needs to add WHERE or AND to the query. 
This is decided by the if statements based on which filters are selected */

                if(isset($_POST["filter"])) {
                    
                    $query = "SELECT * FROM listings";
                    
                    if(!empty($_POST["size"])) {
                        $query .= " WHERE size='{$_POST["size"]}'";
                    }
                    
                    if(!empty($_POST["brand"])) {
                        if(!empty($_POST["size"])) {
                            $query .= " AND brand='{$_POST["brand"]}'";
                        } else {
                            $query .= " WHERE brand='{$_POST["brand"]}'";
                        }    
                    }
                    
                    if(!empty($_POST["width"])) {
                        
                        if(empty($_POST["size"]) && empty($_POST["brand"])) {
                            $query .= " WHERE rearwidth='{$_POST["width"]}' OR frontwidth='{$_POST["width"]}'";
                        } else {
                            if(!empty($_POST["size"]) OR !empty($_POST["brand"])) {
                                $query .= " AND rearwidth='{$_POST["width"]}' OR frontwidth='{$_POST["width"]}'";
                            }
                        }
                    }
                    
                    
                    if(!empty($_POST["offset"])) {
                        
                        if(empty($_POST["size"]) && empty($_POST["brand"]) && empty($_POST["width"])) {
                            $query .= " WHERE frontoffset='{$_POST["offset"]}' OR rearoffset='{$_POST["offset"]}'";
                        } else {
                            if(!empty($_POST["size"]) OR !empty($_POST["brand"]) OR !empty($_POST["width"])) {
                                $query .= " AND frontoffset='{$_POST["offset"]}' rearoffset='{$_POST["offset"]}'";
                            }
                        }
                    }
                    
                    if(!empty($_POST["studpattern"])) {
                        
                        if(empty($_POST["size"]) && empty($_POST["brand"]) && empty($_POST["width"]) && empty($_POST["offset"])) {
                            $query .= " WHERE studpattern='{$_POST["studpattern"]}'";
                        } else {
                            if(!empty($_POST["size"]) OR !empty($_POST["brand"]) OR !empty($_POST["width"]) OR !empty($_POST["offset"])) {
                                $query .= " AND studpattern='{$_POST["studpattern"]}'";
                            }
                        }
                    }
                                    
                    $result = mysqli_query($connection, $query);
                }

                if(!$result) {
                    die("Query Error");  
                }
            ?>
        
            <!-- contents div to show all listings using box.php which repeats until all listings are displayed.
                 Currently no pagination support. -->
            <div class="content">
                <?php 
                
            <!-- Potential for advert support - Currently commented out --> 
              // include '../includes/advert.php';
                
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

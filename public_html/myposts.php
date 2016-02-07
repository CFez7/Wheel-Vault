<?php include_once("../includes/header.php"); ?>
<body class="ibg"> <!-- gives this body class ibg (to stop background slideshow) -->

    <div class="container">
        <!-- show navigation bar found at nav.php -->
        <div class="head">
            <?php include '../includes/nav.php'; ?>
        </div>
        <div class="log"> 
            <p style="display:inline;position:absolute;left:250px;top:5px;text-align:center">
                    <?php echo ucfirst($_SESSION["message"]); ?>
            </p>
            <!-- If session username is set, display welcome, logout. If not show log in. -->
            <?php if(isset($_SESSION["name"])) { ?>
                <?php include '../includes/logged-in-nav.php'; ?>
            <?php } else { ?>
                    <?php include '../includes/login-nav.php'; ?>
            <?php } ?>
        </div>

        <div class="content">
            <div>
                <?php if(!isset($_SESSION["name"])) { ?>
                    <p style="text-align:center">Please log in to view account posts.</p>
                <?php }else{ ?>
                <?php 
    
                    echo $_SESSION["userID"];
    
                    $ownerID = $_SESSION["userID"];
                            
                    $query = "SELECT * FROM listings WHERE ownerID = '{$ownerID}'";
    
                    $result = mysqli_query($connection, $query);
                    
                    while($row = mysqli_fetch_assoc($result)) {
                    
                    include '../includes/box.php';  
                    
                }

            ?>
            </div>
        </div>

    <?php } ?>
    <?php
        include_once("../includes/footer.php"); 
    ?>
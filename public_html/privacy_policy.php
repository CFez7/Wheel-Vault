<?php include_once("../includes/header.php"); ?>
<body class="ibg"> <!-- gives this body class ibg (to stop background slideshow) -->

        <div class="container">
            <!-- show navigation bar found at nav.php -->
            <div class="head">
                <?php include '../includes/nav.php'; ?>
            </div>
            <div class="log"> 
                
                <!-- If session username is set, display welcome, logout. If not show log in. -->
                <p style="display:inline;position:absolute;right:300px;top:5px;text-align:center">                 <?php if(isset($_SESSION["message"])) {
                    echo ucfirst($_SESSION["message"]);}
                ?>
                <?php if(isset($_SESSION["username"])) { ?>
                    <?php include '../includes/logged-in-nav.php'; ?>
                <?php } else { ?>
                        <?php include '../includes/login-nav.php'; ?>
                <?php } ?>
            </div>
            
            <div id="reg-background">
                
                <h1 style="margin:0; text-align:center">Privacy Policy!</h1>
                
                <p></p>
                
            </div>
            
        </div>
    
        <?php
            include_once("../includes/footer.php"); 
        ?>
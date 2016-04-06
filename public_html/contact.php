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
            
            <div class="box-background">
                
                <h1 style="margin:0; text-align:center">Contact Us</h1>
                
                <div class="contact" id="contact">
                    <h3 style="font-weight:500">We would love to hear from you.</h3><br>
                    <input type="hidden" name="_config" value="default" />
                    <FORM METHOD="POST" ACTION="../cgi-bin/TFmail.pl">
                        <input class="formtextbox" type="text" name="name" placeholder="Name"><br>
                        <input class="formtextbox" type="text" name="email" placeholder="Email"><br>
                        <input class="formtextbox" type="text" name="subject" placeholder="Subject"><br>
                        <input class="formtextbox" type="text" name="company" placeholder="Company Name"><br>
                        <textarea class="formtextbox" type="textarea" name="message" placeholder="Message" style="height:200px;resize:none"></textarea><br>
                        <input style="" type="submit" name="submit" value="Send Message">
                    </form>
                </div>
                
            </div>
            
        </div>
    
        <?php
            include_once("../includes/footer.php"); 
        ?>
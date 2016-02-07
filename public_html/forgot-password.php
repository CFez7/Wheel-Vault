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
                    <div class="logged-in">
                        <p>Welcome back <?php echo ucfirst($_SESSION["name"]); ?>!  <a href="../includes/logout.php"><button class="logoutin-button">Logout</button></a></p>
                    </div>
                    <?php } else { ?>
                            <?php include '../includes/login-nav.php'; ?>
                    <?php } ?>
            </div>
            
            <div class="box-background">
                
                <h1 style="margin:0; text-align:center">Forgotten Password</h1>
                
                <table style="width:100%">
                    <tr>
                        <td style="text-align:center;">
                            <p><font color="red">*</font>Registered Email:</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            <form action="#" method="post" enctype="text/plain">
                                <input name="name" type="text" size="35">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                                <input class="form-button" name="resetpassword" type="submit" value="SUBMIT">
                            </form>
                        </td>
                    </tr>
                </table>
                
            </div>
        </div>
        <?php
            include_once("../includes/footer.php"); 
        ?>
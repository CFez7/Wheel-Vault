<?php include_once("../includes/header.php"); ?>
<body class="ibg"> <!-- gives this body class ibg (to stop background slideshow) -->

        <div class="container">
            <!-- show navigation bar found at nav.php -->
            <div class="head">
                <?php include '../includes/nav.php'; ?>
            </div>
            <div class="log"> 
                
                <!-- If session username is set, display welcome, logout. If not show log in. -->
                <p style="display:inline;position:absolute;right:200px;top:5px;text-align:center">
                <?php if(isset($_SESSION["name"])) { ?>
                    <?php include '../includes/logged-in-nav.php'; ?>
                <?php } else { ?>
                        <?php include '../includes/login-nav.php'; ?>
                <?php } ?>
            </div>
            
            <div class="box-background">
                <?php if(isset($_SESSION["name"])) { ?>
                    <p style="text-align:center">Please log out to register.</p>
                <?php }else{ ?>
                
                <p><?php if(isset($_SESSION["regmessage"])) {
                    echo ucfirst($_SESSION["regmessage"]);}
                ?></p>
                
                <h1 style="margin:0; text-align:center">Register!</h1><br>
                <div style="text-align:center">
                    <p style="margin-top:0px;">Registering will allow you to add your own adverts to the site!<br>Contact info entered here can be used on the adverts.</p>
                </div>
                
                <form action="scripts/register.php" method="post">
                    <table style="width: 100%">
                        <tr>
                            <td style="width:35%; text-align:right">
                                <strong><p><font color="red">*</font>Name:</p></strong>
                            </td>
                            <td style="width:65%">
                                <input name="name" type="text" size="35" style="margin:9px 0px">
                            </td>
                        </tr>
                        <tr>
                            <td style="width:35%; text-align:right">
                                <strong><p><font color="red">*</font>Email:</p></strong>
                            </td>
                            <td style="width:65%">
                                <input name="email" type="email" size="35" style="margin:9px 0px">
                            </td>
                        </tr>
                        <tr>
                            <td style="width:35%; text-align:right">
                                <strong><p><font color="red">*</font>Phone:</p></strong>
                            </td>
                            <td style="width:65%">
                                <input name="phone" type="text" size="35" style="margin:9px 0px">
                            </td>
                        </tr>
                        <tr>
                            <td style="width:35%; text-align:right">
                                <strong><p><font color="red">*</font>Location:</p></strong>
                            </td>
                            <td style="width:65%">
                               <input name="location" type="text" size="35" style="margin:9px 0px">
                            </td>
                        </tr>
                        <tr>
                            <td style="width:35%; text-align:right">
                                <strong><p><font color="red">*</font>Password:</p></strong>
                            </td>
                            <td style="width:65%">
                               <input name="upassword" type="password" size="35" style="margin:9px 0px">
                            </td>
                        </tr>
                        <tr>
                            <td style="width:35%; text-align:right">
                                <strong><p><font color="red">*</font>Confirm Password:</p></strong>
                            </td>
                            <td style="width:65%">
                               <input name="checkpass" type="password" size="35" style="margin:9px 0px">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="width:35%; text-align:centre">
                                <input class="form-button" name="register" type="submit" value="REGISTER">
                            </td>
                        </tr>
                    </table>
                </form>
                
                <p style="font-size:10px; font-weight:bold; text-align:center">By registering you agree to the 
<a href="user_agreement.php" target="_blank">Wheel Vault User Agreement</a> and have read and understood the <a href="privacy_policy.php" target="_blank">Wheel Vault Privacy Policy.</a></p>
                </div>
            </div>
        <?php } ?>
        <?php
            include_once("../includes/footer.php"); 
        ?>
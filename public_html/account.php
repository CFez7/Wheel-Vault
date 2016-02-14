<?php include_once("../includes/header.php"); ?>
<body class="ibg"> <!-- gives this body class ibg (to stop background slideshow) -->

        <div class="container">
            <!-- show navigation bar found at nav.php -->
            <div class="head">
                <?php include '../includes/nav.php'; ?>
            </div>
            <div class="log"> 
                <p class="sessionMessage">
                        <?php echo ucfirst($_SESSION["accountmessage"]); ?>
                </p>
                <!-- If session username is set, display welcome, logout. If not show log in. -->
                <?php if(isset($_SESSION["name"])) { ?>
                    <?php include '../includes/logged-in-nav.php'; ?>
                <?php } else { ?>
                        <?php include '../includes/login-nav.php'; ?>
                <?php } ?>
            </div>
            
            <div class="box-background"> 
                <div id="noedit"> 
                <?php if(!isset($_SESSION["name"])) { ?> 
                    <p style="text-align:center">Please log in to view account details.</p>
                <?php }else{ ?>
                    <h1 style="margin: 5px 0px;">Your Account Details:</h1>
                    <p style="width:300px;display:inline-block"><strong style="margin-right:20px">Name: </strong><?php echo ucfirst($_SESSION["name"]); ?></p><br>
                    <p style="width:300px;display:inline-block"><strong style="margin-right:22px">Email: </strong><?php echo ucfirst($_SESSION["email"]); ?></p><br>
                    <p style="width:300px;display:inline-block"><strong style="margin-right:17px">Phone: </strong><?php echo ucfirst($_SESSION["phone"]); ?></p>
                    <p style="width:300px;display:inline-block"><strong style="margin-right:17px">Location: </strong><?php echo ucfirst($_SESSION["location"]); ?></p>
                    <p style="width:300px;display:inline-block"><strong style="margin-right:17px">Password: </strong>******</p>
                <br><br>
                <button id="startedit" class="blue-button" name="edit-account" style="width:100px">Edit Details</button>
                <button id="deleteAccountBttn" class="red-button" name="delete-account" style="width:130px">Delete Account</button>
                </div>
            
                
                    
                    
                <div id="editting" style="display:none">
                    <div>
                        <p><?php if(isset($_SESSION["accmessage"])) {
                            echo ucfirst($_SESSION["accmessage"]);}
                        ?></p>
                        <h1 style="margin:0">Your Account Details:</h1><br>
                        <p style="font-size:14px; margin:0px;margin-bottom:10px"><strong><font color="yellow">NOTE: </font></strong>Leaving a field blank will remove it from your account.</p>
                            <div class="form-text">
                                <strong><p style="display:inline-block;margin:10px 0px">Name:</p></strong><br>
                                <strong><p style="display:inline-block;margin:10px 0px">Email:</p></strong><br>
                                <strong><p style="display:inline-block;margin:10px 0px">Phone:</p></strong><br>
                                <strong><p style="display:inline-block;margin:10px 0px">Location:</p></strong><br>
                                <p style="color:red; display:inline-block; margin:10px 0px">*</p>
                                <strong><p style="display:inline-block;margin:10px 0px">Current Password:</p></strong><br>
                            </div>
                            <div class="form-boxes">
                                <form action="scripts/changeAccount.php" method="post" style="margin-bottom:50px">
                                    <input name="changename" value="<?php echo ucfirst($_SESSION["name"]); ?>" type="text" size="35" style="margin:12px 0px">
                                    <input name="changeemail" value="<?php echo ucfirst($_SESSION["email"]); ?>" type="text" size="35" style="margin:12px 0px">
                                    <input name="changephone" value="<?php echo ucfirst($_SESSION["phone"]); ?>" type="text" size="35" style="margin:12px 0px">
                                    <input name="changelocation" value="<?php echo ucfirst($_SESSION["location"]); ?>" type="text" size="35" style="margin:9px 0px">
                                    <input name="upassword" type="password" size="35" style="margin:10px 0px">
                                    
                                    <input style="left:50px" class="form-button" name="changeDetails" type="submit" value="CHANGE">
                                </form>
                            </div>
                    </div>
                    <div>
                        <div class="form-text">
                            <strong><p style="display:inline-block;margin:10px 0px">Current Password:</p></strong><br>
                            <strong><p style="display:inline-block;margin:10px 0px">New Password:</p></strong><br>
                            <strong><p style="display:inline-block;margin:10px 0px">Confirm Password:</p></strong><br>
                        </div>
                        <div class="form-boxes">
                            <form action="scripts/changepassword.php" method="post" style="margin-bottom:50px">
                                <input name="upassword" type="password" size="35" style="margin:10px 0px">
                                <input name="newpassword" type="password" size="35" style="margin:10px 0px">
                                <input name="passcheck" type="password" size="35" style="margin:10px 0px">
                                <input style="left:50px" class="form-button" name="changePassword" type="submit" value="CHANGE">
                            </form>
                        </div>
                        <button class="blue-button" id="canceledit" style="width:100px; position:relative; right:460px; top:40px">Cancel</button>
                    </div>
                </div>
            </div>
            <div class="popUpBg" id="deleteAccount">
                <div id="deleteAccountContent">
                    <h1>Account Deletion</h1>
                    <p>Are you sure you want to delete your account perminantly?</p>
                    <form action="scripts/deleteaccount.php" method="post">
                        <input name="deletePass" type="password" placeholder="Confirm Password" size="35" style="margin-bottom:10px"><br>
                        <input class="red-button" name="confirmDelete" style="width:100px; text-align:center" type="submit" value="DELETE">
                    </form>
                    <button class="blue-button" id="cancelDelete" style="width:100px; position:relative; top:-30px; left:150px">Cancel</button>
                </div>
            </div>
        <?php } ?>
        <?php
            include_once("../includes/footer.php"); 
        ?>
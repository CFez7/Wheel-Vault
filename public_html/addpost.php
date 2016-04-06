<?php 
    include_once("../includes/header.php"); 
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

        <div class="box-background">
            <?php if(!isset($_SESSION["name"])) { ?>
                <p style="text-align:center">Please log in to add post.</p>
            <?php }else{ ?>

            <p><?php if(isset($_SESSION["uploadMessage"])) {
                echo ucfirst($_SESSION["uploadMessage"]);}
            ?></p>

            <h1 style="margin:0px; text-align:center">Add Post!</h1><br>

            <table style="width: 100%">
                <form enctype="multipart/form-data" action="scripts/upload.php" method="post">
                    <tr>
                        <td style="width:35%; text-align:right">
                            <strong><p style="margin:0px"><font color="red">*</font>Title:</p></strong>
                        </td>
                        <td style="width:65%">
                            <input name="title" type="text" size="35" style="margin:10px 0px">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:35%; text-align:right">
                            <strong><p style="margin:0px"><font color="red">*</font>Size:</p></strong>
                        </td>
                        <td style="width:65%">
                            <input name="size" placeholder="18" type="c" size="35" style="margin:10px 0px;width:245px">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:35%; text-align:right">
                            <strong><p style="margin:0px"><font color="red">*</font>Brand:</p></strong>
                        </td>
                        <td style="width:65%">
                            <input name="brand" placeholder="3SDM" type="text" size="35" style="margin:10px 0px">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:35%; text-align:right">
                            <strong><p style="margin:0px">Width:</p></strong>
                        </td>
                        <td style="width:65%">
                            <input name="frontwidth" placeholder="Front (7.5)" type="text" size="16" style="margin:10px 0px; width:110px">
                            <strong><p style="display:inline-block;margin:0px">&</p></strong>
                            <input name="rearwidth" placeholder="Rear (8.5)" type="text" size="16" style="display:inline-block;margin:10px 0px; width:110px">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:35%; text-align:right">
                            <strong><p style="margin:0px">Stud Pattern:</p></strong>
                        </td>
                        <td style="width:65%">
                            <input name="studpattern" placeholder="5x100" type="text" size="35" style="margin:10px 0px;">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:35%; text-align:right">
                            <strong><p style="margin:0px">Offset:</p></strong>
                        </td>
                        <td style="width:65%">
                            <input name="frontoffset" placeholder="Front (35)" type="text" size="16" style="margin:10px 0px; width:110px">
                            <strong><p style="display:inline-block;margin:0px">&</p></strong>
                            <input name="rearoffset" placeholder="Rear (30)" type="text" size="16" style="display:inline-block;margin:10px 0px; width:110px">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:35%; text-align:right">
                            <strong><p style="margin:0px"><font color="red">*</font>Description:</p></strong>
                        </td>
                        <td style="width:65%">
                            <textarea name="description" type="text" style="font-size:14px; height:100px; width:245px; resize:none; margin:10px 0px"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:35%; text-align:right">
                            <strong><p style="margin:0px"><font color="red">*</font>Price: £</p></strong>
                        </td>
                        <td style="width:65%">
                            <input name="price" placeholder="500" type="text" size="35" style="margin:10px 0px;width:245px">
                        </td>
                    </tr>
                </table>
                <table style="width: 100%; margin-top: -15px;">
                    <tr>
                        <td style="width:25%">
                            <button class="optionUp" type="button">Swaps?<br>
                                <div class="check1">	
                                    <input type="checkbox" value="true" id="check1" name="swaps" />
                                    <label for="check1"></label>
                                </div>
                            </button>
                        </td>
                        <td style="width:25%">
                            <button class="optionUp" type="button">Show Phone #? <br>
                                <div class="check2">	
                                    <input type="checkbox" value="true" id="check2" name="ownerPhone" />
                                    <label for="check2"></label>
                                </div>
                            </button>
                        </td>
                        <td style="width:25%">
                            <button class="optionUp" type="button">Show Email?<br>
                                <div class="check3">	
                                    <input type="checkbox" value="true" id="check3" name="ownerEmail" />
                                    <label for="check3"></label>
                                </div>
                            </button>
                        </td>
                        <td style="width:25%">
                            <button class="optionUp" type="button">Show Location?<br>
                                <div class="check4">	
                                    <input type="checkbox" value="true" id="check4" name="ownerLocation" />
                                    <label for="check4"></label>
                                </div>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p style="text-align:right"><font style="color:red">*</font>Image Upload:</p>
                        </td>
                        <td colspan="2">
                            <input type="file" name="photo" size="5" style="margin:10px;color:transparent">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="text-align:center">Image 2:</p>
                            <input type="file" name="photo2" style="margin:0px;margin-left:35px; width:100%; color:transparent">
                        </td>
                        <td>
                            <p style="text-align:center">Image 3:</p>
                            <input type="file" name="photo3" style="margin:0px;margin-left:35px; width:100%; color:transparent">
                        </td>
                        <td>
                            <p style="text-align:center">Image 4:</p>
                            <input type="file" name="photo4" style="margin:0px;margin-left:35px; width:100%; color:transparent">
                        </td>
                        <td>
                            <p style="text-align:center">Image 5:</p>
                            <input type="file" name="photo5" style="margin:0px;margin-left:35px; width:75%; color:transparent">
                        </td>
                    </tr>
                    <br><br>
                </table>

                <input style="margin-top:30px" class="form-button" name="addpost" type="submit" value="Post Advert">
                </form>

            <p style="font-size:12px; text-align:center"> By posting this advert you agree to the <a href="posting_policy.php" target="_blank"><strong>Wheel Vault Posting Agreement</strong></a>.</p>
            <p style="font-size:12px; text-align:center"> <strong>NOTE:</strong> Upload of image will be skipped if it is incompatible.</a></p>
            </div>
        </div>
    <?php } ?>
    <?php
        include_once("../includes/footer.php"); 
    ?>
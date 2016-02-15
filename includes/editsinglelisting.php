<div id="deletepost" class="popUpBg">
    <div id="deleteAccountContent">
        <h1>Listing Deletion</h1>
        <p>Are you sure you want to delete this listing perminantly?</p>
        <form action="scripts/deletePost.php" method="post">
            <input hidden="hidden" name="listingID" value="<?php echo $row["id"]; ?>">
            <input hidden="hidden" name="mainImage" value="<?php echo $row["mainImage"]; ?>">
            <input hidden="hidden" name="thumb1" value="<?php echo $row["thumb1"]; ?>">
            <input hidden="hidden" name="thumb2" value="<?php echo $row["thumb2"]; ?>">
            <input hidden="hidden" name="thumb3" value="<?php echo $row["thumb3"]; ?>">
            <input hidden="hidden" name="thumb4" value="<?php echo $row["thumb4"]; ?>">
            <input name="deletePass" type="password" placeholder="Confirm Password" size="35" style="margin-bottom:10px"><br>
            <button type="button" class="blue-button" id="cancelPostDelete" style="width:100px">Cancel</button>
            <input class="red-button" name="confirmDelete" style="width:100px; text-align:center" type="submit" value="DELETE">
        </form>
    </div>
</div>

<div>
    <h1 style="margin:0px 0px 10px 15px; font-family: 'Candal', sans-serif;">
        Edit Post "<?php echo $row["title"]; ?>"
    </h1>
    <button id="deletePostBttn" class="red-button" style="background-color:darkred;width:130px;float:right; position:relative; left:-10px; top:-45px; clear: both;">
        DELETE POST
    </button>
    <?php

        if($_SESSION['userID'] != $row['ownerID']) { ?>
            
       <?php } else { ?>
            <a href="listing.php?id=<?php echo $row["id"]; ?>">
                <button style="float:right; position:relative; left:-160px; top:-74px; clear: both;" id="view" type="button">
                    CANCEL
                </button>
            </a>
        <?php } ?>
        <h3><?php echo $_SESSION["editPostMessage"]; ?></h3>
        <table style="width: 100%">
            <form enctype="multipart/form-data" action="scripts/editlistingdetails.php" method="post">
                <input hidden="hidden" name="listingID" value="<?php echo $row["id"]?>">
                <tr>
                    <td style="width:35%; text-align:right">
                        <strong><p style="margin:0px"><font color="red">*</font>Title:</p></strong>
                    </td>
                    <td style="width:65%">
                        <input name="title" value="<?php echo $row["title"]; ?>" type="text" size="35" style="margin:10px 0px">
                    </td>
                </tr>
                <tr>
                    <td style="width:35%; text-align:right">
                        <strong><p style="margin:0px"><font color="red">*</font>Size:</p></strong>
                    </td>
                    <td style="width:65%">
                        <input name="size" value="<?php echo $row["size"]; ?>" type="text" size="35" style="margin:10px 0px;width:245px">
                    </td>
                </tr>
                <tr>
                    <td style="width:35%; text-align:right">
                        <strong><p style="margin:0px"><font color="red">*</font>Brand:</p></strong>
                    </td>
                    <td style="width:65%">
                        <input name="brand" value="<?php echo ucfirst($row["brand"]); ?>" type="text" size="35" style="margin:10px 0px">
                    </td>
                </tr>
                <tr>
                    <td style="width:35%; text-align:right">
                        <strong><p style="margin:0px">Width:</p></strong>
                    </td>
                    <td style="width:65%">
                        <input name="frontwidth" value="<?php echo ucfirst($row["frontwidth"]);?>" type="text" size="16" style="margin:10px 0px; width:110px">
                        <strong><p style="display:inline-block;margin:0px">&</p></strong>
                        <input name="rearwidth" value="<?php echo ucfirst($row["rearwidth"]);?>" type="text" size="16" style="display:inline-block;margin:10px 0px; width:110px">
                    </td>
                </tr>
                <tr>
                    <td style="width:35%; text-align:right">
                        <strong><p style="margin:0px">Stud Pattern:</p></strong>
                    </td>
                    <td style="width:65%">
                        <input name="studpattern1" value="<?php echo $row["studpattern1"]; ?>" type="text" size="16" style="margin:10px 0px;width:110px">
                        <strong><p style="display:inline-block;margin:0px">x</p></strong>
                        <input name="studpattern2" value="<?php echo $row["studpattern2"]; ?>" type="text" size="16" style="display:inline-block;margin:10px 0px;width:112px">
                    </td>
                </tr>
                <tr>
                    <td style="width:35%; text-align:right">
                        <strong><p style="margin:0px">Offset:</p></strong>
                    </td>
                    <td style="width:65%">
                        <input name="frontoffset" value="<?php echo $row["frontoffset"]; ?>" type="text" size="16" style="margin:10px 0px; width:110px">
                        <strong><p style="display:inline-block;margin:0px">&</p></strong>
                        <input name="rearoffset" value="<?php echo $row["rearoffset"]; ?>" type="text" size="16" style="display:inline-block;margin:10px 0px; width:110px">
                    </td>
                </tr>
                <tr>
                    <td style="width:35%; text-align:right">
                        <strong><p style="margin:0px"><font color="red">*</font>Description:</p></strong>
                    </td>
                    <td style="width:65%">
                        <textarea name="description" type="text" style="font-size:14px; height:100px; width:245px; resize:none; margin:10px 0px"><?php echo $row["description"]; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width:35%; text-align:right">
                        <strong><p style="margin:0px"><font color="red">*</font>Price: £</p></strong>
                    </td>
                    <td style="width:65%">
                        <input name="price" value="<?php echo $row["price"]; ?>" type="text" size="35" style="margin:10px 0px;width:245px">
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
                <br><br>
                <tr>
                    <td colspan="1"></td>
                    <td colspan="2">
                        <input style="margin-bottom:50px; margin-top:30px" class="form-button" name="changepostdetails" type="submit" value="Change Details">
                    </td>
                    <td colspan="1"></td>
                </tr>
                </form>
            </table>
            
        
            <div id="gallery" style="width:100%">
                <form enctype="multipart/form-data" action="scripts/editlistingimages.php" method="post">
                    <input hidden="hidden" name="listingID" value="<?php echo $row["id"]?>">
                    <table style="margin-bottom:50px">
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
                    </table>
                
                    <img src="../includes/listings/<?php echo $row["mainImage"]?>" class="thumbnail">
                    <img src="../includes/listings/<?php echo $row["thumb1"]?>" class="thumbnail">
                    <img src="../includes/listings/<?php echo $row["thumb2"]?>" class="thumbnail">
                    <img src="../includes/listings/<?php echo $row["thumb3"]?>" class="thumbnail">
                    <img src="../includes/listings/<?php echo $row["thumb4"]?>" class="thumbnail">
                    <span class="stretch"></span>

                    <input class="form-button" name="changeimages" type="submit" value="Change Images">
                </form>
            </div>

        </div>
</div>
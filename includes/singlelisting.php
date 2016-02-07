<div id="singleListing">
    <h1 style="margin:0px 0px 10px 15px;"><?php echo ucwords($row["title"]); ?></h1>
    <a href="index.php"><button id="back" type="button" style="float:right; position:relative; left:-10px; top:-45px; clear: both;">BACK</button></a>
    <?php

        if($_SESSION['userID'] != $row['ownerID']) { ?>
            
       <?php } else { ?>
            <a href="listing.php?id=<?php echo $row["id"]; ?>">
                <button style="float:right; position:relative; left:-120px; top:-74px; clear: both;" id="view" type="button">EDIT</button>
        </a>
        <?php } ?>
    
    <div id="gallery">
        <div style="height:300px">
            <img id="mainimage" src="images/listings/<?php echo $row["mainImage"];?>"><br>
        </div>
        
        <img src="images/listings/<?php echo $row["mainImage"]?>" class="thumbnail">
        <img src="images/listings/<?php echo $row["thumb1"]?>" class="thumbnail">
        <img src="images/listings/<?php echo $row["thumb2"]?>" class="thumbnail">
        <img src="images/listings/<?php echo $row["thumb3"]?>" class="thumbnail">
        <img src="images/listings/<?php echo $row["thumb4"]?>" class="thumbnail">
        <span class="stretch"></span>
    </div>
    <div id="info">
        <div id="details">
            <p style="display:inline;">
                <?php echo ucfirst($row["size"]);?>" 
            <font color="red">|</font> <?php echo ucfirst($row["brand"]); ?> 
            <font color="red">|</font> <?php echo ucfirst($row["frontwidth"]);?>j x <?php echo ucfirst($row["rearwidth"]);?>j
            <font color="red">|</font> ET<?php echo $row["frontoffset"]; ?> x <?php echo $row["rearoffset"]; ?>
            <font color="red">|</font> <?php echo $row["studpattern1"]; ?>x<?php echo $row["studpattern2"]; ?>
            </p>
        </div>
        <div id="description">
            <p><?php echo ucfirst($row["description"]); ?></p>
        </div>
        
        <h2>Contact Info:</h2>
        
        <?php if($row['ownerLocation'] != "") { ?>
        <div id="location">
            <p><?php echo ucfirst($row["ownerLocation"]); ?></p>
        </div>
        <?php } ?>
        
        <?php if($row['ownerPhone'] != "") { ?>
        <div id="phone">
            <p>0<?php echo ucfirst($row["ownerPhone"]); ?></p>
        </div>
        <?php } ?>
        
        <?php if($row['ownerEmail'] != "") { ?>
        <div id="email">
            <p><?php echo ucfirst($row["ownerEmail"]); ?></p>
        </div>
        <?php } ?>
        
        <div id="price" style="margin-left:50px; width:300px">
            <h1 style="text-align:center">£<?php echo $row["price"];?>
            <br>
            <?php
                if($row['swaps'] == 'Yes') {
                    echo "Or To Swap";
                } else {
                    echo "No Swaps";
                }
            ?>
            </h1> 
        </div>
    </div>
</div>
<!-- styling template for the listing box for each listing to conform to -->
<!-- includes database $row data automatically -->
<div id="box">
    <h1 style="margin:0px 0px 10px 15px; position:relative; top:-25px;text-align:center"><?php echo ucwords($row["title"]); ?></h1>
        <p style="margin:auto;text-align:center;position:relative;top:-35px; width:400px">
            <?php echo ucfirst($row["size"]);?>" 
            <font color="red">|</font> <?php echo ucfirst($row["brand"]); ?> 
            <font color="red">|</font> <?php echo ucfirst($row["frontwidth"]);?>j x <?php echo ucfirst($row["rearwidth"]);?>j
            <font color="red">|</font> ET<?php echo $row["frontoffset"]; ?> x <?php echo $row["rearoffset"]; ?>
            <font color="red">|</font> <?php echo $row["studpattern1"]; ?>x<?php echo $row["studpattern2"]; ?>
        </p>
    <div style="float:left; width:200px; height:200px; display:inline-block; margin-top:-25px; margin-right:10px; background: url('images/listings/<?php echo $row["mainImage"]?>') 50% 50% no-repeat; background-size: cover; background-repeat:no-repeat">
    </div>
    <div id="box-info">
        <p id="box-description"><?php echo ucfirst($row["description"]); ?></p>
    </div>
    <div id="price">
        <h1 style="margin:0px;">£<?php echo $row["price"]; ?></h1>
        <a href="listing.php?id=<?php echo $row["id"]; ?>">
            <button id="view" type="button">VIEW</button>
        </a>
    </div>
</div>
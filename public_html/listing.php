
<?php
    // Gets listing ID from URL to filter content.
    if(isset($_GET["id"])) {
      $listingID = $_GET["id"];
    } 
?>
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
            <!-- Below query filters content to only retrieve selected listing details. -->
            <?php 

                $query = "SELECT * FROM listings WHERE listing_id='{$listingID}'";
                $result = mysqli_query($connection, $query); 
                if(!$result) {
                    die("Query Error");  
                }

            ?>  
            
            <div class="listing-background">
                <div class="gallery">
                    <?php 
                        while($row = mysqli_fetch_assoc($result)) {
                            include '../includes/singlelisting.php'; 
                        }
                    ?>
                </div>
            </div>
        <?php
            mysqli_free_result($result);
            include_once("../includes/footer.php"); 
        ?>

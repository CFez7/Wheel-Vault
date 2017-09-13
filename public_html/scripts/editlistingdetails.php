<?php
    require_once("../../includes/session.php");
    require_once("../../includes/connect.php");
?>
<?php
    
    if(isset($_POST["changepostdetails"])) { 
        $owner          = $_SESSION["userID"];
        $currenttitle   = $_POST["currenttitle"];
        $title          = $_POST["title"];
        $frontwidth     = $_POST["frontwidth"];
        $rearwidth      = $_POST["rearwidth"];
        $size           = $_POST["size"];
        $brand          = $_POST["brand"];
        $studpattern    = $_POST["studpattern"];
        $frontoffset    = $_POST["frontoffset"];
        $rearoffset     = $_POST["rearoffset"];
        $description    = $_POST["description"];
        $price          = $_POST["price"];
        $listingID      = $_POST["listingID"];
        $mainImage      = $_POST["mainImage"];
        $thumb1         = $_POST["thumb1"];
        $thumb2         = $_POST["thumb2"];
        $thumb3         = $_POST["thumb3"];
        $thumb4         = $_POST["thumb4"];
    } else {
        $owner = "";
        $currenttitle = "";
        $title = "";
        $frontwidth = "";
        $rearwidth = "";
        $size = ""; 
        $brand = ""; 
        $studpattern = ""; 
        $frontoffset = "";
        $rearoffset = ""; 
        $description = "";
        $price = ""; 
        $listingID = "";
        $mainImage      = "";
        $thumb1         = "";
        $thumb2         = "";
        $thumb3         = "";
        $thumb4         = "";
    }

    if($_POST['ownerPhone'] == 'true') {
            $ownerPhone = $_SESSION["phone"];
        } else {
            $ownerPhone = "";
        }
    if($_POST['ownerEmail'] == 'true') {
            $ownerEmail = $_SESSION["email"];
        } else {
            $ownerEmail = "";
        }
    if($_POST['ownerLocation'] == 'true') {
            $ownerLocation = $_SESSION["location"];
        } else {
            $ownerLocation = "";
        }
    if($_POST['swaps'] == 'true') {
            $swaps = "Yes";
        } else {
            $swaps = "No";
        }
     
    if(empty($_POST['title'])) {
                $_SESSION['editPostMessage'] = "Title field empty!";
                header("Location: ../editlisting?id=$listingID.php");
            } else {
        if(empty($_POST['size'])) {
                $_SESSION['editPostMessage'] = "Size field empty!";
                header("Location: ../editlisting?id=$listingID.php");
            } else {
        if(empty($_POST['brand'])) {
                $_SESSION['editPostMessage'] = "Brand field empty!";
                header("Location: ../editlisting?id=$listingID.php");
            } else {
        if(empty($_POST['description'])) {
                $_SESSION['editPostMessage'] = "Description field empty!";
                header("Location: ../editlisting?id=$listingID.php");
            } else {
        if(empty($_POST['price'])) {
                $_SESSION['editPostMessage'] = "Price field empty!";
                header("Location: ../editlisting?id=$listingID.php");
            } else {
            
                // Check to see if image already exists for this listing and either remove and replace, just upload.
            
                if(file_exists("../../includes/listings/".$mainImage)) {
                    $currentname1 = "../../includes/listings/".$mainImage;
                    $newfilename1 = "../../includes/listings/".$owner."-".$title."-1";
                    rename("$currentname1", "$newfilename1");
                    $newMainImage = $owner."-".$title."-1";
                } else {
                    $newMainImage = "default";
                }   
                if(file_exists("../../includes/listings/".$thumb1)) {
                    $currentname2 = "../../includes/listings/".$thumb1;
                    $newfilename2 = "../../includes/listings/".$owner."-".$title."-2";
                    rename("$currentname2", "$newfilename2");
                    $newThumb1 = $owner."-".$title."-2";
                } else {
                    $newThumb1 = "default";   
                }
                if(file_exists("../../includes/listings/".$thumb2)) {
                    $currentname3 = "../../includes/listings/".$thumb2;
                    $newfilename3 = "../../includes/listings/".$owner."-".$title."-3";
                    rename("$currentname3", "$newfilename3");
                    $newThumb2 = $owner."-".$title."-3";
                } else {
                    $newThumb2 = "default";   
                }
                if(file_exists("../../includes/listings/".$thumb3)) {
                    $currentname4 = "../../includes/listings/".$thumb3;
                    $newfilename4 = "../../includes/listings/".$owner."-".$title."-4";
                    rename("$currentname4", "$newfilename4");
                    $newThumb3 = $owner."-".$title."-4";
                } else {
                    $newThumb3 = "default";
                }
                if(file_exists("../../includes/listings/".$thumb4)) {
                    $currentname5 = "../../includes/listings/".$thumb4;
                    $newfilename5 = "../../includes/listings/".$owner."-".$title."-5";
                    rename("$currentname5", "$newfilename5");
                    $newThumb4 = $owner."-".$title."-5";
                } else {
                    $newThumb4 = "default";
                }
              
             $query = "UPDATE listings SET title='{$title}', frontwidth='{$frontwidth}', rearwidth='{$rearwidth}', size='{$size}', brand='{$brand}', studpattern='{$studpattern}', frontoffset='{$frontoffset}', rearoffset='{$rearoffset}', description='{$description}', price='{$price}', ownerPhone='{$ownerPhone}', ownerEmail='{$ownerEmail}', ownerLocation='{$ownerLocation}', swaps='{$swaps}', mainImage='{$newMainImage}', thumb1='{$newThumb1}', thumb2='{$newThumb2}', thumb3='{$newThumb3}', thumb4='{$newThumb4}' WHERE listing_id='{$listingID}'";
        
             $result = mysqli_query($connection, $query); 
              
              if($result) {
                  header("Location: ../listing?id=$listingID");
              }else{
                  $_SESSION["editPostMessage"] = "Something went wrong!";
                  header("Location: ../editlisting?id=$listingID");
           }
          }
         }
        }
       }
      }
?>
<?php 
    mysqli_close($connection);
?>

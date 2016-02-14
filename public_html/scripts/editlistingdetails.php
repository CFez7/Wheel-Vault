<?php
    require_once("../../includes/session.php");
    require_once("../../includes/connect.php");
?>
<?php
    
    if(isset($_POST["changepostdetails"])) { 
        $title = $_POST["title"];
        $frontwidth = $_POST["frontwidth"];
        $rearwidth = $_POST["rearwidth"];
        $size = $_POST["size"];
        $brand = $_POST["brand"];
        $studpattern1 = $_POST["studpattern1"];
        $studpattern2 = $_POST["studpattern2"];
        $frontoffset = $_POST["frontoffset"];
        $rearoffset = $_POST["rearoffset"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $listingID = $_POST["listingID"];
    } else {
        $title = "";
        $frontwidth = "";
        $rearwidth = "";
        $size = ""; 
        $brand = ""; 
        $studpattern1 = ""; 
        $studpattern2 = ""; 
        $frontoffset = "";
        $rearoffset = ""; 
        $description = "";
        $price = ""; 
        $listingID = "";
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
        if(empty($_POST['studpattern1'])) {
                $_SESSION['editPostMessage'] = "Stud Pattern fields empty!";
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
            
              
             $query = "UPDATE listings SET title='{$title}', frontwidth='{$frontwidth}', rearwidth='{$rearwidth}', size='{$size}', brand='{$brand}', studpattern1='{$studpattern1}', studpattern2='{$studpattern2}', frontoffset='{$frontoffset}', rearoffset='{$rearoffset}', description='{$description}', price='{$price}', ownerPhone='{$ownerPhone}', ownerEmail='{$ownerEmail}', ownerLocation='{$ownerLocation}', swaps='{$swaps}' WHERE id='{$listingID}'";
        
             $result = mysqli_query($connection, $query); 
              
              if($result) {
                  header("Location: ../listing?id=$listingID.php");
              }else{
                  $_SESSION["editPostMessage"] = "Something went wrong!";
                  header("Location: ../editlisting?id=$listingID.php");
           }
          }
         }
        }
       }
      }
     }
?>
<?php 
    if(isset($_POST["addpost"])) {
        mysqli_close($connection);
    }
?>
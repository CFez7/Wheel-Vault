<?php
    require_once("../../includes/session.php");
    require_once("../../includes/connect.php");
?>
<?php 
    
    if(isset($_POST["addpost"])) {
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
        $ownerID = $_SESSION["userID"];
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
        $ownerID = "";
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
                $_SESSION['uploadMessage'] = "Title field empty!";
                header("Location: ../addpost.php");
            } else {
        if(empty($_POST['size'])) {
                $_SESSION['uploadMessage'] = "Size field empty!";
                header("Location: ../addpost.php");
            } else {
        if(empty($_POST['brand'])) {
                $_SESSION['uploadMessage'] = "Brand field empty!";
                header("Location: ../addpost.php");
            } else {
        if(empty($_POST['studpattern1'])) {
                $_SESSION['uploadMessage'] = "Stud Pattern fields empty!";
                header("Location: ../addpost.php");
            } else {
        if(empty($_POST['description'])) {
                $_SESSION['uploadMessage'] = "Description field empty!";
                header("Location: ../addpost.php");
            } else {
        if(empty($_POST['price'])) {
                $_SESSION['uploadMessage'] = "Price field empty!";
                header("Location: ../addpost.php");
            } else {
        
    if(isset($_FILES['photo'])){
          $errors = array();
          $file_name = $_FILES['photo']['name'];
          $file_size =$_FILES['photo']['size'];
          $file_tmp =$_FILES['photo']['tmp_name'];
          $file_type=$_FILES['photo']['type'];
          $file_ext=strtolower(end(explode('.',$_FILES['photo']['name'])));

          $extensions= array("jpeg","jpg","png");

          if(in_array($file_ext,$extensions)=== false) {
             $_SESSION["uploadMessage"] ="extension not allowed, please choose a JPEG or PNG file.";
             header("Location: ../addpost.php");
          }

          if($file_size > 2097152){
             $_SESSION["uploadMessage"] ='File size must be smaller than 2 MB';
             header("Location: ../addpost.php");
          }

          if(empty($errors)==true){
             move_uploaded_file($file_tmp,"../images/listings/".$file_name);
              
              ////////////////////////
              
              $mainImage = $file_name;
              
              $thumb1 = "default";
              $thumb2 = "default";
              $thumb3 = "default";
              $thumb4 = "default";
              
             $query = "INSERT INTO listings (title, frontwidth, rearwidth, size, brand, studpattern1, studpattern2, frontoffset, rearoffset, description, price, ownerID, ownerPhone, ownerEmail, ownerLocation, swaps, mainImage, thumb1, thumb2, thumb3, thumb4) VALUES ('{$title}', '{$frontwidth}', '{$rearwidth}', '{$size}', '{$brand}', '{$studpattern1}', '{$studpattern2}', '{$frontoffset}', '{$rearoffset}', '{$description}', '{$price}', '{$ownerID}', '{$ownerPhone}', '{$ownerEmail}', '{$ownerLocation}', '{$swaps}', '{$mainImage}', '{$thumb1}', '{$thumb2}', '{$thumb3}', '{$thumb4}')";
        
             $result = mysqli_query($connection, $query); 
              
              if($result) {
                  $_SESSION["uploadMessage"] = "Listing Sucessfully Uploaded!";
                  header("Location: ../addpost.php");
              }else{
                  $_SESSION["uploadMessage"] = "Error!";
                  header("Location: ../addpost.php");
          }
         }
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
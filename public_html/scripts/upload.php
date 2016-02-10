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
        $listingID = "";
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
            
            ///// IMAGE 1 /////
        
    if(isset($_FILES['photo'])){
          $errors = array();
          $file_name = $ownerID."-".$title."-1";
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
              
              /////// IMAGE 2 ///////
              
              $file_name2 = $ownerID."-".$title."-2";
              $file_size2 =$_FILES['photo2']['size'];
              $file_tmp2 =$_FILES['photo2']['tmp_name'];
              $file_type2 =$_FILES['photo2']['type'];
              $file_ext2 =strtolower(end(explode('.',$_FILES['photo2']['name'])));

              $extensions2 = array("jpeg","jpg","png");

              if($file_size2 > 2097152){
                 $_SESSION["uploadMessage"] ='File 2 size must be smaller than 2 MB';
                 header("Location: ../addpost.php");
              }

                move_uploaded_file($file_tmp2,"../images/listings/".$file_name2);
              
               /////// IMAGE 3 ///////
              
              $file_name3 = $ownerID."-".$title."-3";
              $file_size3 =$_FILES['photo3']['size'];
              $file_tmp3 =$_FILES['photo3']['tmp_name'];
              $file_type3 =$_FILES['photo3']['type'];
              $file_ext3 =strtolower(end(explode('.',$_FILES['photo3']['name'])));

              $extensions3 = array("jpeg","jpg","png");

              if($file_size3 > 2097152){
                 $_SESSION["uploadMessage"] ='File 3 size must be smaller than 2 MB';
                 header("Location: ../addpost.php");
              }

                move_uploaded_file($file_tmp3,"../images/listings/".$file_name3);
              
              /////// IMAGE 4 ///////
              
              $file_name4 = $ownerID."-".$title."-4";
              $file_size4 =$_FILES['photo4']['size'];
              $file_tmp4 =$_FILES['photo4']['tmp_name'];
              $file_type4 =$_FILES['photo4']['type'];
              $file_ext4 =strtolower(end(explode('.',$_FILES['photo4']['name'])));

              $extensions4 = array("jpeg","jpg","png");

              if($file_size4 > 2097152){
                 $_SESSION["uploadMessage"] ='File 4 size must be smaller than 2 MB';
                 header("Location: ../addpost.php");
              }

                move_uploaded_file($file_tmp4,"../images/listings/".$file_name4);
              
              /////// IMAGE 5 ///////
              
              $file_name5 = $ownerID."-".$title."-5";
              $file_size5 =$_FILES['photo5']['size'];
              $file_tmp5 =$_FILES['photo5']['tmp_name'];
              $file_type5 =$_FILES['photo5']['type'];
              $file_ext5 =strtolower(end(explode('.',$_FILES['photo5']['name'])));

              $extensions5 = array("jpeg","jpg","png");

              if($file_size5 > 2097152){
                 $_SESSION["uploadMessage"] ='File 5 size must be smaller than 2 MB';
                 header("Location: ../addpost.php");
              }

                move_uploaded_file($file_tmp5,"../images/listings/".$file_name5);
              
              ////////////////////////
              
              $mainImage = $file_name;
              
              if($file_size2 > 0){
                $thumb1 = $file_name2;
              } else {
                $thumb1 = "default";
              }
              if($file_size3 > 0){
                $thumb2 = $file_name3;
              } else {
                $thumb2 = "default";
              }
              if($file_size4 > 0){
                $thumb3 = $file_name4;
              } else {
                $thumb3 = "default";
              }
              if($file_size5 > 0){
                $thumb4 = $file_name5;
              } else {
                $thumb4 = "default";
              }
              
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
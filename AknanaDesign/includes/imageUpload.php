<?php
include "imagesDBHandler.php";
if(isset ($_POST['uploadButton'])){
     // $file = $_FILES['img'];
     $file = $_FILES['file'];
     $fileName = $file["name"];
     $fileTmpName = $file['tmp_name']; // temperory location for the file

     $imgName = $_POST['designName'];

     // getting the file extention
     // $imgName = strtolower(str_replace(" ", "-", $imgName));
     $ext = explode('.', $fileName);
     $fileExtention = strtolower(end($ext));
     // $imgFullName = strtolower(str_replace(" ", "-", $name)); // previous one
     $imgName = strtolower(str_replace(" ", "-", $fileName));
     $imgFullName = $imgName.".".uniqid("", true).".".$fileExtention; // use this with the thumbnainl images..
     $imgDestination = "../FileUpload/".$imgFullName;

     // if(empty($_POST['imgName'])){
     //    $imgName = "gallery";  
     // }
     // else{
          // $imgName = strtolower(str_replace(" ", "-", $imgName));
     // }
     // varaibles for data that will go into the db
     $designerName = $_POST['designerName'];
     // $designName = $_POST['designName'];
     $length = $_POST['length'];
     $width = $_POST['width'];
     $bedrooms = $_POST['bedrooms'];
     $bathrooms = $_POST['bathrooms'];
     $floors = $_POST['floors'];
     $garages = $_POST['garages'];
     $basement = $_POST['basement'];
     $designType = $_POST['designTypeInput'];

     // echo''.$length.'';
     echo''.$imgName.'';
     // echo 'alert($imgName);';


     // print_r($file);
     // creating an array for all the allowed extentions
     $allowedExtention = ['jpg', 'jpeg', 'png', 'pdf'];

     // $fileName = $file['name'];
     
     // setting variables for file type, size, and error if any.
     $fileType = $file['type']; // check for the file type to see if it is a valid type.
     $fileSize = $file['size'];
     $fileError= $file['error'];

     // if(in_array($fileExtention, $allowedExtention)){
          // if there is no error
          if($fileError === 0){
               if($fileSize < 5000000){ // this is 4mb
                    // uncommnet if the for loop doesn't work
                    $imgFullName = $imgName.".".uniqid("", true).".".$fileExtention; // use this with the thumbnainl images..
                    $imgDestination = "../FileUpload/".$imgFullName;
                    
                    // extending the database php file
                    include_once "imgDBHandler.php";
                    if(empty($imgName) || empty($length) || empty($width)  || empty($designerName)){ //2DO: add a condition for the other inputs too.
                         header("Location: ../design.php?upload=empty");
                         exit();
                    }
                    else{
                         $sqli = "SELECT * FROM dgallery;";
                         $stmt = mysqli_stmt_init($connection);
                         if(!mysqli_stmt_prepare($stmt, $sqli)){
                              echo "sqli statment has failed first";
                         }
                         else{ // in case the sqli code works
                              mysqli_stmt_execute($stmt);
                              $result = mysqli_stmt_get_result($stmt);
                              $rowCount = mysqli_num_rows($result);
                              $imgOrder = $rowCount + 1; // for the order gallery variable

                              $sqli = "INSERT INTO dgallery (designName, designerName, dLength, dWidth, desginType, imgFullName, orderGallery, bedrooms, bathrooms, floors, garages, basement) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
                              if(!mysqli_stmt_prepare($stmt, $sqli)){
                                   echo "sqli statment has failed seconds";
                              }
                              else{
                                        // if( empty($_POST['imgName'][$i] )){
                                        //    $imgName = "gallery";  
                                        // }
                                        // else{
                                        //      $imgName = strtolower(str_replace(" ", "-", $imgName));
                                        // }
                                        // $fileName = $file["name"][$i];

                                        // $imgFullName = $imgName.".".uniqid("", true).".".$fileExtention;
                                        // $imgDestination = "../FileUpload/".$imgFullName;
                         
                                        mysqli_stmt_bind_param($stmt, "ssssssssssss", $imgName, $designerName, $length, $width, $designType, $imgFullName, $imgOrder, $bedrooms, $bathrooms, $floors, $garages, $basement);
                                        mysqli_stmt_execute($stmt);
                                        move_uploaded_file($fileTmpName, $imgDestination);
                                   // }
     
                                   header("Location: ../design.php?upload=success");
                              }
                         }

                         $stmt = mysqli_stmt_init($connect);
                         // comment if the for loop doesn't work
                         // $designs = $_FILES['desgins'];
                         $imageCount = count($_FILES['designs']['name']); // the count of images that were uploaded from the desgins option.                    
                         for($i=0; $i<$imageCount; $i++){
                              $name = $_FILES['designs']['name'][$i];
                              $ext = explode('.', $name);
                              $fileExtention = strtolower(end($ext));
                              $name = strtolower(str_replace(" ", "-", $name)); // not used?
                              $Name = $imgName.".".uniqid("", true).".".$fileExtention; // use this with the thumbnainl images..
                              // $imgDestination = "../FileUpload/".$imgFullName;
                              // setting the variable for image destination
                              $imgDestination = "../FileUpload/".$Name;

                              // creating the sqli command
                              $sqli = "INSERT INTO imagelist (imageName, imageOrder, title) VALUES (?, ?, ?); ";
                             if(!mysqli_stmt_prepare($stmt, $sqli)){
                              echo "sqli statment has failed in third";
                             }
                             else{
                              mysqli_stmt_bind_param($stmt, "sss", $Name, $imgOrder, $imgFullName);
                              mysqli_stmt_execute($stmt);
                              // $imgDestination = "../FileUpload/".$name;
                              move_uploaded_file($_FILES['designs']['tmp_name'][$i], $imgDestination);
                             }
                         }

                    }
               }
               else{
                    echo "File is too big, make sure to upload something less than 4mb";
                    exit();
               }

          }
          else{
               echo "There was an error during the upload process.";
               exit();
          }
          // $fileNewName = $fileName;
          // $FilenewLocation = 'FileUpload/'.$fileNewName;
          // move_uploaded_file($fileTmpName, $FilenewLocation);
     
     // }
     // else{
          // echo "image upload failed, use one of the correct file extentions (jpg, jpeg, png, pdf).";
          // exit();
     // }   
}

// 2DO: include a heading to lead back to the main page in case the user tried to access this page using the url


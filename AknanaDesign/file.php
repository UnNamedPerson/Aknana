<?php
$serverName = "localhost";
$username = "root";
$password="";
$dvname = "images";

$conn = new mysqli($serverName, $username, $password, $dvname);

if(isset($_POST['submit'])){

     $fileCount = count($_FILES['file']['name']);
     for($i=0; $i<$fileCount; $i++){
          $fileName = $_FILES['file']['name'][$i];
          $order = $_FILES['file'];
          $sql = "INSERT INTO imagelist (imageName, imageOrder, title) VALUES ('$fileName', '$order', '$fileName')";
          if($conn->query($sql)===TRUE){
               echo "File Upload Successfully";
          }else{
               echo "ERROR";
          }
          move_uploaded_file($_FILES['file']['tmp_name'][$i], 'upload/'.$fileName);
          
     }
}

?>

<form action='' method='post' enctype="multipart/form-data">
<input type='text' name='text' value='2'>
<input type='file' name='file[]' id='file' multiple>
<input type='submit' name='submit' value = 'upload'>
</form>

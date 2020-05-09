<?php
require 'Header_Footer/nav.php';
session_start();
?> 

<div class="miniDetailsContainer">

<!-- set php code here for the main image -->
     <?php
          include_once "includes/imgDBHandler.php";

          if(isset($_POST['imageDetail'])){
               $_SESSION['designImage'] = $_POST['imageDetail'];

               $sql = "SELECT * FROM dgallery WHERE imgFullName=?;";
               $stmt = mysqli_stmt_init($connection);
               if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo"sqli statment failed";
               }
               else{
                    mysqli_stmt_bind_param($stmt, 's', $_POST['imageDetail'] ); // s = string, repeat the 's' for each parameter the user enters
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    // $row = mysqli_fetch_assoc($result);

                    while($row = mysqli_fetch_assoc($result)){
                         // 2DO: use an image instead of a div.
                         // echo' /"FileUpload/'.$row["imageName"].'/" ';
                         echo
                         '
                         <img class="detailsContainer imageJS" id="detailImage" src ="FileUpload/'.$row["imgFullName"].'">
                         ';
                    }
               }                                                                         
          }
     ?>
               <!-- <div class="detailsContainer imageJS" id="detailImage" style = "background-image: url(FileUpload/'.$row["imgFullName"].');">
                         </div> -->    
     <!-- <div class = "detailsContainer imageJS" id="detailImage">
     </div> -->

     <p class="p">  </p>

     <?php
          include_once "includes/imgDBHandler.php";

          if(isset($_POST['imageDetail'])){

               $sql = "SELECT * FROM dgallery WHERE imgFullName=?;";
               $stmt = mysqli_stmt_init($connection);
               if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo"sqli statment failed";
               }
               else{
                    mysqli_stmt_bind_param($stmt, 's', $_POST['imageDetail'] ); // s = string, repeat the 's' for each parameter the user enters
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $row = mysqli_fetch_assoc($result);
                    // $_SESSION
                    echo'
                    <div id = "miniDetailsContainer1" class="miniContainer">
                         <p style="color: rgb(0, 132, 166);">
                              غرف النوم: '.$row['bedrooms'].'
                         </p>
                    </div>
                    <div id = "miniDetailsContaine2" class="miniContainer">
                         <p  style="color: rgb(0, 132, 166);">
                              الحمامات: '.$row["bathrooms"].'
                         </p>
                    </div>
                    <div id = "miniDetailsContaine3" class="miniContainer">
                         <p style="color: rgb(0, 132, 166);">
                              الأدوار: '.$row["floors"].'
                         </p>
                    </div>
                    <div id = "miniDetailsContaine4" class="miniContainer">
                         <p style="color: rgb(0, 132, 166);">
                              مواقف السيارات: '.$row["garages"].'
                         </p>
                    </div>
                    <div id = "miniDetailsContaine5" class="miniContainer">
                         <p style="color: rgb(0, 132, 166);">
                          '.$row["dLength"].' X '.$row['dWidth'].': المساحة 
                         </p>
                    </div>
                    ';

               }

          }
          else{
               echo'<h2> form has failed </h2>';
          }
     ?>

</div>

<div class="thumbnailContainer">

<!-- php code for the thumbnail image -->
<?php
include_once "includes/imagesDBHandler.php";
include_once "includes/imgDBHandler.php";

if(isset($_POST['imageDetail'])){

     $sql = "SELECT * FROM dgallery WHERE imgFullName=?;";
     $stmt = mysqli_stmt_init($connection);
     if(!mysqli_stmt_prepare($stmt, $sql)){
          echo"sqli statment failed";
     }
     else{
          mysqli_stmt_bind_param($stmt, 's', $_POST['imageDetail'] ); // s = string, repeat the 's' for each parameter the user enters
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          // $row = mysqli_fetch_assoc($result);

          while($row = mysqli_fetch_assoc($result)){
               // echo' /"FileUpload/'.$row["imgFullName"].'/" ';
               echo
               '
               <img class="miniDetailsThumbNail imageJS" src ="FileUpload/'.$row["imgFullName"].'">
               ';
          }
     }
     // WHY CALL SQLI TWICE ABOVE AND BELOW   

     $sql = "SELECT * FROM imagelist WHERE title=?;";
     $stmt = mysqli_stmt_init($connect);
     if(!mysqli_stmt_prepare($stmt, $sql)){
          echo"sqli statment failed";
     }
     else{
          mysqli_stmt_bind_param($stmt, 's', $_POST['imageDetail'] ); // s = string, repeat the 's' for each parameter the user enters
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          // $row = mysqli_fetch_assoc($result);

          while($row = mysqli_fetch_assoc($result)){
               // echo' /"FileUpload/'.$row["imageName"].'/" ';
               echo
               '   
               <img class="miniDetailsThumbNail imageJS" src ="FileUpload/'.$row["imageName"].'">
               ';
          }
     }
}
else{
     echo'<h2> form has failed </h2>';
}

?>

</div>

<?php
if(isset($_SESSION['uID'])){
     echo'
     <form action="includes/addToCart.php" method="POST">
          <div class = "cartButtonContainer">
               <button type="submit" style="   background-color: rgb(8, 102, 156); width:30px height:30px; " name = "imageDetail" value="add to cart"> 
                    أضف إلى السلة   
               </button>
               <input type="text" name="costumerID" style="opacity: 0;" value = '.$_SESSION['uID'].'>
               <input type="text" name="designImage" style="opacity: 0;" value =  '.$_POST['imageDetail'].'>
          </div>
     </form>
     ';  
}
else{
     echo'
     <div class = "cartButtonContainer" style="width:310px;">
          <h2 style ="text-align: right;">
               الرجاء أن تسجل دخولك قبل أن تتمكن من إضافة التصميم إلى السلة
          </h2>
     </div>
     ';
}
?>


<!-- <script> // use this to retrive the image that was pressed along with other information
var path = 'FileUpload/';
var imageUrl =  path.concat(localStorage.getItem("imageName")) ;
document.getElementById("detailImage").style.backgroundImage= 'url('+imageUrl +')';
// $str = substr(localStorage.getItem("imageName"), strlen('/'));
console.log(localStorage.getItem("imageName"));
</script> -->

<!-- use the image full name to find other relevant infor such as number of rooms and bathrooms -->

<?php
     echo '<script src="designDetail.js"></script>';
?>


<?php
// the nav file here would be used on all pages. That way, every time we need to make a change, we would only need to make it once to the nav.php file
require "Header_Footer/footer.php";
echo '<script src="Header_Footer/main.js"></script>';

?> 
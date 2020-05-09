<?php
require "Header_Footer/nav.php";
echo'<script src="Header_Footer/main.js"></script>';
session_start();
?> 
      
<h1>
صفحة السلة 
</h1>

<section class="cartSection">

     <?php
          include_once 'includes/cartDBHandler.php';
          $sql = "SELECT * FROM carttable WHERE costumerID=? ";
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)){
               echo"sqli statment failed";
          }
          else{

               mysqli_stmt_bind_param($stmt, 's', $_SESSION['uID']); // s = string, repeat the 's' for each parameter the user enters
               mysqli_stmt_execute($stmt);
               $result = mysqli_stmt_get_result($stmt);

               while($row = mysqli_fetch_assoc($result)){
                    echo'<div class="cartItemContainer">';
                    echo '
                              <div class = "imageContainer">
                                   <img class = "imageContainer" src ="FileUpload/'.$row["designImage"].'"> 
                              </div>
                         ';
                         // echo'
                         // ';
                    include_once 'includes/imgDBHandler.php';
                    $sql2 = "SELECT * FROM dgallery WHERE imgFullName=? ";
                    $stmt2 = mysqli_stmt_init($connection);
                    if(!mysqli_stmt_prepare($stmt2, $sql2)){
                         echo"sqli statment failed";
                    }
                    else{
                         mysqli_stmt_bind_param($stmt2, 's', $row["designImage"] ); // s = string, repeat the 's' for each parameter the user enters
                         mysqli_stmt_execute($stmt2);
                         $result2 = mysqli_stmt_get_result($stmt2);
                         // $row = mysqli_fetch_assoc($result);
     
                         if($row2 = mysqli_fetch_assoc($result2)){
     
                              echo
                                   '
                                   <div class = "cartText">
                                        <div id = "miniDetailsContainer1" class="miniContainer">
                                             <p style="color: rgb(0, 132, 166);">
                                                  غرف النوم: '.$row2['bedrooms'].'
                                             </p>
                                        </div>
                                        <div id = "miniDetailsContaine2" class="miniContainer">
                                             <p  style="color: rgb(0, 132, 166);">
                                                  الحمامات: '.$row2["bathrooms"].'
                                             </p>
                                        </div>
                                        <div id = "miniDetailsContaine3" class="miniContainer">
                                             <p style="color: rgb(0, 132, 166);">
                                                  الأدوار: '.$row2["floors"].'
                                             </p>
                                        </div>
                                        <div id = "miniDetailsContaine4" class="miniContainer">
                                             <p style="color: rgb(0, 132, 166);">
                                                  مواقف السيارات: '.$row2["garages"].'
                                             </p>
                                        </div>
                                        <div id = "miniDetailsContaine5" class="miniContainer">
                                             <p style="color: rgb(0, 132, 166);">
                                             '.$row2["dLength"].' X '.$row2['dWidth'].': المساحة 
                                             </p>
                                        </div>
                                   </div>
                              ';
                         }
                    }
                    echo'</div>';
               }

          }
     ?>
     <div class="someclass">
          <?php
               // include_once 'includes/imgDBHandler.php';
               // $sql = "SELECT * FROM dgallery WHERE imgFullName=? ";
               // $stmt = mysqli_stmt_init($connection);
               // if(!mysqli_stmt_prepare($stmt, $sql)){
               //      echo"sqli statment failed";
               // }
               // else{
               //      mysqli_stmt_bind_param($stmt, 's', $_SESSION['designImage'] ); // s = string, repeat the 's' for each parameter the user enters
               //      mysqli_stmt_execute($stmt);
               //      $result = mysqli_stmt_get_result($stmt);
               //      // $row = mysqli_fetch_assoc($result);

               //      while($row = mysqli_fetch_assoc($result)){

               //                echo
               //                '
               //                <div class = "galleryText">
               //                     <div id = "miniDetailsContainer1" class="miniContainer">
               //                          <p style="color: rgb(0, 132, 166);">
               //                               غرف النوم: '.$row['bedrooms'].'
               //                          </p>
               //                     </div>
               //                     <div id = "miniDetailsContaine2" class="miniContainer">
               //                          <p  style="color: rgb(0, 132, 166);">
               //                               الحمامات: '.$row["bathrooms"].'
               //                          </p>
               //                     </div>
               //                     <div id = "miniDetailsContaine3" class="miniContainer">
               //                          <p style="color: rgb(0, 132, 166);">
               //                               الأدوار: '.$row["floors"].'
               //                          </p>
               //                     </div>
               //                     <div id = "miniDetailsContaine4" class="miniContainer">
               //                          <p style="color: rgb(0, 132, 166);">
               //                               مواقف السيارات: '.$row["garages"].'
               //                          </p>
               //                     </div>
               //                     <div id = "miniDetailsContaine5" class="miniContainer">
               //                          <p style="color: rgb(0, 132, 166);">
               //                          '.$row["dLength"].' X '.$row['dWidth'].': المساحة 
               //                          </p>
               //                     </div>
               //                </div>
               //           ';
               //      }
               // }

          ?>
     </div>
</section>

<!-- </body>
</html> -->


<?php
// the nav file here would be used on all pages. That way, every time we need to make a change, we would only need to make it once to the nav.php file
require "Header_Footer/footer.php";
echo '<script src="Header_Footer/main.js"></script>';
?> 
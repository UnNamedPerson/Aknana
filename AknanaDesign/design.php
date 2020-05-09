<?php
require "Header_Footer/nav.php";
echo'<script src="Header_Footer/main.js"></script>';
?> 
<!-- 2DO: edit styling for the h1 -->
     <h1 style="postion:absolute ;">
          صفحة التصاميم
     </h1>


          <!-- in the video 1st part, this form tag is put inside a php tag with session setting. Check if you need that -->
     <section class="parallax2">    
        <form action="includes/imageUpload.php" method ="POST" enctype="multipart/form-data">
          <input type="text" name="designerName" placeholder = " اسم المكتب الهندسي \ المصمم ">  
         <br>
         <input type="text" name="designName" placeholder = " اسم التصميم ">
         <br>

         <div class="dropContainer">
               <button onclick="show()" id="dropbtn" class="dropButton" style="height: 28px; width: 160px; margin-top: 10px;">
                         طراز التصميم
               </button>
               <div class="dropDown">
                    <a class="dropChoice"  href="#">حديث</a>
                    <a class="dropChoice"  href="#">كلاسيك</a>
                    <a class="dropChoice"  href="#">إسلامي</a>
               </div>
          </div>
          
          <!-- <p id = "designType">
          </p> -->
          <input type="text" name = "designTypeInput" id="designTypeInput" class="hiddenInput">
          <!-- when an arabic word is used in the input below, the program fails to load the image and saves the image name in the database with ?s in initially. -->
         <!-- <br> -->
         <p style="text-align: right; padding-right:40px;">
          أبعاد الأرض (م)
</p>
          <input type="text" name="length" placeholder = " الطول">
          <input type="text" name="width" placeholder = " العرض">


         <br>
               <input type="text" name="bedrooms" id="Dbedroom1" placeholder = " غرف النوم "> 
               <!-- <input type="checkbox" id = "Dbedroom1"> <label for="bedroom1"> 1 </label> -->
               <!-- <input type="checkbox"id = "Dbedroom2"> <label for="bedroom2"> 2 </label> -->
               <!-- <input type="checkbox"id = "Dbedroom3"> <label for="bedroom3"> 3 </label> -->
               <!-- <input type="checkbox" id = "Dbedroom4"> <label for="bedroom4"> 4 </label> -->
               <!-- <input type="checkbox" id = "Dbedroom5"> <label for="bedroom5"> 5 </label> -->
          <br>
          <!-- <label> الحمامات </label>     -->
               <input type="text" name="bathrooms" id="Dbathroom1" placeholder = "  الحمامات ">
               <!-- <input type="checkbox" id = "Dbathroom1"> <label for="bathroom1"> 1 </label> -->
               <!-- <input type="checkbox" id = "Dbathroom2"> <label for="bathroom2"> 2 </label> -->
               <!-- <input type="checkbox" id = "Dbathroom3"> <label for="bathroom3"> 3 </label> -->
          <br>
          <!-- <label> الأدوار </label>    -->
               <input type="text" name="floors"  id = "Dfloor1" placeholder = " الأدوار "> 
                <!-- <input type="checkbox" id = "Dfloor1"> <label for="floor1"> 1 </label> -->
                <!-- <input type="checkbox" id = "Dfloor2"> <label for="floor2"> 2 </label> -->
                <!-- <input type="checkbox" id = "Dfloor3"> <label for="floor3"> 3 </label> -->
          <br>
          <!-- <label> مواقف السيارة </label>              -->
               <input type="text" name="garages" id = "Dgarage0" placeholder = " مواقف السيارة ">
                <!-- <input type="checkbox" id = "Dgarage0"> <label for="garage0"> 0 </label> -->
                <!-- <input type="checkbox" id = "Dgarage1"> <label for="garage1"> 1 </label> -->
                <!-- <input type="checkbox" id = "Dgarage2"> <label for="garage2"> 2 </label> -->
                <!-- <input type="checkbox" id = "Dgarage3"> <label for="garage3"> 3 </label> -->
          <br>
          <!-- <label> هل هناك قبو بالمسكن </label> -->
                <!-- <input type="radio" value = "0" name="basement" id = "Dbasement0"> <label for="basement0"> 0 </label> -->
                <!-- <input type="radio" value = "1" name="basement" id = "Dbasement1"> <label for="basement1"> 1 </label> -->
          <br>
          <div class="dropContainer">
               <button onclick="show()" id="dropbtn2" class="dropButton" style="height: 28px; width: 160px; margin-top: 10px;">
                          القبو
               </button>
               <div class="dropDown">
                    <a class="dropChoice2"  href="#">يوجد</a>
                    <a class="dropChoice2"  href="#">لا يوجد</a>
               </div>
          </div>


          <div class="dropContainer">
               <button onclick="show()" id="dropbtn3" class="dropButton" style="height: 28px; width: 160px; margin-top: 10px;">
                          ملحق
               </button>
               <div class="dropDown">
                    <a class="dropChoice3"  href="#">يوجد</a>
                    <a class="dropChoice3"  href="#">لا يوجد</a>
               </div>
          </div>

          <input type="text" name = "basement" id="basementInput" class="hiddenInput">

          <br>
          <!-- <input type="file" name="img" multiple="multiple"> -->
          <input type="file" name="file">
          <label style="color:black;">أضف صورة العرض للتصميم</label>
          <br>
          <input type="file" name="designs[]" multiple>
          <label style="color:black;">    إضافة جميع المخططات للتصميم </label>
          <br>
          <br>
          <button name="uploadButton" id="searchButton"> أضف التصميم </button>

        </form>

     </section>


     <!-- <div class = "designsContainer"> -->
     <!-- 2DO: change the var names later -->
     
     <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!! -->
     <!-- // 2DO: style the placeholder words to be located on the right instead of the left -->
     <!-- // 2DO: style the placeholder words to be located on the right instead of the left -->


     <?php
               include_once "includes/imgDBHandler.php";

               $sql = "SELECT * FROM dgallery ORDER BY idgallery DESC";
               $stmt = mysqli_stmt_init($connection);
               if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo"sqli statment failed";
               }
               else{
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    while($row = mysqli_fetch_assoc($result)){
                         echo '
                              <section class="gallerySection">
                                   <form action="designDetail.php" method="POST">
                                        <div class = "imageContainer">
                                             <button type="submit" style="display:inline-block; background-color: Transparent;" name = "imageDetail" value="'.$row["imgFullName"].'" > 
                                                  <img class = "imageContainer" src ="FileUpload/'.$row["imgFullName"].'"> 
                                             </input>

                                        </div>
                                   </form>
                                   <div class = "galleryText">
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
                                   </div>

                              </section>
                              ';
                              echo'

                              ';
                    }
               }
  
     ?>

<!-- // <div class = "imageContainer" style = "background-image: url(FileUpload/'.$row["imgFullName"].');"> 
                                        //      <input type="submit", name = "imageDetail" class="hiddenInput" value="'.$row["imgFullName"].'"> 
                                         <img class = "imageContainer" src ="FileUpload/'.$row["imgFullName"].'"> 
                                             
                                        //      </input>
                                        // </div> -->

<!-- change is here. -->
     <?php
          echo '<script src="design.js"></script>';
     ?>

     <!-- </div> -->

<!-- </body>
</html> -->

<?php
// the nav file here would be used on all pages. That way, every time we need to make a change, we would only need to make it once to the nav.php file
require "Header_Footer/footer.php"
?> 
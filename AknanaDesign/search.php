<?php
require "Header_Footer/nav.php";
// require "Header_Footer/footer.php"
// echo'<script src="Header_Footer/main.js"></script>';
// echo '<script src="Header_Footer/main.js"></script>';
?>

      <!-- <h1>
          صفحة البحث
     </h1> -->

         <!-- <section style="background-color: rgba(0, 170, 240, 0.2);">  -->
    <section class="parallax2">
        <!-- <div  class="parallax2"> -->

        <form action="search.php" method ="POST" enctype="multipart/form-data">

        <!-- <p class="radioParagraph">
        غرف النوم   
        </p> -->
        <div class = "searchField3" style=" margin-top: -10px; margin-right:70px; ">
               <input name = "length" type="text">
               <lebel> الطول  </label>
               <input name = "width" type="text">
               <lebel> العرض  </label>
            </div>


            <div class="searchField2" >


                <input name = "bedrooms" type="radio" id = "bedroom1" value = "5"> 
                <label for="bedroom1"> 5 
                </label>

                <input name = "bedrooms" type="radio"id = "bedroom2" value = "4"> 
                <label for="bedroom2"> 4 
                </label>

                <input name = "bedrooms" type="radio"id = "bedroom3" value = "3"> 
                <label for="bedroom3"> 3 
                </label>

                <input name = "bedrooms" type="radio" id = "bedroom4" value = "2"> 
                <label for="bedroom4"> 2 
                </label>
                
                <input name = "bedrooms" type="radio" id = "bedroom5" value = "1"> 
                <label for="bedroom5"> 1
                </label>
                <!-- <input name = "bedrooms" type="radio" id = "bedroom6"> <label for="bedroom6"> أكثر </label> -->

                <div>
                    <p style="padding-left: 15px; width:90px; diplay:block;">
                        غرف النوم   
                    </p>
                </div>

                
            </div>

            <div class="searchField2">

                <input name = "bathrooms" type="radio" id="bathroom5"  value = "5" > 
                <label for="bathroom5"> 5 </label>

                <input name = "bathrooms" type="radio"  id="bathroom4"value = "4"> 
                <label class="radio" for="bathroom4"> 4 </label>

                <input name = "bathrooms"  type="radio" id="bathroom3"  value = "3"> 
                <label class="radio" for="bathroom3"> 3 </label>

                <input name = "bathrooms"  type="radio" id="bathroom2" value = "2"> 
                <label class="radio" for="bathroom2"> 2 </label>

                <input name = "bathrooms"  type="radio" id="bathroom1" value = "1"> 
                <label class="radio" for="bathroom1"> 1 </label>

                <div>
                    <p style="padding-left: 15px; width:90px;">
                    دورات المياه            
                    </p>
                </div>
                
            </div>

            <br>
            <div class="searchField" >
                      
                <input name = "floors" type="radio" id = "floor1" value = "3"> 
                <label class="radio" for="floor1"> 3 </label>
                <input name = "floors" type="radio" id = "floor2" value = "2"> 
                <label class="radio" for="floor2"> 2 </label>
                <input name = "floors" type="radio" id = "floor3" value = "1"> 
                <label class="radio" for="floor3"> 1 </label>
                <!-- <input type="checkbox" id = "floor4"> <label for="floor4"> أكثر </label> -->
                <div>
                    <p style="padding-left: 15px; width:90px;">
                    الأدوار
                    </p>
                </div>
               

            </div>
            </br>
            <div class="searchField" >

                <input name = "garages" type="radio" id = "garage3" value = "3"> 
                <label class="radio" for="garage3"> 3 </label>
                <input name = "garages" type="radio" id = "garage2" value = "2"> 
                <label class="radio" for="garage"2> 2 </label>
                <input name = "garages" type="radio" id = "garage1" value = "1"> 
                <label class="radio" for="garage1"> 1 </label>
                <input name = "garages" type="radio" id = "garage0" value = "0"> 
                <label class="radio" for="garage0"> 0 </label>
                <div>
                    <p style="padding-left: 15px; width:90px;">
                    مواقف السيارة    
                    </p>
                </div>   
                <!-- <input type="checkbox" id = "garage4"> <label for="garage4"> أكثر </label> -->
            </div>
            <br>
            </br>

            <div class="dropContainer" style="margin-left:100px;">
               <button onclick="show()" class="dropButton" style="height: 28px; width: 160px; margin-top: 10px;">
                    <!-- <p style="top:0px; position: absolute" class = mainDropText> -->
                      القبو 
                    <!-- </p> -->
               <!-- use a js code here -->
               </button>
               <div class="dropDown" id="dropDown">
                    <a class="dropChoice"  href="#">يوجد</a>
                    <a class="dropChoice"  href="#"> لا يوجد</a>
               </div>
          </div>
            <br>
            </br>
    
            <button id="searchButton" name="search" style="margin-top: 10px; margin-left:100px; width: 150px; height: 30px;">
                بحث عن خطط
            </button>

        </form>

        <!-- </div> -->
    </section>

            <br>
            <!-- <br>
            <br>
            <br>
            <br> -->

<br>
<br>
<br>

<!-- <form class="form">
	<div class="switch-field">
		<input type="radio" id="radio-one" name="switch-one" value="yes" checked/>
		<label for="radio-one">Yes</label>
		<input type="radio" id="radio-two" name="switch-one" value="no" />
		<label for="radio-two">No</label>
    </div>

    <div class="switch-field">
		<input type="radio" id="radio-one" name="switch" value="yes" checked/>
		<label for="radio-one">Yes</label>
		<input type="radio" id="radio-two" name="switch" value="no" />
		<label for="radio-two">No</label>
    </div>
    
    <div class="switch-field">
		<input type="radio" id="radio-three" name="switch-two" value="yes" checked/>
		<label for="radio-three">One</label>
		<input type="radio" id="radio-four" name="switch-two" value="maybe" />
		<label for="radio-four">Two</label>
		<input type="radio" id="radio-five" name="switch-two" value="no" />
		<label for="radio-five">Three</label>
	</div>

	<div class="switch-field">
        <input type="radio" id="bathroom5" name = "bathrooms" value = "5" checked/> 
        <label for="bathroom5"> 5 </label>
        <input type="radio"  id="bathroom4" name = "bathrooms" value = "4"/> 
        <label for="bathroom4"> 4 </label>
        <input type="radio" id="bathroom3" name = "bathrooms" value = "3"/> 
        <label for="bathroom3"> 3 </label>
        <input type="radio" id="bathroom2" name = "bathrooms" value = "2"/> 
        <label for="bathroom2"> 2 </label>
        <input type="radio" id="bathroom1" name = "bathrooms" value = "1"/> 
        <label for="bathroom1"> 1 </label>
	</div>
</form> -->


<!-- the php file that retrieves the files based on the filters -->
    <?php
    ?>


    <!-- <ul> -->

    <?php
        // if the user clicked the search button, we only show relevant results 

        if(isset($_POST['search'])){
            include_once "includes/imgDBHandler.php";

            // variables to be checked and then reterive the results.
            $bedrooms = $_POST['bedrooms'];
            $bathrooms = $_POST['bathrooms'];
            $floors = $_POST['floors'];
            $garages = $_POST['garages'];
            $basements = $_POST['basement'];
            $area = $_POST['area'];

            $sql = "SELECT * FROM dgallery WHERE describ=? AND bedrooms=? AND bathrooms=? AND floors=? AND garages=? AND basement=?;";
            $stmt = mysqli_stmt_init($connection);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo"sqli statment failed";
            }
            else{
                mysqli_stmt_bind_param($stmt, 'ssssss', $area, $bedrooms, $bathrooms, $floors, $garages, $basements ); // s = string, repeat the 's' for each parameter the user enters
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while($row = mysqli_fetch_assoc($result)){
                    echo '
                        <section class="gallerySection">
                                <a herf ="index.php">
                                    <div class = "imageContainer" style = "background-image: url(FileUpload/'.$row["imgFullName"].');"> 
                                    </div>
                                </a>
                                <div class = "galleryText">
                                    <h2>'.$row["designName"].'</h2>
                                    <p>'.$row["designerName"].'</p>
                                </div>  
                        </section>
                    ';
                }
            }
        }

        // otherwise we show all the results and all the designs
        else{
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
                                <a herf ="index.php">
                                    <div class = "imageContainer" style = "background-image: url(FileUpload/'.$row["imgFullName"].');"> 
                                    </div>
                                </a>
                                <div class = "galleryText">
                                    <h2>'.$row["designName"].'</h2>
                                    <p>'.$row["designerName"].'</p>
                                </div>
                        </section>
                    ';
                }
            }
        }

    ?>

    <!-- </ul> -->

    <?php
          echo '<script src="design.js"></script>';
     ?>

<!-- </body>
</html> -->

<?php
// the nav file here would be used on all pages. That way, every time we need to make a change, we would only need to make it once to the nav.php file
require "Header_Footer/footer.php";
echo '<script src="Header_Footer/main.js"></script>';
?> 
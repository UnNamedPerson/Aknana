<?php
require 'Header_Footer/nav.php';
echo'<script src="Header_Footer/main.js"></script>';
?> 

     <div class = "signupForm">
          <h1 style=" text-align: center;">
               سجل معنا في أكنانا
          </h1>

          <?php
               if( isset($_GET['error']) ){
                    if($_GET['error'] == 'emptyfields'){
                         echo '<p style = "color:white;"> one or more fields is empty </p>';
                    }
                    else if($_GET['error'] == 'invalidemailFnameLname'){
                         echo '<p style = "color:white;"> use the right fromat with the email and username </p>';
                    } 
                    else if($_GET['error'] == 'invalidemail'){
                         echo '<p style = "color:white;"> use the right fromat with emails </p>';
                    }
                    else if($_GET['error'] == 'invalidfname'){
                         echo '<p style = "color:white;"> use the right fromat with first name field </p>';
                    }
                    else if($_GET['error'] == 'invalidlname'){
                         echo '<p style = "color:white;"> use the right fromat with last name field </p>';
                    }
                    else if($_GET['error'] == 'pwdcheck'){
                         echo '<p style = "color:white;"> the two passwords do not match </p>';
                    }
                      

               }
          ?>
          <form action="includes/signup.php" method="POST">
              <!-- we need name for each input to be able to ectract info from in the signup.php -->
               <input type="text", class="formBox", name="Fname", placeholder="الاسم الأول">
               <input type="text", class="formBox", name="Lname", placeholder="الاسم الأخير">
               <input type="text", class="formBox", name="Email", placeholder="الإيميل">
               <input type="password", class="formBox", name="pwd", placeholder="كلمة السر">
               <input type="password", class="formBox", name="pwdRepeat", placeholder=" تكرار كلمة السر">

               <button type="submit" class="signupButton" name="signupSubmit" > تسجيل حساب جديد </button>
          </form>

          <br>
          <!-- <p style="color:white;">
               أو سجل كمصمم وأرفع تصاميمك على أكنانا
          </P>

          <a href="designerRegisteration.php">
               <button  class="signupButton"> سجل كمصمم </button>
          </a> -->


          <!-- <ul class="form">

               <textarea>

               </textarea>
          </ul> -->

     </div>      
     <br>

     <h1>

     </h1>

<!-- </body>
</html> -->

<?php
// the nav file here would be used on all pages. That way, every time we need to make a change, we would only need to make it once to the nav.php file
require "Header_Footer/footer.php"
?> 
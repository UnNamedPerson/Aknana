<?php
require "Header_Footer/nav.php";
// require 'signup.css';
echo'<script src="Header_Footer/main.js"></script>';
?>

      <div class = "signupForm">

          <h1 style=" text-align: center;">
               تسجيل دخول كمستخدم 
          </h1>

          <?php
               if( isset($_GET['error']) ){
                    if($_GET['error'] == 'emptyfields'){
                         echo '<p style = "color:white;"> one or more fields is empty </p>';
                    }
                    else if($_GET['error'] == 'sqlifailed'){
                         echo '<p style = "color:white;"> there was some error while logining in. Please try again later </p>';
                    } 
                    else if($_GET['error'] == 'wrongpwd'){
                         echo '<p style = "color:white;"> wrong password </p>';
                    }
                    else if($_GET['error'] == 'usernotindatabase'){
                         echo '<p style = "color:white;"> email does not exist. </p>';
                    }
               }
          ?>

          <form Action = "includes/Login.php", method = "POST">
               <input type="text", class="formBox", name = "Email", placeholder="الإيميل">
               <input type="password", class="formBox", name="pwd", placeholder="كلمة المرور">
               <button type="submit", class="signupButton", name = "loginSubmit" >  تسجيل الدخول </button>
          </form>

          <a href="signuppage.php">
               <p style="text-decoration: underline;">
                    مستخدم جديد؟
               </p>
          </a>

          <br>

          <h1 style=" text-align: center;">
               تسجيل دخول كمصمم 
          </h1>

          <form Action = "includes/designerLogin.php", method = "POST">
               <input type="text", class="formBox", name = "Email", placeholder="الإيميل">
               <input type="password", class="formBox", name="pwd", placeholder="كلمة المرور">
               <input type="text", class="formBox", name="companyNumber", placeholder=" رقم السجل التجاري">
               <button type="submit", class="signupButton", name = "loginSubmit" >  تسجيل الدخول </button>
          </form>

          <a href="designerRegisteration.php">
               <p style="text-decoration: underline;">
                 مصمم جديد؟          
               </P>
          </a>

     </div>  

     <div>
          <br>
          <br>
          <br>
     </div>

<!-- </body>
</html> -->

<?php
// the nav file here would be used on all pages. That way, every time we need to make a change, we would only need to make it once to the nav.php file
require "Header_Footer/footer.php";
echo '<script src="Header_Footer/main.js"></script>';
?> 
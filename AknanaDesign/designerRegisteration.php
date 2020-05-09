<?php
require "Header_Footer/nav.php";
echo'<script src="Header_Footer/main.js"></script>';
?> 
      

      <div class="signupForm">
        <!-- <div  class="parallax2"> -->

        <h1 style=" text-align: center;">
            انضم لمنصة أكنانا اليوم وأعرض تصاميمك
        </h1>

        <form action="includes/designerSignUp.php" method ="POST" enctype="multipart/form-data">
        

                <input class="formBox" type="text" name="fName" id="Dbedroom1" placeholder = "  الاسم الأول "> 
                <br>
 
                <input class="formBox" type="text" name="lName" id="Dbedroom1" placeholder = "  الاسم الأخير "> 
                <br>

                <input class="formBox" type="text" name="cName" id="Dbedroom1" placeholder = "  اسم الشركة "> 
                <br>

                <input class="formBox" type="text" name="cNumber" id="Dbedroom1" placeholder = "  رقم السجل التجاري "> 
                <br>

                <input class="formBox" type="text" name="Email" id="Dbedroom1" placeholder = " الإيميل  "> 
                <br>

                <input class="formBox" type="password" name="Pwd" id="Dbedroom1" placeholder = " كلمة السر  "> 
                <br>

                <input class="formBox" type="password" name="PwdRepeat" id="Dbedroom1" placeholder = "  تكرار كلمة السر "> 
                <br>

            <br>
    
            <button class="signupButton" name="register" style="margin-top: 10px ; width: 150px; height: 35px;">
                إتمام تسجيلك كمصمم
            </button>

            </form>

            <br>
            <br>
    

        <!-- </div> -->
     </div>


<?php
// the nav file here would be used on all pages. That way, every time we need to make a change, we would only need to make it once to the nav.php file
require "Header_Footer/footer.php";
echo '<script src="Header_Footer/main.js"></script>';
?> 
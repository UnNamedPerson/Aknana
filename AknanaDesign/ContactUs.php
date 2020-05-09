<?php
require 'Header_Footer/nav.php';
echo'<script src="Header_Footer/main.js"></script>';
?> 



     <div class = "signupForm">
          <h1 style=" text-align: center;">
               تواصل معنا في حال كان لديك أي اقتراحات
          </h1>

          <form action="includes/signup.php" method="POST">
              <!-- we need name for each input to be able to ectract info from in the signup.php -->
               <input type="text", class="formBox", name="Fname", placeholder="الاسم الأول">
               <input type="text", class="formBox", name="Lname", placeholder="الاسم الأخير">
               <input type="text", class="formBox", name="Email", placeholder="الإيميل">
               <!-- <input type="text", class="formBox", name="message", placeholder=" الرسالة"> -->
               <textarea rows = "5", class="formBox", name="message", placeholder="الرسالة"></textarea>

               <button type="submit" class="signupButton" name="signupSubmit" > إرسال   </button>
          </form>

     </div>      

<!-- </body>
</html> -->

<?php
// the nav file here would be used on all pages. That way, every time we need to make a change, we would only need to make it once to the nav.php file
require "Header_Footer/footer.php"
?> 
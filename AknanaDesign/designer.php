<?php
require "Header_Footer/nav.php";
echo'<script src="Header_Footer/main.js"></script>';
// session_start(); // maintaining that the session is on all of the pages on the website.
?> 
      
      <h1>
          صفحة المصممين
     </h1>

     <?php
     // isset($_SESSION[''companyName]) doesn't work here.
     // 2DO: style the placeholder words to be located on the right instead of the left
          if(isset($_SESSION['uID'])){
               echo'
               <h2 style = "position: absolute; top:20%; right:20%; left:20%; text-align:right;">
                في صفحة تصاميمك '.$_SESSION['uLastName'].' '.$_SESSION['uFirstName'].'  أهلا بك
               </h2>

               ';  
          }
          else{
               echo'
               <h2 style = "position: absolute; top:20%; right:20%; left:20%; text-align:right;">
                     يبدو أنك لم تسجل كمصمم. سجل دخولك كي ترا تصاميمك أو انضم إلينا اليوم في حالة لم يكن لديك حساب  في منصة أكنانا وأعرض تصاميمك السكنية
               </h2>

               ';
               
               // <button >
               //      <a href="LoginPage.php"> 
               //           سجل دخولك في أكنانا
               //      </a>
               // </button>
          }
     ?>

<!-- </body>
</html> -->


<?php
// the nav file here would be used on all pages. That way, every time we need to make a change, we would only need to make it once to the nav.php file
require "Header_Footer/footer.php"
?> 
<?php
    session_start(); // maintaining that the session is on all of the pages on the website.
?>

<section class="sec2">
        <!-- <img src="Aknanalogo.png" 10px 0 no-repeat style="width: 80px; height: 80px;" > -->
        <!-- <a href="main.html"></a> -->
        <button class="homePage2">
            <a href="index.php"> 
                <img src="Aknanalogo.png" 10px 0 no-repeat style="width: 90px; height: 90px; background = transparentl;" >
            </a>
        </button>
    </section>

    <nav class = "topBar2">
        <ul>
            <li class ="normal">
                <a class="tabElement"  href="index.php" style = "color:black"> الرئيسية </a>
            </li>
            <li class ="normal">
                <a class="tabElement"  href="search.php" style = "color:black"> بحث </a>
            </li>
            <li class ="normal">
                <a class="tabElement"  href="design.php" style = "color:black"> التصاميم </a>
            </li>
            <li class ="normal">
                <a class="tabElement"  href="designer.php" style = "color:black"> المصممين </a>
            </li>
        
            <h1 style="color: black; left:41%; font-size: 28px; position:fixed; margin-right:190px; width:250px; top:80px;">
                     أكنانا للمخططات المعمارية
            </h1>

            <?php
                if(isset($_SESSION['uID'])){ // checking if we are in a session
                    echo'

                        <li class ="loginAndSignup2">
                              <a class="tabElement" href="cartPage.php" style = "color:black"> السلة </a> 
                        </li>

                        <li class ="loginAndSignup2">
                            <form action = "includes/Logout.php" method = "POST" >
                                <button name = "logoutButton" class = "loginAndSignup" style = "color:black"> خروج </button>
                            </form> 
                        </li>
                          
                          '; 
                }
                else{
                    echo  ' 
                          <li class ="loginAndSignup2">
                              <a class="tabElement" href="cartPage.php" style = "color:black"> السلة </a> 
                          </li>

                          <!-- 
                          <li class ="loginAndSignup2">
                          <a  href="signuppage.php" style = "color:black">  التسجيل </a>
                          </li>
                           -->
    
                          <li class ="loginAndSignup2">
                              <a class="tabElement" href="LoginPage.php" style = "color:black"> الدخول </a> 
                          </li>
                          ' ;                      
                }
            ?>

            <!-- <li class ="loginAndSignup">
                <a  href="signuppage.php">  التسجيل </a>
            </li>

            <li class ="loginAndSignup">
                <a  href="LoginPage.php"> الدخول </a> 
            </li> -->

        </ul>
    </nav>

<div class="pageBoxContainer">

    <?php
        if(isset($_SESSION['uID'])){ // checking if we are in a session
            echo'
                <a href="search.php">
                    <div class="mainPageBox" id = "box1">
                        <p class = "textInsideBox" style=" position: relative; top:-15px;">
                            تريد مخطط
                        </p>
                    </div>
                </a>
        
                <a href="design.php">
                    <div class="mainPageBox" id = "box2">
                        <p class = "textInsideBox" style="padding-top:10px;">
                            شريك مصمم
                        </p>
                    </div>   
                </a>
            '; 
        }
        else{
            echo'
                <a href="LoginPage.php">
                    <div class="mainPageBox" id = "box1">
                        <p class = "textInsideBox" style="padding-top:10px;">
                            تريد مخطط
                        </p>
                    </div>
                </a>
        
                <a href="LoginPage.php">
                    <div class="mainPageBox" id = "box2">
                        <p class = "textInsideBox" style="padding-top:10px;">
                            شريك مصمم
                        </p>
                    </div>   
                </a>
            '; 
        }
    ?>
    
</div>
        
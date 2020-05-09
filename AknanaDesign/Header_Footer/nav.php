<?php
    session_start(); // maintaining that the session is on all of the pages on the website.
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" herf = "Styles/footer.css"> -->
    <link rel="stylesheet" href = "Styles/main.css">
    <link rel="stylesheet" href = "Styles/signup.css">
    <link rel="stylesheet" herf = "Styles/design.css">
    <link rel="stylesheet" href = "Styles/dropMenu.css">
    <link rel="stylesheet" href = "Styles/mainOnly.css">
    <link rel="stylesheet" href = "Styles/aboutAknana.css">
    <link rel="stylesheet" href = "Styles/search.css">
    <link rel="stylesheet" href = "Styles/designDetails.css">


    <!-- <script src="Header_Footer/design.js"></script> -->

    <title>Document</title>

</head>

<body id="bod">

    <section class="sec1">
        <!-- <img src="Aknanalogo.png" 10px 0 no-repeat style="width: 80px; height: 80px;" > -->
        <!-- <a href="main.html"></a> -->
        <button class="homePage">
            <a href="index.php"> 
                <img src="Aknanalogo.png" 10px 0 no-repeat style="width: 90px; height: 90px; background = transparent; top:-10px;" >
            </a>
        </button>
    </section>

    <nav class = "topBar">
        <ul>
            <li class ="normal">
                <a class="tabElement" href="index.php" style = "color:black;"> الرئيسية </a>
            </li>
            <li class ="normal">
                <a class="tabElement" href="search.php" style = "color:black;"> بحث </a>
            </li>
            <li class ="normal">
                <a class="tabElement" href="design.php" style = "color:black;"> التصاميم </a>
            </li>
            <li class ="normal">
                <a class="tabElement" href="designer.php" style = "color:black;"> المصممين </a>
            </li>

            <h1 style="color: black; left:40%; font-size: 28px; position:absolute; margin-right:190px; width:350px; top:-10px;">
            أهلا بك في عالم أكنانا المعماري
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
                          <li class ="loginAndSignup">
                              <a class="tabElement" href="cartPage.php" style = "color:black;"> السلة </a> 
                          </li>

                           <!-- 
                           <li class ="loginAndSignup">
                           <a  href="signuppage.php" style = "color:black;">  التسجيل </a>
                           </li>
                           -->
    
                          <li class ="loginAndSignup">
                              <a class="tabElement" href="LoginPage.php" style = "color:black;"> الدخول </a> 
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


    <h1>
        
    </h1>


    


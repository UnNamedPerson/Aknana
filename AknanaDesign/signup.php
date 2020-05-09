<?php
// ob_start();
if( isset($_POST['signupSubmit']) ){

     require 'DBHandler.php';
     
     $Firstname = $_POST['Fname'];
     $Lastname = $_POST['Lname'];
     $Email = $_POST['Email'];
     $pwd = $_POST['pwd'];
     $pwdRepeat = $_POST['pwdRepeat'];
     echo 'wtf';
 
     // if statments for different error cases when the user enters information in the from.
     if( empty($Firstname)|| empty($Lastname)|| empty($Email)|| empty($pwd)|| empty($pwdRepeat)){
          // echo"one is empty";
          // header("Location: ../signuppage.php?error=invalidemailFnameLname");
          header("Location: ../signuppage.php?error=emptyfields&Fname=".$Firstname."&Lname=".$Lastname."&Email=".$Eamil);
          exit();
     }
     else if( !filter_var($Email, FILTER_VALIDATE_EMAIL) && !preg_match("[a-zA-Z]", $Firstname) && !preg_match("[a-zA-Z]", $Lastname) ){
          header("Location: ../signuppage.php?error=invalidemailFnameLname");
          exit();  
     }
     else if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
          header("Location: ../signuppage.php?error=invalidemail&Fname=".$Firstname."&Lname=".$Lastname);
          exit();  
     }

     else if(!preg_match("[a-zA-Z]", $Firstname) ){
          header("Location: ../signuppage.php?error=invalidfname&Email=".$Email."&Lname".$Lastname);
          exit();  
     }
     else if( !preg_match("[a-zA-Z]", $Lastname) ){
          header("Location: ../signuppage.php?error=invalidlname&Email=".$Email."&Fname".$Fname);
          exit();  
     }
     else if ($pwd !== $pwdRepeat){
          header("Location: ../signuppage.php?error=pwdcheck&Fname=".$Firstname."&Lname=".$Lastname."&Email=".$Email);
          exit();  
     }
     else{ // looking up emails to see if they already exist in the DB
          // sql variable command
          $sqlCommand = "SELECT userEmail FROM userinfo WHERE userEmail=?";
          // making a connection to the db
          $sqliStatment = mysqli_stmt_init($connection);

          // checking if the sqli prepare statment would work
          if( !mysqli_stmt_prepare($sqliStatment, $sqlCommand) ){
               // go back to the signup page with the error message
               header("Location: ../signuppage.php?error=sqlifailed");
               exit();
          } 
          else{
               // binding the info the user enterd with the statment
               mysqli_stmt_bind_param($sqliStatment, 's', $Email); // s = string, repeat the 's' for each parameter the user enters
               mysqli_stmt_execute($sqliStatment);
               mysqli_stmt_store_result($sqliStatment); // ised when we want to fetch somthing from the DB
               $resultCheck = mysqli_stmt_num_rows($sqliStatment); // returns how many rows were found the matches the statment. It should either be 0 or 1
               
               if($resultCheck > 0){
                    header("Location: ../signuppage.php?error=emailtaken&Fname=".$Firstname."&Lname=".$Lastname);
                    exit();    
               }
               else{ // no errors, insert the data into the DB
                    // sql command to insert the values into the DB
                    $sqlCommand = "INSERT INTO userinfo (userEmail, userPWD, firstName, lastName) VALUES (?, ?, ?, ?)";
                    $sqliStatment = mysqli_stmt_init($connection);

                    if( !mysqli_stmt_prepare($sqliStatment, $sqlCommand) ){
                         // go back to the signup page with the error message
                         header("Location: ../signuppage.php?error=sqlifailed");
                         exit();
                    } 
                    else{
                         $hashedPWD =  password_hash($pwd, PASSWORD_DEFAULT); // use this to hash the users password so that when the DB gets hacked, no passwords get exposed. 

                         mysqli_stmt_bind_param($sqliStatment, 'ssss', $Email, $hashedPWD, $Firstname, $Lastname); // s = string, repeat the 's' for each parameter the user enters. Entered in the same order in the sql command
                         mysqli_stmt_execute($sqliStatment);

                         header("Location: ../signuppage.php?signup=success");
                         exit();
                    }
               }
          }
     }
     // closing the connection and the sql statment
     mysqli_stmt_close($sqliStatment);
     mysqli_close($connection);
}

else{ // in case the user got to this page without clicking on the signup button
     header("Location: ../signuppage.php");
     exit();
}


// 
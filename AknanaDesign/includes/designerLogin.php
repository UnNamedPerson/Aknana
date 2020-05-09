<?php
// ob_start();
if( isset($_POST['loginSubmit']) ){

     require 'DBHandler.php';
     
     $Email = $_POST['Email'];
     $pwd = $_POST['pwd'];
     $companyNumber = $_POST['companyNumber'];
 
     // if statments for different error cases when the user enters information in the from.
    
     if( empty($Email) || empty($pwd) || empty($companyNumber) ){ // in case the email or passowrd fields were empty when the user clicked the login button
          header("Location: ../LoginPage.php?error=emptyfields&Email=".$Eamil);
          exit();
     }
    
     // else if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){ // in case the email was invalid
     //      header("Location: ../LoginPage.php?error=invalidemail");
     //      exit();  
     // } 

     else{ // looking up emails to see if they already exist in the DB
          // sql variable command
          $sqlCommand = "SELECT * FROM designerinfo WHERE email=?;"; // the '*' in the sql command means 'all columns'
          // making a connection to the db
          $sqliStatment = mysqli_stmt_init($connection);

          // checking if the sqli prepare statment would work
          if( !mysqli_stmt_prepare($sqliStatment, $sqlCommand) ){
               // go back to the signup page with the error message
               header("Location: ../LoginPage.php?error=sqlifailed");
               exit();
          } 
          else{
               // binding the info the user enterd with the statment
               mysqli_stmt_bind_param($sqliStatment, 's', $Email); // s = string, repeat the 's' for each parameter the user enters
               mysqli_stmt_execute($sqliStatment);
               // mysqli_stmt_store_result($sqliStatment); // used when we want to fetch somthing from the DB
               $result = mysqli_stmt_get_result($sqliStatment); // returns how many rows were found the matches the statment. It should either be 0 or 1
               
               if($resultRow = mysqli_fetch_assoc($result) ){
                    $pwdMatch = password_verify($pwd, $resultRow['pwd']); // a variable that checks if the password entered by the user matches the one on the DB without having to hash the entered pwd
                    if($pwdMatch ==  true and $resultRow['companyNumber'] == $companyNumber){ // start a session if the passwords match
                         session_start();
                         $_SESSION['uID'] = $resultRow['id']; // sessions are a way to store user's info to be used on mult pages on the same website. We are storing the necessary info in the session array.
                         $_SESSION['uEmail'] = $resultRow['email'];
                         $_SESSION['uFirstName'] = $resultRow['firstName'];
                         $_SESSION['uLastName'] = $resultRow['lastName'];
                         $_SESSION['companyName'] = $resultRow['companyName'];
                         // $_SESSION['companyNumber'] = $resultRow['companyNumber'];

                         header("Location: ../index.php?login=success");
                         exit();
                    }
                    else if($pwdMatch == false){
                         header("Location: ../LoginPage.php?error=wrongpwd&wrongcompanynumber=".$companyNumber);
                         exit();
                    }
                    
                    else{ // in case there was something else the was neither true nor false
                         header("Location: ../LoginPage.php?error=somethingisn'tgoingright");
                         exit();
                    }

               }
               else{
                    header("Location: ../LoginPage.php?error=usernotindatabase");
                    exit();
               }
          }
     }
     // closing the connection and the sql statment
     mysqli_stmt_close($sqliStatment);
     mysqli_close($connection);
}

else{ // in case the user got to this page without clicking on the signup button
     header("Location: ../LoginPage.php");
     exit();
}


// 
<?php
// ob_start();
if( isset($_POST['register']) ){

     require 'designerInfoDBHandler.php';
     
     $Firstname = $_POST['fName'];
     $Lastname = $_POST['lName'];
     $companyName = $_POST['cName'];
     $companyNumber = $_POST['cNumber'];
     $Email = $_POST['Email'];
     $pwd = $_POST['Pwd'];
     $pwdRepeat = $_POST['PwdRepeat'];

     // if statments for different error cases when the user enters information in the from.
     if( empty($Firstname)|| empty($Lastname)|| empty($companyName) || empty($companyNumber) || empty($Email)|| empty($pwd)|| empty($pwdRepeat)){
          // echo"one is empty";
          // header("Location: ../signuppage.php?error=invalidemailFnameLname");
          header("Location: ../designerRegisteration.php?error=emptyfields&Fname=".$Firstname."&Lname=".$Lastname."&Email=".$Eamil);
          exit();
     }
     else if( !filter_var($Email, FILTER_VALIDATE_EMAIL) && !preg_match("[a-zA-Z]", $Firstname) && !preg_match("[a-zA-Z]", $Lastname) ){
          header("Location: ../designerRegisteration.php?error=invalidemailFnameLname");
          exit();  
     }
     else if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
          header("Location: ../designerRegisteration.php?error=invalidemail&Fname=".$Firstname."&Lname=".$Lastname);
          exit();  
     }

     else if(!preg_match("/^[a-zA-Z]+$/", $Firstname) ){
          header("Location: ../designerRegisteration.php?error=invalidfname&Email=".$Email."&Lname=".$Lastname);
          exit();  
     }
     else if( !preg_match("/^[a-zA-Z]+$/", $Lastname) ){
          header("Location: ../designerRegisteration.php?error=invalidlname&Email=".$Email."&Fname=".$Fname);
          exit();  
     }
     else if(!preg_match("/^[a-zA-Z]+$/", $companyName) ){
          header("Location: ../designerRegisteration.php?error=invalidcompanyName=".$companyName."&Lname=".$Lastname);
          exit();  
     }
     else if( !preg_match("/^[0-9]+$/", $companyNumber) ){
          header("Location: ../designerRegisteration.php?error=invalidlcompanyNumber=".$companyNumber."&Fname=".$Fname);
          exit();  
     }
     else if ($pwd !== $pwdRepeat){
          header("Location: ../designerRegisteration.php?error=pwdcheck&Fname=".$Firstname."&Lname=".$Lastname."&Email=".$Email);
          exit();  
     }
     else{ // looking up emails to see if they already exist in the DB
          // sql variable command
          $sqlCommand = "SELECT email FROM designerinfo WHERE email=?";
          // making a connection to the db
          $sqliStatment = mysqli_stmt_init($connection);

          // checking if the sqli prepare statment would work
          if( !mysqli_stmt_prepare($sqliStatment, $sqlCommand) ){
               // go back to the signup page with the error message
               header("Location: ../designerRegisteration.php?error=sqlifailed");
               exit();
          } 
          else{
               // binding the info the user enterd with the statment
               mysqli_stmt_bind_param($sqliStatment, 's', $Email); // s = string, repeat the 's' for each parameter the user enters
               mysqli_stmt_execute($sqliStatment);
               mysqli_stmt_store_result($sqliStatment); // ised when we want to fetch somthing from the DB
               $resultCheck = mysqli_stmt_num_rows($sqliStatment); // returns how many rows were found the matches the statment. It should either be 0 or 1
               
               if($resultCheck > 0){
                    header("Location: ../designerRegisteration.php?error=emailtaken&Fname=".$Firstname."&Lname=".$Lastname);
                    exit();    
               }
               else{ // no errors, insert the data into the DB
                    // sql command to insert the values into the DB
                    $sqlCommand = "INSERT INTO designerinfo (email, pwd, firstName, lastName, companyNumber, companyName) VALUES (?, ?, ?, ?, ?, ?)";
                    $sqliStatment = mysqli_stmt_init($connection);

                    if( !mysqli_stmt_prepare($sqliStatment, $sqlCommand) ){
                         // go back to the signup page with the error message
                         header("Location: ../designerRegisteration.php?error=sqlifailed");
                         exit();
                    } 
                    else{
                         $hashedPWD =  password_hash($pwd, PASSWORD_DEFAULT); // use this to hash the users password so that when the DB gets hacked, no passwords get exposed. 

                         mysqli_stmt_bind_param($sqliStatment, 'ssssss', $Email, $hashedPWD, $Firstname, $Lastname, $companyNumber, $companyName); // s = string, repeat the 's' for each parameter the user enters. Entered in the same order in the sql command
                         mysqli_stmt_execute($sqliStatment);

                         header("Location: ../designerRegisteration.php?signup=success");
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
     header("Location: ../designerRegisteration.php");
     exit();
}
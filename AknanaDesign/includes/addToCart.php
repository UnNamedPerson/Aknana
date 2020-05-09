<?php
     session_start();
     require 'cartDBHandler.php';
     if( isset($_POST['imageDetail']) ){
          $costumerID = $_POST['costumerID'];
          $designImage = $_POST['designImage'];
     
          // sql variable command
          $sqli = "INSERT INTO carttable (costumerID, designImage) VALUES (?, ?); ";
          $sqliConnecction = mysqli_stmt_init($conn);

          // checking if the sqli prepare statment would work
          if( !mysqli_stmt_prepare($sqliConnecction, $sqli) ){
               // go back to the designdetail page with the error message
               header("Location: ../cartPage.php?error=sqlifailed");
               exit();
          } 
          else{
               // binding the info the user enterd with the statment
               mysqli_stmt_bind_param($sqliConnecction, 'ss', $costumerID, $designImage); // s = string, repeat the 's' for each parameter the user enters
               mysqli_stmt_execute($sqliConnecction);
               // mysqli_stmt_store_result($sqliConnecction); // used when we want to fetch somthing from the DB
               
               $_SESSION['designImage'] = $designImage; // sessions are a way to store user's info to be used on mult pages on the same website. We are storing the necessary info in the session array.
               // $_SESSION['companyNumber'] = $resultRow['companyNumber'];

               header("Location: ../cartPage.php?cartUpload=success");
               exit();
          }
          // closing the connection and the sql statment
          mysqli_stmt_close($sqliConnecction);
          mysqli_close($connection);
     }
?>

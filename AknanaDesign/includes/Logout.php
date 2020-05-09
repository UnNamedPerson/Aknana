<?php

     session_start();
     session_unset(); // end the session
     session_destroy();
     header("Location: ../index.php?logout=success");

?>
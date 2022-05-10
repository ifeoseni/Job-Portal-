<?php
session_start();
 if(isset($_GET['logout'])) {
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['accounttype']);
    session_destroy();
    // $_SESSION['name'] = "rubbish";
    header('location:../../login.php');
   
}

?>
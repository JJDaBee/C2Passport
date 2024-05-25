<?php

session_start();


    // WRITE YOUR CODES HERE
    if (isset($_SESSION['username'])){
        echo "<h1>Thank you {$_SESSION['username']} for visiting</h1>";
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        
    }
?>
Click <a href='login.php'>here</a> to return to Login Page
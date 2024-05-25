<?php

/***
to auto-load class definitions from PHP files
***/
spl_autoload_register(function($class) {
    $path = "./model/" . $class . ".php";
    require_once $path; 
    
});



/***
session related stuff
***/
session_start();


/***
print errors based on session variable 'errors'
***/
function printErrors() {
    if(isset($_SESSION['errors'])){
        
        echo "<ul style='color:red;'>";
        
        foreach ($_SESSION['errors'] as $error) {
            echo "<li>" . $error . "</li>";
        }
        
        echo "</ul>";   
        unset($_SESSION['errors']);
    }
}
?>

<html>
    <header>
        <a href="welcome.php"> Home</a> |
        <a href="volunteer_signup.php">Sign Up for Volunteering</a> |
        <a href="referral.php"> Referral</a> |
        <a href="leaderboard.php"> Leaderboard</a> |
        <a href="profile.php">Profile</a> |
        <a href="logout.php">Log Out</a>
        <!-- <a href="change_password.php"> Change Password</a> -->
        <br/>
        <hr>
</header>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f7;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }
        a {
            display: inline;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 20px;
        }
        .nav-links {
            margin-bottom: 20px;
        }
        .nav-links a {
            margin: 0 10px;
            text-decoration: none;
            color: #007bff;
        }
        .nav-links a:hover {
            text-decoration: underline;
        }
        h3 {
            color: #333;
        }
    </style>
</head>
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
    <body><div class="container">
        <a href="welcome.php"> Home</a> |
        <a href="volunteer_signup.php">Sign Up for Volunteering</a> |
        <a href="referral.php"> Referral</a> |
        <a href="leaderboard.php"> Leaderboard</a> |
        <a href="profile.php">Profile</a> |
        <a href="logout.php">Log Out</a>
        <!-- <a href="change_password.php"> Change Password</a> -->
        <br/>
        <hr>
    </div>
        </body>
</html>

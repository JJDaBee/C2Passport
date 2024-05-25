<html>
    <body>
        <a href="welcome.php">Home</a> |
        <a href="profile.php">Profile</a> |
        <a href="volunteer_signup.php">Sign Up for Volunteering</a> |
        <a href="logout.php">Logout</a>
        <br/>
    </body>
</html>

<?php

session_start();


if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    echo "<h3> Welcome ". $username.  ". You have login successfully </h3>";
    echo "Not so secret stuff. But only for registered users";

    
}
else{
    header("Location: login.php");
    return;
}


?>



<html>
    <body>
        <a href="welcome.php">Home</a> |
        <a href="profile.php">Profile</a> |
        <a href="volunteer_signup.php">Sign Up for Volunteering</a> |
        <a href="logout.php">Logout</a>
        <br/>
        <h3>This is the profile page</h3>
    </body>
</html>
<?php

spl_autoload_register(function($class) {
    $path = "./model/" . $class . ".php";
    require_once $path; 
    
});
session_start();


if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $volunteerDAO = new VolunteerDAO();
    $volunteer = $volunteerDAO->getAll($username);

}
else{
    header("Location: login.php");
    return;
}
?>
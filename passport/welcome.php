<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leaderboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f7;
            margin: 0;
            padding: 20px;
        }
        .badges-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .badge {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<?php
require_once 'common2.php';



if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $userDAO = new UserDAO;
    $user = $userDAO->get($username);
    $fname = $user->getFname();
    $lname = $user->getLname();

    echo "<h3> Welcome ". $fname. " ". $lname. ". </h3>";
    
    
}
else{
    header("Location: home.php");
    return;
}
?>
</body>
<strong>Welcome to Community Connect</strong>
<p>A volunteering website for volunteers to find and register for volunteering opportunities that match their interest. <br>
    Their profile will include a passport where they will be able to earn badges for each volunteering activity they have completed. <br>
    It also keeps track of the total service hours .</p>

<strong>How it works?</strong>
<p>Discover how easy it is to get started with volunteering. <br>
    Find opportunities, register, and make a difference in your community.</p>


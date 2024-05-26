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
<html>
    <body>
        <a href="login.php"> Home </a> |
        <a href="logout.php"> Logout </a>
        <br/>
    </body>
</html>

<?php
require_once "common2.php";

// session_start();


if (isset($_SESSION['username']) && $_SESSION['role']=='admin'){
echo "<h3> Welcome Admin ". $_SESSION["username"] .  ". You have login successfully </h3>";
echo "<Top secret stuff, for admin eyes only.";
}
else{
    header("Location: home.php");
}

?>

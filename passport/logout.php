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


    // WRITE YOUR CODES HERE
    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $userDAO = new UserDAO;
        $user = $userDAO->get($username);
        $fname = $user->getFname();
        $lname = $user->getLname();

        echo "<h1>Thank you ". $fname. " ". $lname. " for volunterring!</h1>";
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        
    }
?>
Click <a href='home.php'>here</a> to return to Home Page
</body>
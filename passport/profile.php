<!-- <!DOCTYPE html>
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
</head> -->
<?php

require_once 'common2.php';
echo "<h3>This is the profile page</h3>";

if (isset($_SESSION['success'])) {
    echo "Password has been updated.<br>";
    unset($_SESSION['success']);
}
if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $volunteerDAO = new VolunteerDAO();
    $volAllSess = $volunteerDAO->getAll($username);
    if (!empty($volAllSess)) {
        echo "Here are your registered volunteering events. Do take note of the dates!";
        echo "<ol>";
        foreach ($volAllSess as $sess) {
            echo "<li>{$sess->getVname()}, {$sess->getVdate()}</li>";
        }
        echo "</ol>";
    } else {
        echo "You have not signed up for any volunteer sessions.";
    }
    echo "<hr><h3>Quick Links:</h3>";
    echo "<a href='passport.php'>View your passport</a> | <a href='change_password.php'>Change password</a>";
}
else{
    header("Location: home.php");
    return;
}
?>

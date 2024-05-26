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
    <?php
require_once 'common2.php';

// WRITE YOUR CODES HERE
if (isset($_SESSION['pwd_change_fail'])){
    $username=$_SESSION['pwd_change_fail'];
    unset($_SESSION['pwd_change_fail']);
}
else {
    $username = '';
}

?>

<html>
    <body>
    
    <h1>Change Password </h1>
    
    <head>
        <style>
            table,th,td{
                border: 1px solid black;
            }
            </style>
    </head>
    
    <form method="post" action="process_change_password.php">
        <table>
            <tr>
            <th>
                Username
            </th>
            <td>
                <input name="username" value='<?= $username?>' />
            </td>
        </tr>
        <tr>
            <th>
                Original Password
            </th>
            <td>
                <input type="password" name="originalpassword" value=""/>
            </td>
        </tr>
        <tr>
            <th>
                New Password
            </th>
            <td>
                <input type="password" name="newPassword" value=""/>
            </td>
        </tr>
        <tr>
            <th>
                Confirm New Password
            </th>
            <td>
                <input type="password" name="newconfirmPassword" value=""/>
            </td>
        </tr>
    </table>
    <br/>
        <input type="submit" name="submit" />
    </form>
    
    <?php printErrors(); ?>
    
</body>
</html>
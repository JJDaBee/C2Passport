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
    require_once 'common.php';

    // WRITE YOUR CODES HERE
    $username = '';
    if (isset($_SESSION["login_page"])) {
        $username = $_SESSION["login_page"];
        unset($_SESSION["login_page"]);
}  
    if (!empty($_POST['submit']) and !empty($_POST['username'])) {
        $_SESSION['username'] = $_POST['username'];
    }


?>


<html>
<body>
    <h1>Welcome ! Login Page</h1>
    
    <head>
        <style>
            table,th,td{
                border: 1px solid black;
            }
        </style>
    </head>

    <form action="process_login.php" method="post">
        <table>
        <tr>
            <th>Username</th>
            <td> <input name="username" value = '<?php echo $username ?>' /> </td>
        </tr>
        <tr>
            <th>Password</th>
            <td> <input type="password" name="password" /> </td>
        </tr>
        </table>
        <br/>
        <input type="submit" name='submit' value="Login" /> 
        <a href="password_reset.php">Forget Password</a>
    </form>
    
    <?php printErrors(); ?>
    
</body>
</html>
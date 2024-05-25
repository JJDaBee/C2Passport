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
$tmp_username = '';
if (isset($_SESSION["register_fail"])) {
    $tmp_username = $_SESSION["register_fail"];
    unset($_SESSION["register_fail"]);
}
?>

<html>

<body>

    <h1>Register </h1>

    <head>
        <style>
            table,
            th,
            td {
                border: 1px solid black;
            }
        </style>
    </head>

    <form method="post" action="process_register.php">
        <table>
            <tr>
                <th>First Name *</th>
                <td>
                    <input type="text" name="fname"/>
                </td>
            </tr>
            <tr>
                <th>Last Name *</th>
                <td>
                <input type="text" name="lname"/>
                </td>
            </tr>
            <tr>
                <th>Email *</th>
                <td>
                    <input type="text" name="username" value='<?= $tmp_username ?>' />
                </td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>
                    <input type="text" name="phoneno"/>
                </td>
            </tr>
            <tr>
                <th>Address *</th>
                <td>
                    <input type="textbox" name="address" col="40" row="3" />
                </td>
            </tr>
            <tr>
                <th>Area of Interest</th>
                <td>
                    <label><input type="checkbox" name="aoi" value="type 1"/>type 1</label>
                    <label><input type="checkbox" name="aoi" value="type 2"/>type 2</label>
                    <br>
                    <label><input type="checkbox" name="aoi" value="type 3"/>type 3</label>
                    <label><input type="checkbox" name="aoi" value="type 4"/>type 4</label>
                    <label><input type="checkbox" name="aoi" value="NA"/>NA</label>

                </td>
            </tr>
            <tr>
                <th>
                    Password
                </th>
                <td>
                    <input type="password" name="password" value="" />
                </td>
            </tr>
            <tr>
                <th>
                    Confirm password
                </th>
                <td>
                    <input type="password" name="confirmPassword" value="" />
                </td>
            </tr>
            <tr>
                <th>Referral Code</th>
                <td>
                    <input type='text' placeholder='Referral Code' name='refCode'/>
                </td>
            </tr>
            <tr>
                <th>
                    Role
                </th>
                <td>
                    <select name="role">
                        <option value="user" selected='true'>User</option>
                        <option value="admin">Organisation</option>
                    </select>
                </td>
            </tr>
        </table>
        <br>
        <input type="submit" name="submit" value="Join Now !" />
    </form>

    <?php printErrors(); ?>

</body>

</html>
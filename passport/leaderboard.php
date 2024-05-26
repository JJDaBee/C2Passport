<?php
    require_once 'common.php';
?>

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
        if (isset($_SESSION['username'])) {
            header('location: leaderboard2.php');
            exit();
        }
        echo "Unfortuately, Leaderboard is not up yet.";
    ?>
</body>
</html>

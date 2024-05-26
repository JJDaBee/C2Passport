<?php
    require_once 'common2.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Badges</title>
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
    <p>Here are your badges:</p>
    <div class="badges-container">
        <?php
        // PHP code to display badges
        $badges = array("Badge 1", "Badge 2", "Badge 3", "Badge 4", "Badge 5");

        foreach ($badges as $badge) {
            echo "<div class='badge'>$badge</div>";
        }
        ?>
    </div>
</body>
</html>


<body>
        <?php
        require_once 'common2.php';
        // session_start();

        if (isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            $userDAO = new UserDAO;
            $user = $userDAO->get($username);
            $fname = $user->getFname();
            $lname = $user->getLname();
        ?>
    <?php
            echo "<h3 >Welcome, " . htmlspecialchars($fname) . " " . htmlspecialchars($lname) . ".</h3>";
        } else {
            header("Location: home.php");
            exit;
        }
    ?>
</body>
</html>
<?php require_once 'contact.php' ?>
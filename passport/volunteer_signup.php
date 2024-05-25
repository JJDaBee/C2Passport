<body>
    <a href="welcome.php">Home</a> |
    <a href="profile.php">Profile</a> |
    <a href="volunteer_signup.php">Sign Up for Volunteering</a> |
    <a href="logout.php">Logout</a>
    <br/><br/>
    <h3>Sign Up for Volunteering</h3>
</body>
<?php
spl_autoload_register(function($class) {
    $path = "./model/" . $class . ".php";
    require_once $path; 
    
});
session_start();

if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $volunteerDAO = new VolunteerDAO();
    $volunteer = $volunteerDAO->getAll($username);
    
    
    $volunteerEvents = [
        [
        'vname' => 'Beach Cleanup',
        'vdate' => '2024-06-15'
    ],
    [
        'vname' => 'Park Renovation',
        'vdate' => '2024-07-10'
    ],
    [
        'vname' => 'Food Drive',
        'vdate' => '2024-08-05'
    ],
    [
        'vname' => 'Tree Planting',
        'vdate' => '2024-09-20'
    ],
    [
        'vname' => 'Animal Shelter Volunteering',
        'vdate' => '2024-10-25'
        ]
    ];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $selectedEvent = $_POST['event'];
        // Here you would handle the signup logic, e.g., saving to the database
        // For now, we'll just display a message
        $message = "You have successfully signed up for the event: $selectedEvent";
        echo $message;
        $event = explode(',', $selectedEvent);
        var_dump($event);
        $volunteerDAO->newEntry($username, $event[0], $event[1]);
    }
    else {
        echo "
            <table border='1'>
                <tr>
                    <th>Event</th>
                    <th>Date</th>
                    <th>Action</th>
            </tr>
        ";
        foreach ($volunteerEvents as $event) {
            echo "
                <tr>
                    <td>{$event['vname']}</td>
                    <td>{$event['vdate']}</td>
                    <td>
                        <form method='post' action='volunteer_signup.php'>
                            <input type='hidden' name='event' value='{$event['vname']},{$event['vdate']}'>
            ";
            if (!$volunteerDAO->checkSess($username, $event['vname'], $event['vdate'])) {
                echo "
                        <input type='submit' value='Register'>
                        </form>
                        </td>
                    </tr>
            ";
            } else {
                echo "
                        Registered
                        </form>
                        </td>
                    </tr>
            ";
            }
            
        }
    }
}
else{
    header("Location: login.php");
    return;
}
?>


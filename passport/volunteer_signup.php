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
if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $volunteerDAO = new VolunteerDAO();
    $volunteer = $volunteerDAO->getAll($username);
echo "<h3>Sign Up for Volunteering</h3>";

$volunteerEvents = [
    ['vname' => 'Beach Cleanup', 'vtype' => 'Type 1', 'vdate' => '2024-06-15'],
    ['vname' => 'Park Renovation', 'vtype' => 'Type 2', 'vdate' => '2024-07-10'],
    ['vname' => 'Food Drive', 'vtype' => 'Type 3', 'vdate' => '2024-08-05'],
    ['vname' => 'Tree Planting', 'vtype' => 'Type 4', 'vdate' => '2024-09-20'],
    ['vname' => 'Animal Shelter Volunteering', 'vtype' => 'Type 5', 'vdate' => '2024-10-25'],
    ['vname' => 'Community Garden Maintenance', 'vtype' => 'Type 1', 'vdate' => '2024-11-15'],
    ['vname' => 'Senior Center Visit', 'vtype' => 'Type 2', 'vdate' => '2024-12-05'],
    ['vname' => 'River Cleanup', 'vtype' => 'Type 3', 'vdate' => '2025-01-10'],
    ['vname' => 'School Supplies Donation', 'vtype' => 'Type 4', 'vdate' => '2025-02-20'],
    ['vname' => 'Homeless Shelter Assistance', 'vtype' => 'Type 5', 'vdate' => '2025-03-15'],
    ['vname' => 'Nature Trail Maintenance', 'vtype' => 'Type 1', 'vdate' => '2025-04-10'],
    ['vname' => 'Blood Drive', 'vtype' => 'Type 2', 'vdate' => '2025-05-05'],
    ['vname' => 'Community Library Cleanup', 'vtype' => 'Type 3', 'vdate' => '2025-06-20'],
    ['vname' => 'Elderly Care Facility Visit', 'vtype' => 'Type 4', 'vdate' => '2025-07-15'],
    ['vname' => 'Neighborhood Watch Patrol', 'vtype' => 'Type 5', 'vdate' => '2025-08-10'],
    ['vname' => 'Environmental Awareness Seminar', 'vtype' => 'Type 1', 'vdate' => '2025-09-05'],
    ['vname' => 'Youth Mentorship Program', 'vtype' => 'Type 2', 'vdate' => '2025-10-20'],
    ['vname' => 'Community Potluck Event', 'vtype' => 'Type 3', 'vdate' => '2025-11-15'],
    ['vname' => 'Habitat for Humanity Build', 'vtype' => 'Type 4', 'vdate' => '2025-12-10'],
    ['vname' => 'Community Health Fair', 'vtype' => 'Type 5', 'vdate' => '2026-01-25'],
];

if (empty($_POST['search'])) {
    echo "<form method='post'>
        <input type='text' name='volunteertype' placeholder='Type of Volunteering'/>
        <input type='submit' name='search' value='search'/>
    </form>";
} else {
    $selected_type = $_POST['volunteertype'];
    echo "<form method='post'>
        <input type='text' name='volunteertype' value='$selected_type'/>
        <input type='submit' name='search' value='search'/>
        </form>
    ";
}

    if (isset($_POST['submit'])) {
        $selectedEvent = $_POST['event'];
        // Here you would handle the signup logic, e.g., saving to the database
        // For now, we'll just display a message
        $message = "You have successfully signed up for the event: $selectedEvent";
        echo $message;
        echo "<br><br>Click <a href='volunteer_signup.php'>here</a> to sign up for more events";
        $event = explode(',', $selectedEvent);
        $volunteerDAO->newEntry($username, $event[0], $event[1]);
    }
    else {
        echo "
            <table border='1' style='text-align: center'>
                <tr>
                    <th>Event</th>
                    <th>Type of Volunteering</th>
                    <th>Date</th>
                    <th>Action</th>
                    
            </tr>
        ";
        foreach ($volunteerEvents as $event) {
            if (!empty($selected_type)) {
                if ($event['vtype']==$selected_type) {
                    echo "
                        <tr>
                            <td>{$event['vname']}</td>
                            <td>{$event['vtype']}</td>
                            <td>{$event['vdate']}</td>
                            <td>
                                <form method='post' action='volunteer_signup.php'>
                                    <input type='hidden' name='event' value='{$event['vname']}, {$event['vdate']}'>
                    ";
                    if (!$volunteerDAO->checkSess($username, $event['vname'], $event['vdate'])) {
                        echo "
                                <input type='submit' name='submit' value='Register'>
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
            } else {
                echo "
                        <tr>
                            <td>{$event['vname']}</td>
                            <td>{$event['vtype']}</td>
                            <td>{$event['vdate']}</td>
                            <td>
                                <form method='post' action='volunteer_signup.php'>
                                    <input type='hidden' name='event' value='{$event['vname']}, {$event['vdate']}'>
                    ";
                    if (!$volunteerDAO->checkSess($username, $event['vname'], $event['vdate'])) {
                        echo "
                                <input type='submit' name='submit' value='Register'>
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
}
else{
    header("Location: login.php");
    return;
}
?>


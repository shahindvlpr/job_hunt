<?php
require_once('../../db/dbh.php');
session_start();
if (!isset($_SESSION['job_seeker_id'])) {
    header('location: ../job_seeker_login/index.html');
}
$job_seeker_id = $_SESSION['job_seeker_id'];
$query = "SELECT * FROM job_seeker WHERE job_seeker_id = $job_seeker_id;";
$execute = mysqli_query($conn, $query);
$jobSeekerResult = mysqli_fetch_array($execute);

$query1 = "SELECT * FROM skill_test_registration WHERE seeker_id = $job_seeker_id;";
$execute1 = mysqli_query($conn, $query1);
$jobSeekerResult1 = mysqli_fetch_array($execute1);
if ($execute1->num_rows > 0) {
    $confirm_registration = "yes";
} else {
    $confirm_registration = "no";
}

$notiQuery = "SELECT * FROM seeker_notifications WHERE target=$job_seeker_id";
$notiExec = mysqli_query($conn, $notiQuery);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="./status1.css">
</head>


<header class="header">
    <div class="section">
        <div class="header_container">
            <nav class="navbar">
                <h2 class="logo">
                    <a href="#">
                        <img src="./images/logo.png" alt="">
                    </a>
                </h2>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="messages.php">Messages</a></li>
                    <li><a href="notifications.php">Notifications</a></li>
                    <li><a href="./status/index.php">Status</a></li>
                    <li><a href="../job_seeker_logout/logoutprocess.php">Log Out</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<style>
    .main-container {
        width: 100%;
        position: absolute;
        display: flex;
        justify-content: center;
        /* align-items: center; */
    }

    .notifications-container {
        width: 90%;
        max-width: 600px;
        /* border: 1px solid green; */
    }

    .notification {
        width: 100%;
        padding: 10px;
        border: 1px solid #f0f0f0;
        border-radius: 10px;
        box-shadow: #f0f0f0 2px 2px 2px;
        margin-bottom: 5px;
    }

    .JB_CNFRM {
        border: 1px solid #02730f;
        color: #02730f;
    }

    .SKL_TST_RMDR {
        border: 1px solid #38b6ba;
        color: #38b6ba;
    }

    .SUGG {
        border: 1px solid #3868ba;
        color: #3868ba;
    }
</style>

<body>


    <div class="main-container">
        <div class="notifications-container">
            <?php
            while ($noti = mysqli_fetch_assoc(result: $notiExec)) {
                $class = "notification" . " " . $noti['type'];
            ?>
                <div class="<?php echo $class; ?>">
                    <p><?php echo $noti['text'] ?></p>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

</body>

</html>
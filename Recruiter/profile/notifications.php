<?php
require_once('../../db.php');
session_start();
if (!isset($_SESSION['recruiter_id'])) {
    header('location: ../Recruiter_login/index.html');
}
$recruiter_id = $_SESSION['recruiter_id'];
$query = "SELECT * FROM job_recruiter WHERE recruiter_id = $recruiter_id;";
$execute = mysqli_query($conn, $query);
$recruiterResult = mysqli_fetch_array($execute);



$notiQuery = "SELECT * FROM recruiter_notifications WHERE target=$recruiter_id";
$notiExec = mysqli_query($conn, $notiQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruiter</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <!-- font awesome cdn-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- link css -->
    <link rel="stylesheet" href="./profile1.css">
</head>

<body>
    <header class="header">
        <div class="section">
            <div class="header_container">
                <nav class="navbar">
                    <h2 class="logo">
                        <a href="#">
                            <img src="../../images/logo.png" alt="">
                        </a>
                    </h2>
                    <ul>
                        <li><a href="../../index.html">Home</a></li>
                        <li><a href="../../Recruiter/profile/index.php?"><i class="fa fa-male"></i>Profile</a></li>
                        <li><a href="../../Recruiter/profile/messages.php"><i class="fa fa-envelope"></i>Messages</a></li>
                        <li><a href="../Recruiter_logout/logoutprocess.php"><i class="fa fa-sign-out"></i>logout</a></li>
                        <li><a href="notifications.php"><i class="fa fa-bell"></i>Notifications</a></li>
                        <li><a href="../../Home/contact/contact.php">Contact</a></li>
                    </ul>
                    <a href="../../Recruiter/job-post/index.php" class="post_job">POST A JOB</a>
                </nav>
            </div>
        </div>
    </header>

    <style>
        .main-container {
            margin-top: 50px;
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

        .NEW_PRTCP {
            border: 1px solid #02730f;
            color: #02730f;
        }

        .SKL_TST_RMDR {
            border: 1px solid #38b6ba;
            color: #38b6ba;
        }

        .EMP_SUGG {
            border: 1px solid #3868ba;
            color: #3868ba;
        }
    </style>

    <body>


        <div class="main-container">
            <div class="notifications-container">
                <?php
                while ($noti = mysqli_fetch_assoc($notiExec)) {
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
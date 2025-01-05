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

if (isset($_GET['seeker_id'])) {
    $seeker_id = $_GET['seeker_id'];
} else {
    $lastSeekerQuery = "SELECT job_seeker_id FROM job_seeker WHERE job_seeker_id= ANY (SELECT fromSeeker FROM messages WHERE toRecruiter=$recruiter_id) OR job_seeker_id = ANY (SELECT toSeeker FROM messages WHERE fromRecruiter=$recruiter_id) ";
    $lastSeekerRes = mysqli_fetch_assoc(mysqli_query($conn, $lastSeekerQuery));
    if ($lastSeekerRes != null) {
        $seeker_id = $lastSeekerRes['job_seeker_id'];
        $getSeekerQuery = "SELECT * FROM job_seeker WHERE job_seeker_id=$seeker_id;";
        $getSeekerExecute = mysqli_query($conn, $getSeekerQuery);
        $seekerResult = mysqli_fetch_assoc($getSeekerExecute);

    }
}


// echo $recruiter_id;
// echo $seeker_id;
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

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <!-- link css -->
    <link rel="stylesheet" href="./msg2.css">
    <link rel="stylesheet" href="./msg.css">
</head>

<script>
    function sendMessage() {
        let data = {
            isFromRecruiter: true,
            recruiter_id: <?php echo $recruiter_id ?>,
            seeker_id: <?php echo $seeker_id ?>,
            text: document.getElementById("msgBox").value
        };

        console.log(data);

        fetch(
                "sendMsgHandler.php", {
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    credentials: 'same-origin',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    redirect: 'follow',
                    body: JSON.stringify(data)
                }
            )
            .then(response => response.json())
            .then(json => {
                console.log(json);
                location.reload();
            });
    }
</script>



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
                        <li><a href="notifications.php"><i class="fa fa-bell"></i>Notification</a></li>
                        <li><a href="../Recruiter_logout/logoutprocess.php"><i class="fa fa-sign-out"></i>logout</a></li>
                        <li><a href="../../Home/contact/contact.php">Contact</a></li>
                    </ul>
                    <a href="../../Recruiter/job-post/index.php" class="" style="margin-right:100px">POST A JOB</a>
                </nav>
            </div>
        </div>
    </header>

    <?php if ($lastSeekerRes != null) { ?>
        <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> -->
        <div class="container bootstrap snippets bootdey" style="margin-top: 100px;">
            <div class="row">
                <div class="col-md-4 bg-white ">
                    <div class=" row border-bottom padding-sm" style="height: 40px;">
                        Job Seekers
                    </div>

                    <!-- =============================================================== -->
                    <!-- member list -->
                    <ul class="friend-list">
                        <?php
                        $seekersQuery = "SELECT * FROM job_seeker WHERE job_seeker_id = ANY (SELECT fromSeeker FROM messages WHERE toRecruiter=$recruiter_id) OR job_seeker_id = ANY (SELECT toSeeker FROM messages WHERE fromRecruiter=$recruiter_id)";
                        // echo $seekersQuery;
                        $seekersExecute = mysqli_query($conn, $seekersQuery);

                        while ($rd = mysqli_fetch_assoc($seekersExecute)) {
                            $lastTextQuery = "SELECT * FROM messages WHERE (fromSeeker=" . $rd['job_seeker_id'] . " AND toRecruiter=$recruiter_id) OR (toSeeker=" . $rd['job_seeker_id'] . " AND fromRecruiter=$recruiter_id) ORDER BY sent_at DESC LIMIT 1";
                            $lastTextResult = mysqli_fetch_assoc(mysqli_query($conn, $lastTextQuery));
                        ?>
                            <li class="active bounceInDown">
                                <a href=<?php echo "messages.php?seeker_id=" . $rd['job_seeker_id'] ?> class="clearfix">
                                    <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                                    <div class="friend-name">
                                        <strong> <?php echo $rd['first_name'] . " " . $rd['last_name'] ?> </strong>
                                    </div>
                                    <div class="last-message text-muted"> <?php echo $lastTextResult['text'] ?> </div>
                                    <small class="time text-muted"><?php echo $lastTextResult['sent_at'] ?></small>
                                    <!-- <small class="chat-alert label label-danger">1</small> -->
                                </a>
                            </li>

                        <?php } ?>
                    </ul>
                </div>

                <!--=========================================================-->
                <!-- selected chat -->
                <div class="col-md-8 bg-white ">
                    <div class="chat-message">
                        <ul class="chat">

                            <?php
                            $convoQuery = "SELECT * FROM messages WHERE (fromSeeker=$seeker_id AND toRecruiter=$recruiter_id) OR (toSeeker=$seeker_id AND fromRecruiter=$recruiter_id)";
                            $convoExec = mysqli_query($conn, $convoQuery);

                            while ($rd = mysqli_fetch_assoc($convoExec)) {
                                if ($rd['isFromRecruiter'] == 0) {
                            ?>

                                    <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="https://bootdey.com/img/Content/user_3.jpg" alt="User Avatar">
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="">
                                                <strong class="primary-font"><?php echo $seekerResult['first_name'] . " " . $seekerResult['last_name'] ?></strong>
                                                <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> <?php echo $rd['sent_at'] ?> </small>
                                            </div>
                                            <p>
                                                <?php echo $rd['text'] ?>
                                            </p>
                                        </div>
                                    </li>

                                <?php } else { ?>

                                    <li class="right clearfix">
                                        <span class="chat-img pull-right">
                                            <img src="https://bootdey.com/img/Content/user_1.jpg" alt="User Avatar">
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="">
                                                <strong class="primary-font"><?php echo $recruiterResult['first_name'] . " " . $recruiterResult['last_name'] ?></strong>
                                                <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> <?php echo $rd['sent_at'] ?> </small>
                                            </div>
                                            <p>
                                                <?php echo $rd['text'] ?>
                                            </p>
                                        </div>
                                    </li>

                            <?php }
                            } ?>

                        </ul>
                    </div>
                    <div class="chat-box bg-white">
                        <div class="input-group">
                            <input class="form-control border no-shadow no-rounded" placeholder="Type your message here" id="msgBox">
                            <span class="input-group-btn">
                                <button class="btn btn-success no-rounded" type="button" onclick="sendMessage()">Send</button>
                            </span>
                        </div><!-- /input-group -->
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/61ed80f89bd1f31184d8dbaa/1fq3rvjes';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>
<?php
require_once('../../db.php');
session_start();
if (!isset($_SESSION['job_seeker_id'])) {
    header('location: ../job_seeker_login/index.html');
}
$seeker_id = $_SESSION['job_seeker_id'];
$query = "SELECT * FROM job_seeker WHERE job_seeker_id = $seeker_id;";
$execute = mysqli_query($conn, $query);
$seekerResult = mysqli_fetch_array($execute);

if (isset($_GET['recruiter_id'])) {
    $recruiter_id = $_GET['recruiter_id'];
} else {
    $lastRecruiterQuery = "SELECT recruiter_id FROM job_recruiter WHERE recruiter_id= ANY (SELECT fromRecruiter FROM messages WHERE toSeeker=$seeker_id) OR recruiter_id = ANY (SELECT toRecruiter FROM messages WHERE fromSeeker=$seeker_id) ";
    $lastRecruiterRes = mysqli_fetch_assoc(mysqli_query($conn, $lastRecruiterQuery));
    $recruiter_id = $lastRecruiterRes['recruiter_id'];
}

$getRecruiterQuery = "SELECT * FROM job_recruiter WHERE recruiter_id=$recruiter_id;";
$getrecruiterExecute = mysqli_query($conn, $getRecruiterQuery);
$recruiterResult = mysqli_fetch_assoc($getrecruiterExecute);

// echo $recruiter_id;
// echo $seeker_id;
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <!-- link css -->
    <link rel="stylesheet" href="./status1.css">

    <link rel="stylesheet" href="./msg.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>

<script>
    function sendMessage() {
        let data = {
            isFromRecruiter: false,
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
                            <img src="./images/logo.png" alt="">
                        </a>
                    </h2>
                    <ul>
                        <li><a href="">Home</a></li>
                        <li><a href="messages.php">Messages</a></li>
                        <li><a href="./status/index.php">Status</a></li>
                        <li><a href="../job_seeker_logout/logoutprocess.php">Log Out</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>


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
                    $recruitersQuery = "SELECT * FROM job_recruiter WHERE recruiter_id = ANY (SELECT fromRecruiter FROM messages WHERE toSeeker=$seeker_id) OR recruiter_id = ANY (SELECT toRecruiter FROM messages WHERE fromSeeker=$seeker_id)";
                    // echo $recruitersQuery;
                    $recruitersExecute = mysqli_query($conn, $recruitersQuery);

                    while ($rd = mysqli_fetch_assoc($recruitersExecute)) {
                        $lastTextQuery = "SELECT * FROM messages WHERE (fromRecruiter=" . $rd['recruiter_id'] . " AND toSeeker=$seeker_id) OR (toRecruiter=" . $rd['recruiter_id'] . " AND fromSeeker=$seeker_id) ORDER BY sent_at DESC LIMIT 1";
                        $lastTextResult = mysqli_fetch_assoc(mysqli_query($conn, $lastTextQuery));
                    ?>
                        <li class="active bounceInDown">
                            <a href=<?php echo "messages.php?recruiter_id=" . $rd['recruiter_id'] ?> class="clearfix">
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
                            if ($rd['isFromRecruiter'] == 1) {
                        ?>

                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="https://bootdey.com/img/Content/user_3.jpg" alt="User Avatar">
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

                            <?php } else { ?>

                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="https://bootdey.com/img/Content/user_1.jpg" alt="User Avatar">
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
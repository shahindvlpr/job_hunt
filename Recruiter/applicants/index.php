<?php

require_once('../../db.php');
    session_start();

    if (!isset($_SESSION['recruiter_id'])){
        header('location: ../Recruiter/Recruiter_login/index.html');
    }

    $recruiter_id = $_SESSION['recruiter_id'];
    $post_id = $_GET['post_id'];
    $_SESSION['post_id'] = $post_id;
    $query = "SELECT * FROM job_recruiter WHERE recruiter_id = $recruiter_id;";
    $execute = mysqli_query($conn, $query);
    $recruiterResult = mysqli_fetch_array($execute);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <!-- font awesome cdn-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" 
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- link css -->
    <link rel="stylesheet" href="./style2.css">
</head>
<body onLoad="javascript:showApplicant()">
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
						<li><a href="../../Recruiter/profile/index.php?recruiter_id=<?php echo $recruiter_id; ?>"><i class="fa fa-male"></i>Profile</a></li>
                        <li><a href="../profile/messages.php"><i class="fa fa-envelope"></i>Messages</a></li>
                        <li><a href="../profile/notifications.php"><i class="fa fa-bell"></i>Notifications</a></li>
						<li><a href="../../index.php">logout</a></li>
						<li><a href="#">Applicants</a></li>
						<li><a href="../../Home/contact/contact.php?recruiter_id=<?php echo $recruiter_id; ?>">Contact</a></li>
					</ul>
					<a href="../../Recruiter/job-post/index.php?recruiter_id=<?php echo $recruiter_id; ?>" style="margin-right:340px;">POST A JOB</a>
				</nav>
			</div>
		</div>
	</header>
    <!-- Header End -->
    <div class="applied_job">
        <div id="txtHint"></div>
    </div>

    <script>
    function showApplicant(){
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("txtHint").innerHTML=this.responseText;
            }
        }

        //Must change this path 
        xmlhttp.open("GET","http://localhost/The_Hunt/Recruiter/applicants/Second_index.php",true);
        xmlhttp.send();
    }
    </script>
</body>
</html>
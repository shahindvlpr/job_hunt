<?php
	require_once('../../../db/dbh.php');
    session_start();
    if (!isset($_SESSION['job_seeker_id'])){
        header('location: ../../job_seeker_login/index.html');
    }
    $job_seeker_id = $_SESSION['job_seeker_id'];
    $query = "SELECT * FROM job_seeker WHERE job_seeker_id = $job_seeker_id;";
    $execute = mysqli_query($conn, $query);
    $jobSeekerResult = mysqli_fetch_array($execute);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill test</title>
    <!-- link css -->
    <link rel="stylesheet" href="successfull_login1.css">
    <!-- js script -->
    <script>
        function showUser(str) {
            if (str=="") {
                document.getElementById("txtHint").innerHTML="";
                return;
            }
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    document.getElementById("txtHint").innerHTML=this.responseText;
                }
            }
            xmlhttp.open("GET","get_test.php?q="+str,true);
            xmlhttp.send();
        }
    </script>
</head>
<body>
    <header class="header">
        <div class="section">
            <div class="header_container">
                <nav class="navbar">
                    <h2 class="logo">
                        <a href="#">
                            <img src="../../../images/logo.png" alt="">
                        </a>
                    </h2>
                    <ul>
						<li><a href="../index.php">Home</a></li>
                        <li><a href="../status/index.php">Status</a></li>
						<li><a href="../../job_seeker_logout/logoutprocess.php">Log Out</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="./img/bg.svg">
		</div>
        
		<div class="login-content">
            <form class="choose-name">
                <select name="users" onchange="showUser(this.value)">
                    <option value="">Select a Test:</option>
                    <option value="1">Administration</option>
                    <option value="2">Development</option>
                    <option value="3">Design</option>
                    <option value="4">Programmer</option>
                    <option value="5">Security</option>
                    <option value="6">Engineering</option>
                    <option value="7">System Analysts</option>
                    <option value="8">Data Science</option>
                </select>
            </form>
            <br>
            <div id="txtHint"><b>Test info will be listed here.</b></div>
		</div>
    </div>
</body>
</html>
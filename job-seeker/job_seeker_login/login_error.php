<?php
    require_once('../../db/dbh.php');
    $user = $_GET['username'];
    $pass = $_GET['pass'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>job seeker Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
						<li><a href="../job_seeker_login/index.html">Job seeker</a></li>
						<li><a href="../job_seeker_registration/index.html">Sign up</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
					<a href="#" class="post_job">Apply job</a>
				</nav>
			</div>
		</div>
	</header>
	<!-- End Header -->

	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="./img/bg.svg">
		</div>
		<div class="login-content">
			<form action="./login_process.php" method="POST">
				<img src="./img/avatar.svg">
				<h2 class="title">Welcome</h2>
    			<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
        		   		<h5>Username</h5>
           		   		<input type="text" name="Username" class="input">
           		   </div>
        		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
					  
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="password" class="input">
            	   </div>
            	</div>
				<div class="register">
					<a href="../job_seeker_registration/index.html">Did You Registered?</a>
				</div>
            	<a href="#">Forgot Password?</a>
                <div class="error_message" style="color: red; font-weight: 2px;">
                <?php
                    if($user == 'error' && $pass == 'error'){
                ?>
                            <p>Invalid Username & Password</p>
                <?php
                    }
                    else if($user == 'error'){
                ?>
                            <p>Invalid Username</p>
                <?php
                    }
                    else if($pass == 'error'){                   
                ?>
                            <p>Invalid Password</p>
                <?php
                    }
                ?>
                </div>

            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>

    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>

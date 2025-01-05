<?php
require_once('../../db.php');
session_start();
    if (!isset($_SESSION['recruiter_id'])){
		header('location: ../Recruiter_login/index.html');
	}
    $recruiter_id = $_SESSION['recruiter_id'];
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
    <title>Recruiter</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <!-- font awesome cdn-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" 
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- link css -->
    <link rel="stylesheet" href="./profile.css">
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
						<li><a href="../Recruiter_logout/logoutprocess.php"><i class="fa fa-sign-out"></i>logout</a></li>
						<li><a href="../../Recruiter/applicants/index.php"><i class="fa fa-bell"></i>Notification</a></li>
						<li><a href="../../Home/contact/contact.php">Contact</a></li>
					</ul>
					<a href="../../Recruiter/job-post/index.php" class="post_job">POST A JOB</a>
				</nav>
			</div>
		</div>
	</header>
    <!-- Header End -->
    <div class="wrapper mg-bottom-20">
        <div class="container">
            <div class="left_side-bar">
                <div class="info_icon">
                    <i class="fa fa-info"></i>
                </div>
                <div class="profile_img">
                    <img src="./images/undraw_male_avatar_323b.svg" alt="">
                </div>
                <div class="profile_info">
                    <i class="fa fa-user"></i>
                    <p><?php echo $recruiterResult['first_name'] . ' ' . $recruiterResult['last_name']; ?></p>
                </div>
                <div class="info_link">
                    <i class="fa fa-map-marker"></i>
                    <p>Address</p>
                </div>
                <div class="info_link">
                    <i class="fa fa-book"></i>
                    <p>Education</p>
                </div>
                <div class="info_link">
                    <i class="fa fa-user-md"></i>
                    <p>Job Profile</p>
                </div>
                <div class="info_link">
                    <i class="fa fa-file"></i>
                    <p>Job Experience</p>
                </div>
                <div class="info_link">
                    <i class="fa fa-thumbs-up"></i>
                    <p>skill set</p>
                </div>
                <div class="info_link">
                    <i class="fa fa-external-link"></i>
                    <p>Job Application</p>
                </div>
                <div class="info_link">
                    <i class="fa fa-child"></i>
                    <p>Got Hired</p>
                </div>
                <div class="info_link">
                    <i class="fa fa-undo"></i>
                    <p>Job Request</p>
                </div>
                <div class="info_link">
                    <i class="fa fa-user"></i>
                    <p>Certification</p>
                </div>
                <div class="info_link">
                    <i class="fa fa-user"></i>
                    <p>Skill Tests</p>
                </div>
            </div>
            <div class="right_side-bar">
                <div class="nab_var">
                    <div class="heading">
                        <h2>My Profile</h2>
                    </div>
                </div>
                <div class="profile_sec">
                    <div class="main_profile-img">
                        <img src="./images/undraw_male_avatar_323b.svg" alt="">
                        <form action="update_recruiter_profile_emp.php" method="post">
                            <button class="edit_profile">Edit Profile</button>
                        </form>
                    </div>
                    <div class="main_profile-info">
                        <div class="name info">
                            <p>User name</p>
                            <h3><?php echo $recruiterResult['user_name'] ?></h3>
                        </div>
                        <div class="email info">
                            <p>Email Address</p>
                            <h3><?php echo $recruiterResult['email'] ?></h3>
                        </div>
                        <div class="contact info">
                            <p>contact</p>
                            <h3><?php echo $recruiterResult['contact'] ?></h3>
                        </div>
                    </div>
                </div>
                
                <div class="applied_job">
                    <div class="heading">
                        <h1>Create Skill Tests</h1>
                        <div class="input">
                            <input type="text" id="test-name" class="input-field" placeholder="JS Test"/>
                        </div>
                        Questions :
                        <div class="input">
                            <input type="text" class="input-field" placeholder="egg or the chicken?"/>
                        </div>
                        <div class="input">
                            <input type="text" class="input-field" placeholder="egg or the chicken?"/>
                        </div>
                        <div class="input">
                            <input type="text" class="input-field" placeholder="egg or the chicken?"/>
                        </div>
                        <div class="input">
                            <input type="text" class="input-field" placeholder="egg or the chicken?"/>
                        </div>
                        <div class="input">
                            <input type="text" class="input-field" placeholder="egg or the chicken?"/>
                        </div>
                        <div class="input">
                            <input type="text" class="input-field" placeholder="egg or the chicken?"/>
                        </div>
                        <div class="input">
                            <input type="text" class="input-field" placeholder="egg or the chicken?"/>
                        </div>
                        <div class="input">
                            <input type="text" class="input-field" placeholder="egg or the chicken?"/>
                        </div>

                        <script>
                            function createSkill(){
                                let questionHolders = document.getElementsByClassName("input-field");
                                let questions = "";
                                for(let i=0;i<questionHolders.length;i++){
                                    if(questionHolders[i].value=="") continue;
                                    if(i==0){
                                        questions += questionHolders[i].value;
                                    }
                                    else {
                                        questions += ("[&&]"+questionHolders[i].value);
                                    }
                                }
                                

                                let name = document.getElementById('test-name').value;
                                let rec_id = <?php echo $recruiter_id ?>;

                                let formData = new FormData();
                                formData.append("questions", questions);
                                formData.append("name", name);
                                formData.append("recruiter_id", rec_id);

                                let request = new XMLHttpRequest();
                                request.open("POST", "create_test_handler.php");
                                request.send(formData);

                            }
                            
                        </script>

                        <div class="action">
                            <button onclick="createSkill()" class="action-button">Create</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/61ed80f89bd1f31184d8dbaa/1fq3rvjes';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
<!--End of Tawk.to Script-->
</body>
</html>
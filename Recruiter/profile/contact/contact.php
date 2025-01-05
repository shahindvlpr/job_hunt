<?php
	require_once('../../db/dbh.php');
	session_start();
	if (!isset($_SESSION['recruiter_id'])){
		header('location:../../Recruiter/Recruiter_login/index.html');
    $recruiter_id = $_SESSION['recruiter_id'];
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="./contact_one.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
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
              <li><a href="../../Recruiter/profile/index.php">Profile</a></li>
              <li><a href="../../Recruiter/Recruiter_logout/logoutprocess.php">logout</a></li>
              <li><a href="../../Home/contact/contact.php">Contact</a></li>
            </ul>
            <a href="../../Recruiter/job-post/index.php" class="post_job">POST A JOB</a>
          </nav>
        </div>
      </div>
    </header>
      <!-- Header End -->
  <section>
    <div class="container">
      <span class="big-circle"></span>
      <img src="#" class="square" alt="" />
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
            dolorum adipisci recusandae praesentium dicta!
          </p>

          <div class="info">
            <div class="information">
              <img src="img/location.png" class="icon" alt="" />
              <p>1212 Dhaka, Bangladesh</p>
            </div>
            <div class="information">
              <img src="img/email.png" class="icon" alt="" />
              <p>noob@admin.com</p>
            </div>
            <div class="information">
              <img src="img/phone.png" class="icon" alt="" />
              <p>123-456-789</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form action="./contact_process.php" method="POST">
            <h3 class="title">Drop Your Complain Here </h3>
            <div class="input-container">
              <input type="text" name="name" class="input" />
              <label for="">Username</label>
              <span>Username</span>
            </div>
            <div class="input-container">
              <input type="email" name="email" class="input" />
              <label for="">Email</label>
              <span>Email</span>
            </div>
            <div class="input-container">
              <input type="text" name="contact" class="input" />
              <label for="">contact</label>
              <span>contact</span>
            </div>
            <div class="input-container textarea">
              <textarea name="message" class="input"></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>
            <input type="submit" value="Send" name="send" class="btn" />
          </form>
        </div>
      </div>
    </div>
    </section>

    <script src="app.js"></script>
  </body>
</html>

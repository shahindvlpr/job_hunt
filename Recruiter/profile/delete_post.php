<?php 
require_once('../../db.php');
session_start();
    if (!isset($_SESSION['recruiter_id'])){
        header('location: ../recruiter_login/index.html');
    }
    $recruiter_id = $_SESSION['recruiter_id'];
    $post_id = $_GET["post_id"];


    $job_delete = "DELETE FROM job_post WHERE post_id=$post_id";
    if (mysqli_query($conn, $job_delete)) {
        header("location: ../profile/index.php");
      }
?>
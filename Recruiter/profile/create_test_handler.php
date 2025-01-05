<?php
require_once('../../db.php');
session_start();
    if (!isset($_SESSION['recruiter_id'])){
		header('location: ../Recruiter_login/index.html');
	}
    $recruiter_id = $_POST['recruiter_id'];
    $questions = $_POST['questions'];
    $name = $_POST['name'];

    $query = "INSERT INTO test(`name`, recruiter_id, questions) VALUES(
        '$name',
        $recruiter_id,
        '$questions'
    )";
    $execute = mysqli_query($conn, $query);


?>
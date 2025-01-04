<?php 
    $servername = 'localhost';
    $dbUsername = 'root';
    $dbpassword = 'admin';
    $dbname = 'job_manual';
    
    $conn = mysqli_connect($servername, $dbUsername, $dbpassword, $dbname);

    if(!$conn){
        //echo "Database connection failed";
    }else{
        //echo "Database connection successfull";
    }
?>
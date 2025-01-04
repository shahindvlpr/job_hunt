<?php
    require_once('../../../db/dbh.php');
    session_start();
    if (!isset($_SESSION['job_seeker_id'])){
        header('location: ../job_seeker_login/index.html');
    }
    $job_seeker_id = $_SESSION['job_seeker_id'];
    $query1 = "SELECT * FROM `job_seeker` WHERE job_seeker_id = $job_seeker_id ;";
    $create_query1 = mysqli_query($conn,$query1);
    $result = mysqli_fetch_array($create_query1);

    $result=$result['result'];

?>

<?php echo $result?>


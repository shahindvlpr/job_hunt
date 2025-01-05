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
    <link rel="stylesheet" href="./profile1.css">
</script>
</head>
<body>
    
    <!-- Header End -->
    <div class="heading">
        <h1>Posted Job</h1>
    </div>
    <div class="table_data">
            <table id="customers">
                <tr>
                    <th>Serial</th>
                    <th>Category</th>
                    <th>Position</th>
                    <th>Date</th>
                    <th>Action</th>
                    <th>Delete</th>
                </tr>
                <?php
                    $job_query = "SELECT * FROM job_post WHERE recruiter_id = $recruiter_id;";
                    $job_execute = mysqli_query($conn, $job_query);
                    #$Pending = mysqli_fetch_array($result);
                    if($job_execute->num_rows>0){
                        while($rd = mysqli_fetch_assoc($job_execute)){
                            $post_id = $rd['post_id'];
                            $category = $rd['category'];
                            $position = $rd['job_position'];
                            $Date = $rd['post_date_time'];
                ?>
                <tr>
                    <td><?php echo $post_id; ?></td>
                    <td><?php echo $category; ?></td>
                    <td><?php echo $position; ?></td>
                    <td><?php echo $Date; ?></td>
                    <td><a href="../../Home/jobs.php?post_id=<?php echo $post_id; ?>">View</a></td>
                    <td><a href="../../Recruiter/profile/delete_post.php?post_id=<?php echo $post_id; ?>">Delete</a></td>
                </tr>
                <?php
                    }
                }else{
                    //echo "No Data to Show";
                }
                ?>
            </table>
    </div>
</body>
</html>
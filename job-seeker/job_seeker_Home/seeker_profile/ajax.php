<?php
    require_once('../../../db/dbh.php');
    session_start();
    if (!isset($_SESSION['job_seeker_id'])){
        header('location: ../job_seeker_login/index.html');
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
    <title>Document</title>
</head>
<body>

                    <div class="heading">
                        <h1>Applied Job</h1>
                    </div>
                    <table id="customers">
                        <tr>
                            <th>company name</th>
                            <th>job Position</th>
                            <th>Date Time</th>
                            <th>Action</th>
                        </tr>
                        <?php
                            $job_query = "SELECT * FROM applied_job WHERE job_seeker_id = $job_seeker_id;";
                            $job_execute = mysqli_query($conn, $job_query);
                     
                            if($job_execute->num_rows>0){
                                while($row = mysqli_fetch_assoc($job_execute)){
                                    $job_post_id = $row['post_id'];
                                    $seeker_apply = "SELECT * FROM job_post WHERE post_id = $job_post_id;";
                                    $seeker_apply_execute = mysqli_query($conn, $seeker_apply);
                                    $rd = mysqli_fetch_assoc($seeker_apply_execute);

                                    $serial = $rd['company_name'];
                                    $position = $rd['job_position'];
                                    $apply_date_time = $row['apply_date_time'];
                                    $post_id=$rd['post_id'];
                        ?>
                        <tr>
                            <td><?php echo $serial; ?></td>
                            <td><?php echo $position; ?></td>
                            <td><?php echo $apply_date_time; ?></td>
                            <td><a href="./view/index.php?post_id=<?php echo $post_id;?>">View</a></td>
                        </tr>
                        <?php
                            }
                        }else{
                            echo "No Data to Show";
                        }
                        ?>
                    </table>
</body>
</html>
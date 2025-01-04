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

<?php
                            $job_query = "SELECT * FROM applied_job WHERE job_seeker_id = $job_seeker_id;";
                            $job_execute = mysqli_query($conn, $job_query);
                     
                            if($job_execute->num_rows>0){
                                while($row = mysqli_fetch_assoc($job_execute)){
                                    $job_post_id = $row['post_id'];
                                    $seeker_apply = "SELECT * FROM job_post WHERE post_id = $job_post_id;";
                                    $seeker_apply_execute = mysqli_query($conn, $seeker_apply);
                                    $rd = mysqli_fetch_assoc($seeker_apply_execute);
                                   
                                   
                                    //Will show
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






<!-- <?php
// connect to db

$host = "localhost";
$user = "root";
$password = "";
$database = "tutorial";
$conn = mysqli_connect($host, $user, $password, $database);
$results = $conn->query("SELECT * FROM users");
?>

<?php while ($data = $results->fetch_assoc()): ?>

    <tr>
        <td><?php echo $data['id'] ?></td>
        <td><?php echo $data['username'] ?></td>
        <td><?php echo $data['created_at'] ?></td>
    </tr>
<?php endwhile; ?> -->
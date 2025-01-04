<?php
	require_once('../../../db/dbh.php');
    session_start();
    if (!isset($_SESSION['job_seeker_id'])){
        header('location: ../../job_seeker_login/index.html');
    }
    $job_seeker_id = $_SESSION['job_seeker_id'];

    $q = intval($_GET['q']);
    $name = "";
    if($q == 1){
        $name = 'Administration';
    }else if($q == 2){
        $name = 'Development';
    }else if($q == 3){
        $name = 'Design';
    }else if($q == 4){
        $name = 'Programmer';
    }else if($q == 5){
        $name = 'Security';
    }else if($q == 6){
        $name = 'Engineering';
    }else if($q == 7){
        $name = 'System Analysts';
    }else if($q == 8){
        $name = 'Data Science';
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill test</title>
    <!-- link css -->
    <link rel="stylesheet" href="successfull_login1.css">
</head>
<body>
        
		<div class="login-content">
			<table class="styled-table" style="margin-top: 100px;">
				<thead>
					<tr>
						<th>No.</th>
						<th>Name OF Test</th>
						<th>Passing Score</th>
						<th>Total Question</th>
						<th>Time Limit</th>
						<th>Choose</th>
					</tr>
				</thead>
				<tbody>
                    <?php
                            $sql="SELECT * FROM skill_test WHERE test_name like '$name';";
                            $result = mysqli_query($conn, $sql);
                            $q1 = $q -1;
                            if($result->num_rows>0){
                                $no = 1;
                                while($rd = mysqli_fetch_assoc($result)){
                                    $test_name = $rd['test_name'];
                                    $passing_score = $rd['passing_score'];
                                    $total_question = $rd['total_question'];
                                    $time_limit = $rd['time_limit'];
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $test_name; ?></td>
                            <td><?php echo $passing_score; ?></td>
                            <td><?php echo $total_question; ?></td>
                            <td><?php echo $time_limit; ?></td>
                            <td><a href="./skill_test_registration/index.php?test=<?php echo $q1; ?>">click me!</a></td>
                        </tr>
                        <?php
                        $no = $no + 1;
                            }
                        }else{
                            echo "<tr><td>No Data Available.</td></tr>";
                        }
                        ?>
					
					<!-- and so on... -->
				</tbody>
			</table>
			<p style="color:red;">Notice: You need to set your skill first. Before choosing skill test you need to<br>fill the information form</p>
        </div>
    </div>
</body>
</html>
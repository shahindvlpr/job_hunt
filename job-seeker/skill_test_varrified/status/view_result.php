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


            $test_id = $_GET['id'];
            $queryTest = "SELECT * FROM test_answer WHERE test_id=$test_id AND seeker_id=$job_seeker_id";
            $executeTest = mysqli_query($conn, $queryTest);
            $result = mysqli_fetch_array($executeTest);
            $testAnswers = explode('[&&]', $result['answers']);
            $testAnsID = $result['id'];

            $queryTest = "SELECT * FROM test WHERE id=$test_id";
            $executeTest = mysqli_query($conn, $queryTest);
            $testQuestions = explode('[&&]', mysqli_fetch_array($executeTest)['questions']);


            $queryTest = "SELECT * FROM test_result_2 WHERE test_answer_id=$testAnsID";
            $executeTest = mysqli_query($conn, $queryTest);
            $testResults = explode('[&&]', mysqli_fetch_array($executeTest)['results']);


            $queryTest = "SELECT * FROM suggestions_and_feedbacks WHERE test_answer=$testAnsID";
            $executeTest = mysqli_query($conn, $queryTest);
            $result = mysqli_fetch_array($executeTest);
            $suggestion = $result['suggestion'];
            $feedback = $result['feedback'];
            

            error_reporting(0);
            $count = 0;

            
        ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>status</title>
    <!-- link css -->
    <link rel="stylesheet" href="style2.css">
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
                        <li><a href="../index.php">Home</a></li>
                        <?php if($jobSeekerTestResult['result'] == 'Passed'){?>
                        <li><a href="../../cv_info/index.php">CV</a></li><?php } ?>                       
                        <li><a href="#suggestion">Suggestion</a></li>
                        <li><a href="#suggestion">Feedback</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <div class="main_section">
        <div class="main">
            <div class="left"></div>
            <div class="right">
                <div class="result">
                    <h1>Result Analysis</h1>
                </div>
                <div class="user_info">
                    <ul class="info">
                        <li class="name"><?php echo $jobSeekerResult['user_name'];?></li>
                        <li class="email"><?php echo $jobSeekerResult['email'];?></li>
                    </ul>
                    <div class="border"></div>
                </div>
            </div>
        </div>
        <div class="question_info_sec">
            <div class="q_section">
                <div class="ques_area">
                    <?php echo $testAnswers[0] ?>
                    <div class="ques h_ques">
                        <ul>
                            <li class="h_serial">No.</li>
                            <li class="h_ques_serial">Question</li>
                            <li class="h_ans">Answer</li>
                            <li class="h_c_ans">Result</li>
                            <li class="h_mark">Mark</li>
                        </ul>
                    </div>
                    
                    <?php
                    foreach($testQuestions as $index=>$ques){
                        $question = "";
                        $answers = [];
                        if(strpos($ques, '{%%}')!=false){
                            $question = explode('{%%}', $ques)[0];
                        }
                        else {
                            $question = explode('{**}', $ques)[0];
                        }
                        $answers = explode('{%%}', $testAnswers[$index]);
                        $soln = explode('{**}', $testResults[$index])[0];
                        $mark = explode('{**}', $testResults[$index])[1];
                    ?>

                    <div class="">
                        <ul class="grid">
                            <li class="serial"> <?php echo $index+1 ?> </li>
                            <li class="ques_serial"> <?php echo $question ?> </li>
                            <li class="ans"> <?php foreach($answers as $ans) echo $ans.", " ?></li>
                            <li class="c_ans"><?php echo $soln?></li>
                            <li class="mark"><?php echo $mark?></li>
                        </ul>
                    </div>

                    <?php } ?>
                    
                </div>
            </div>
            <div class="suggetion-feedback">
                <div id="suggestion" class="suggestion">
                    <div class="s_heading">
                        <h1>For suggestion</h1>
                        <p> <?php echo $suggestion ?> </p>
                    </div>
                    <div class="happy_btn">
                        <a href="#">Happy Coding</a>
                    </div>
                </div>
                <div class="suggestion">
                    <div class="s_heading">
                        <h1>For feedback</h1>
                        <p><?php echo $feedback ?></p>
                    </div>
                    <div class="happy_btn">
                        <a href="#">Happy Coding</a>
                    </div>
                </div>
            </div>
            <p class="extra">d</p>
        </div>
    </div>
</body>
</html>
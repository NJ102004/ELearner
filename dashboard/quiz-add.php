<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

    require '../includes/scripts/connection.php';  
    session_start();
    if(isset($_SESSION['educat_logedin_user_id']) && (trim ($_SESSION['educat_logedin_user_id']) !== '')){
        $user_id = $_SESSION['educat_logedin_user_id'];
        $query = "SELECT * FROM user_master WHERE user_id = $user_id";
        $result = mysqli_query($conn, $query);
        $userdata = mysqli_fetch_assoc($result);
        $user_role = $userdata["role"];
        if($user_role != 1 && $user_role != 2){
            header("Location: ../404.php");
        }
    }else{
        header("Location: ../sign-in.php");
    }

    $course = $_GET["course"];
    $quiz = $_GET["quiz"];



    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Loop through the posted form data to extract questions and options
        $quiz_id = $_GET["quiz"];
        $question_count = $_POST['question_count']; // Add a hidden input field with the count of questions

        // Prepare and execute the INSERT query for each question
        for ($i = 1; $i <= $question_count; $i++) {
            $question = mysqli_real_escape_string($conn, $_POST["question_$i"]);
            $option_one = mysqli_real_escape_string($conn, $_POST["option_1_question_$i"]);
            $option_two = mysqli_real_escape_string($conn, $_POST["option_2_question_$i"]);
            $option_three = mysqli_real_escape_string($conn, $_POST["option_3_question_$i"]);
            $option_four = mysqli_real_escape_string($conn, $_POST["option_4_question_$i"]);
            $true_option = mysqli_real_escape_string($conn, $_POST["true_option_question_$i"]);

            // Insert the question and options into the database
            $insert_query = "INSERT INTO quiz_question_master (question, option_one, option_two, option_three, option_four, quiz_true_option, quiz_id, quiz_question_marks) 
                            VALUES ('$question', '$option_one', '$option_two', '$option_three', '$option_four', '$true_option', $quiz_id, 1)"; // Assuming each question has 1 mark
            $res_insert = mysqli_query($conn, $insert_query);
        }

        $update_sql = "UPDATE quiz_master SET quiz_questions_marked = 1";
        $update_res = mysqli_query($conn, $update_sql);
        
        if ($update_res) {
            // Redirect to a success page or perform any other actions after storing the data
            $_SESSION["educat_success_message"] = "Quiz created.";
            header("Location: quiz-add-information.php?course=" . $course);
            exit();
        }

    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Add Quiz</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div> -->

    <div class="main-wrapper">

    <div class="header">

<div class="header-left active">
    <a href="index.php" class="logo">
        <img src="../assets/img/EduCat (3).png" alt="">
    </a>
    <a href="index.php" class="logo-small">
        <img src="../assets/img/EduCat (4).png" alt="">
    </a>
    <a id="toggle_btn" href="javascript:void(0);">
    </a>
</div>

<a id="mobile_btn" class="mobile_btn" href="#sidebar">
    <span class="bar-icon">
        <span></span>
        <span></span>
        <span></span>
    </span>
</a>


            <!-- Header START -->
            <?php
                include("header.php");
            ?>
            <!-- Header END -->


<div class="dropdown mobile-user-menu">
    <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="aprofile.php">My Profile</a>
        <!-- <a class="dropdown-item" href="generalsettings.php">Settings</a> -->
        <a class="dropdown-item" href="#">Logout</a>
    </div>
</div>

</div>


<?php
            include("sidebar.php");
        ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Add Quiz</h4>

                        <?php
                            if(isset($_SESSION["educat_error_message"])){
                                ?>
                                <a style="color: red;"><?php echo $_SESSION["educat_error_message"]?></a>
                                <?php
                                unset($_SESSION["educat_error_message"]);
                            }
                            if(isset($_SESSION["educat_success_message"])){
                                ?>
                                <a style="color: green;"><?php echo $_SESSION["educat_success_message"]?></a>
                                <?php
                                unset($_SESSION["educat_success_message"]);
                            }
                        ?>

                        <!-- <h6>Create new Brand</h6> -->
                        <?php 
                            $auto_fill = TRUE;
                            // $auto_fill = FALSE;
                        ?>
                    </div>
                </div>

                <div class="card" <?php echo ($auto_fill == TRUE)? "style='display:none;'": ""?>>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <?php 
                                    $sqlForInfo = "SELECT * FROM quiz_master WHERE quiz_for_course = $course AND quiz_id = $quiz";
                                    $resForInfo = mysqli_query($conn, $sqlForInfo);
                                    if($resForInfo){
                                        if(mysqli_num_rows($resForInfo) > 0){
                                            $rowForInfo = mysqli_fetch_assoc($resForInfo);
                                            for($i=0; $i < $rowForInfo["quiz_total_questions"]; $i++){
                                            ?>
                                                    <div class="col-lg-12 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label><b>Question <?php echo $i+1;?></b></label>
                                                            <input name="question_<?php echo $i+1;?>" placeholder="Type question <?php echo $i+1;?> here." type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label>Option 1</label>
                                                            <input name="option_1_question_<?php echo $i+1;?>" placeholder="Correct answer only" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label>Option 2</label>
                                                            <input name="option_2_question_<?php echo $i+1;?>" placeholder="Incorrect answer only" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label>Option 3</label>
                                                            <input name="option_3_question_<?php echo $i+1;?>" placeholder="Incorrect answer only" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label>Option 4</label>
                                                            <input name="option_4_question_<?php echo $i+1;?>" placeholder="Incorrect answer only" type="text" required>
                                                        </div>
                                                    </div>
                                                    <hr>
                                        <?php
                                            }
                                        }else{
                                            $_SESSION['educat_error_message'] = "Quiz information not found.";
                                            header("Location: quiz-add-information?course=" . $course);
                                        }
                                    }
                                ?>
                                
                                <div class="col-lg-12">
                                    <input type="submit" class="btn btn-submit me-2" value="Submit">
                                    <a href="brandlist.html" class="btn btn-cancel">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card" <?php echo ($auto_fill == FALSE)? "style='display:none;'": ""?>>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <?php 
                                    $sqlForInfo = "SELECT * FROM quiz_master WHERE quiz_for_course = $course AND quiz_id = $quiz";
                                    $resForInfo = mysqli_query($conn, $sqlForInfo);
                                    if($resForInfo){
                                        if(mysqli_num_rows($resForInfo) > 0){
                                            $rowForInfo = mysqli_fetch_assoc($resForInfo);
                                            for($i=0; $i < $rowForInfo["quiz_total_questions"]; $i++){
                                            ?>
                                                    <div class="col-lg-12 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;">Question <?php echo $i+1;?></label>
                                                            <input value="What year did the United States declare independence from Great Britain?" name="question_<?php echo $i+1;?>" placeholder="Type question <?php echo $i+1;?> here." type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label>Option 1</label>
                                                            <input value="1776" name="option_1_question_<?php echo $i+1;?>" placeholder="Correct answer only" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label>Option 2</label>
                                                            <input value="1789" name="option_2_question_<?php echo $i+1;?>" placeholder="Incorrect answer only" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label>Option 3</label>
                                                            <input value="1801" name="option_3_question_<?php echo $i+1;?>" placeholder="Incorrect answer only" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label>Option 4</label>
                                                            <input value="1812" name="option_4_question_<?php echo $i+1;?>" placeholder="Incorrect answer only" type="text" required>
                                                        </div>
                                                    </div>
                                                    <hr>
                                        <?php
                                            }
                                        }else{
                                            $_SESSION['educat_error_message'] = "Quiz information not found.";
                                            header("Location: quiz-add-information?course=" . $course);
                                        }
                                    }
                                ?>
                                
                                <div class="col-lg-12">
                                    <input type="submit" class="btn btn-submit me-2" value="Submit">
                                    <a href="brandlist.html" class="btn btn-cancel">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>
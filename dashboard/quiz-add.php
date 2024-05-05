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
                        <!-- <h6>Create new Brand</h6> -->
                    </div>
                </div>

                <div class="card">
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
                                                            <input placeholder="Type question <?php echo $i+1;?> here." type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label>Option 1</label>
                                                            <input placeholder="Correct answer only" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label>Option 2</label>
                                                            <input placeholder="Incorrect answer only" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label>Option 3</label>
                                                            <input placeholder="Incorrect answer only" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label>Option 4</label>
                                                            <input placeholder="Incorrect answer only" type="text">
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
                                    <a href="quiz-add.php" class="btn btn-submit me-2">Submit</a>
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
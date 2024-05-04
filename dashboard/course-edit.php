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
    $id = $_GET['courseId'];

    $sql = "SELECT * FROM `course_master` WHERE `course_id` = $id";
    $result = mysqli_query($conn, $sql);
    $rowdata = mysqli_fetch_assoc($result);

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
    <title>Edit Course</title>

    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/EduCat (4)_rm.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

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


        <!-- Sidebar START -->
        <?php
            include("sidebar.php");
        ?>
        <!-- Sidebar END -->


        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Edit Course</h4>
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
                    </div>
                </div>
                <form action="course-edit-script.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="courseId" value="<?php echo $_GET['courseId']; ?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="course_title" value="<?php echo $rowdata['course_name']?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Course Language</label>
                                        <select class="select" name="course_langauge" required>
                                            <option value="0" disabled selected>--SELECT--</option>
                                            <?php
                                                $selectQuery = "SELECT * FROM `languages_master`";
                                                $result = mysqli_query($conn, $selectQuery);
                                                // Check if there are results
                                                if ($result) {
                                                    // Iterate through the results and print options
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                        <option value="<?php echo $row["language_id"]?>" <?php if($row["language_id"] == $rowdata['course_language']){echo "selected"; } ?>><?php echo $row['language_name'];?></option>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "Error fetching values from the database: " . mysqli_error($conn);
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input name="course_price" min="0" value="<?php echo $rowdata['course_price']?>"max="10000000" type="number" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Discount</label>
                                        <input value="<?php echo $rowdata['course_discount']; ?>" type="number" name="course_discount" min="0" max="100" class="form-control"  pattern="[0-9]+" title="Please enter a number between 0 and 100" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Course Category</label>
                                        <select class="select" name="course_category" required>
                                        <!-- <option value="0" disabled selected>--SELECT--</option> -->
                                            <?php
                                                $selectQuery = "SELECT * FROM `course_category_master`";
                                                $result = mysqli_query($conn, $selectQuery);
                                                // Check if there are results
                                                if ($result) {
                                                    // Iterate through the results and print options
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                        <option value="<?php echo $row["course_category_id"];?>" <?php if($rowdata['course_category'] == $row['course_category_id']){ echo "selected"; }?>><?php echo $row['course_category_name'];?></option>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "Error fetching values from the database: " . mysqli_error($conn);
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea rows="4" cols="50" placeholder="Enter course description" name="course_description" class="form-control" required ><?php echo $rowdata['course_description'];?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Featured Image</label>
                                        <input name="upload_course_photo" type="file" class="form-control" accept="image/*">
                                        <a style="color: orange;">Note: Leave as it is for using old image.</a>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Demo Lecture</label>
                                        <input name="upload_course_demo_video" type="file" class="form-control" accept="video/*">
                                        <a style="color: orange;">Note: Leave as it is for using old video lecture.</a>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input value="Submit" name="submit" type="submit" class="btn btn-submit me-2">
                                    <!-- <input value="Create Course" name="submit" type="submit" class="btn btn-submit me-2"> -->
                                    <a href="course-list.php" class="btn btn-cancel">Go Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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

    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>
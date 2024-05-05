<?php
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
    $chapter = $_GET["chapter"];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["course"])) {
        // Get chapter name from the form
        $courseChapterName = mysqli_real_escape_string($conn, $_POST['course_chapter_name']);
        $course_chapter_description = mysqli_real_escape_string($conn, $_POST['course_chapter_description']);

        // Get course ID from the URL
        $course = mysqli_real_escape_string($conn, $_GET['course']);

        // Insert into course_chapter_list table
        $insertChapterQuery = "UPDATE `course_chapter_list` SET `course_chapter_name`= '$courseChapterName', `course_chapter_description`='$course_chapter_description' WHERE `course_chapter_id` = $chapter AND `course_id` = $course";
        $insertChapterResult = mysqli_query($conn, $insertChapterQuery);

        if ($insertChapterResult) {
            $page_url = "course-chapter-list.php?course=".  $_GET['course'];
            $_SESSION["educat_success_message"] = "Chapter Updated.";
            header("Location: $page_url");
            exit();
        } else {
            // Handle chapter insertion failure
            $_SESSION["educat_error_message"] = "Error inserting chapter.";
            $page_url = "course-chapter-list.php?course=".  $_GET['course'];
            header("Location: $page_url");
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
    <title>Edit Chapter</title>

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
        
        <?php
        $selectQuery = "SELECT * FROM `course_chapter_list` WHERE `course_id` = $course AND course_chapter_id = $chapter";
        $result = mysqli_query($conn, $selectQuery);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Edit Chapter</h4>
                    </div>
                </div>
                <form method="post" action="">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Chapter Name</label>
                                        <input type="text" name="course_chapter_name" value="<?php echo $row["course_chapter_name"];?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="course_chapter_description" id="" cols="30" rows="10" required><?php echo $row["course_chapter_description"];?></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <!-- <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>1 -->
                                    <input value="Submit" name="submit" type="submit" class="btn btn-submit me-2">
                                    <a href="course-chapter-list.php?course=<?php echo $_GET['course']?>" class="btn btn-cancel">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Model -->

                <div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Chapter</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Chapter Name</label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <a class="btn btn-submit me-2">Submit</a>
                                        <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                                    </div>
                                </div>
                            </div>
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

        <script src="assets/js/moment.min.js"></script>
        <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

        <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
        <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

        <script src="assets/js/script.js"></script>
</body>

</html>
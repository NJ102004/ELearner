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
    <title>All Course</title>

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
<style>
    .br {
        border-radius: 15px;
        overflow: hidden;
    }

    .crsimg {
        border-radius: 50%;
        height: 30px !important;
        width: 30px !important;
    }

    .crscon {
        color: black;
        display: flex;
        align-items: center;
    }

    .aed {
        display: flex;
        justify-content: center;
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px dashed gray;
    }
</style>

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
                        <h4>Courses</h4>
                        <h6>Manage all course</h6>
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
                    <div class="page-btn">
                        <a href="course-add.php" class="btn btn-added">
                            <img src="assets/img/icons/plus.svg" alt="img">Add New Course
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <?php
                                $sqlQuery = ($user_role === "1")? "SELECT cm.course_id, cm.course_name, cm.course_image, cm.course_description, cm.course_instructor, um.user_name, um.user_profile_photo
                                FROM course_master cm
                                JOIN user_master um ON cm.course_instructor = um.user_id" : "SELECT cm.course_id, cm.course_name, cm.course_image, cm.course_description, cm.course_instructor, um.user_name, um.user_profile_photo
             FROM course_master cm
             JOIN user_master um ON cm.course_instructor = um.user_id
             WHERE um.user_id = $user_id";

                                $result = mysqli_query($conn, $sqlQuery);
                                if ($result) {
                                    // Iterate through the results and print options
                                    if($result->num_rows > 0){
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>  
                                            <div class="col-12 col-md-6 col-lg-4 d-flex">
                                                <div class="card flex-fill bg-white br">
                                                    <a href="#">
                                                        <img alt="assets/img/notfound.png" src="../<?php echo $row["course_image"];?>" class="card-img-top">
                                                    </a>
                                                    <a href="#">
                                                        <div class="card-body" style="display: flex; flex-direction: column; justify-content: space-between;">
                                                            <h6><?php echo $row["course_name"];?></h6>
                                                            <p class="card-text" style="color: black; "><?php echo substr($row["course_description"], 0, 160);?></p>
                                                            <div class="crscon" style="margin-bottom: 9px; margin-top: -13px;">
                                                                <img src="../<?php echo $row["user_profile_photo"];?>" alt="" class="crsimg">
                                                                <b>&nbsp; <?php echo $row["user_name"];?></b>
                                                            </div>
                                                            <div class="aed">
                                                                
                                                                <a href="course-chapter-list.php?course=<?php echo $row["course_id"];?>" class="card-link">
                                                                    <img src="assets/img/icons/plus.svg" alt="img">
                                                                </a>
                                                                <a href="course-edit.php?courseId=<?php echo $row["course_id"];?>" class="card-link">
                                                                    <img src="assets/img/icons/edit.svg" alt="img">
                                                                </a>
                                                                <a href="confirmation.php?course=<?php echo $row["course_id"];?>" class="card-link">
                                                                    <img src="assets/img/icons/delete.svg" alt="img">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                }else{?>
                                    <div class="page-btn">
                                        You have not created any courses yet!
                                        <a href="course-add.php" class="btn btn-added" style="color: white; background-color: #1B2850;">
                                            Add New Course
                                        </a>
                                    </div><?php
                                }
                                } else {
                                    echo "Error fetching values from the database: " . mysqli_error($conn);
                                }
                            ?>
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

    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>
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
        if($user_role == 2){
            header("Location: course-list.php");
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
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Dashboard</title>

    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/EduCat (4)_rm.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="./assets/css/style.css">

</head>
<style>
    .tac{
        text-align: center;
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
                <a href="aindex.php" class="logo-small">
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
           

            <!-- <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="aprofile.php">My Profile</a>
                    <a class="dropdown-item" href="generalsettings.php">Settings</a>
                    <a class="dropdown-item" href="#">Logout</a>
                </div>
            </div> -->

        </div>

        <!-- Sidebar START -->
        <?php
            include("sidebar.php");
        ?>
        <!-- Sidebar END -->
        
        <div class="page-wrapper">
            <div class="content">
                <?php
                    if ($user_role == 1) {
                ?>                
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="dash-widget">
                            <div class="dash-widgetimg">
                                <span><img src="assets/img/icons/users1.svg" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <?php
                                    $sql = "SELECT COUNT(*) AS total_students FROM user_master WHERE role = 3";
                                    $result = mysqli_query($conn, $sql);
                                    $row = match ($result) {
                                        $result, => mysqli_fetch_assoc($result),
                                        default => 0
                                    }
                                ?>
                                <h5><span class="counters" data-count="<?php echo $row['total_students'];?>"><?php echo $row['total_students'];?></span></h5>
                                <h6>Students</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="dash-widget dash1">
                            <div class="dash-widgetimg">
                                <span><img src="assets/img/icons/play1.svg" alt="img"></span>
                            </div>
                                <?php
                                    $sql = "SELECT COUNT(*) AS total_course FROM course_master";
                                    $result = mysqli_query($conn, $sql);
                                    $row = match ($result) {
                                        $result, => mysqli_fetch_assoc($result),
                                        default => 0
                                    }
                                ?>
                            <div class="dash-widgetcontent">
                                <h5><span class="counters" data-count="<?php echo $row['total_course'];?>"><?php echo $row['total_course'];?></span></h5>
                                <h6>Courses</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="dash-widget dash2">
                            <div class="dash-widgetimg">
                                <span><img src="assets/img/icons/users1.svg" alt="img"></span>
                            </div>
                                <?php
                                    $sql = "SELECT COUNT(*) AS total_instructor FROM user_master WHERE role = 2";
                                    $result = mysqli_query($conn, $sql);
                                    $row = match ($result) {
                                        $result, => mysqli_fetch_assoc($result),
                                        default => 0
                                    }
                                ?>
                            <div class="dash-widgetcontent">
                                <h5><span class="counters" data-count="<?php echo $row['total_instructor'];?>"><?php echo $row['total_instructor'];?></span></h5>
                                <h6>Instructors</h6>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">Student's Completed course's count</h4>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"
                                        class="dropset">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a href="astudentlist.php" class="dropdown-item">Student List</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive dataview">
                                    <table class="table datatable ">
                                        <thead class="tac">
                                            <tr>
                                                <th>Sno</th>
                                                <th style="text-align: left;">Students</th>
                                                <th>Cource</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tac">
                                            <tr>
                                                <td>1</td>
                                                <td class="productimgname">
                                                    <a href="astudentlist.php">Priyanshu Pithadiya</a>
                                                </td>
                                                <td>5</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td class="productimgname">
                                                    <a href="astudentlist.php">Samarth Jayswal</a>
                                                </td>
                                                <td>6</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td class="productimgname">
                                                    <a href="astudentlist.php">Vansh mistry</a>
                                                </td>
                                                <td>8</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td class="productimgname">
                                                    <a href="astudentlist.php">Aryan patel</a>
                                                </td>
                                                <td>10</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td class="productimgname">
                                                    <a href="astudentlist.php">Jay Thaker</a>
                                                </td>
                                                <td>5</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td class="productimgname">
                                                    <a href="astudentlist.php">Rudra patel</a>
                                                </td>
                                                <td>9</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">Instructor's uploaded playlists's count</h4>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"
                                        class="dropset">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a href="ainstructorlist.php" class="dropdown-item">Teacher List</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive dataview">
                                    <table class="table datatable ">
                                        <thead class="tac">
                                            <tr>
                                                <th>Sno</th>
                                                <th style="text-align: left;">Instructors</th>
                                                <th>Playlists</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tac">
                                            <tr>
                                                <td>1</td>
                                                <td class="productimgname">
                                                    <a href="ainstructorlist.php">Nilesh Vaghela</a>
                                                </td>
                                                <td>20</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td class="productimgname">
                                                    <a href="ainstructorlist.php">Tejas tabiyar</a>
                                                </td>
                                                <td>5</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td class="productimgname">
                                                    <a href="ainstructorlist.php">Samir</a>
                                                </td>
                                                <td>10</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td class="productimgname">
                                                    <a href="ainstructorlist.php">Bhavna</a>
                                                </td>
                                                <td>15</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td class="productimgname">
                                                    <a href="ainstructorlist.php">Shivani</a>
                                                </td>
                                                <td>5</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td class="productimgname">
                                                    <a href="ainstructorlist.php">Aishwarya</a>
                                                </td>
                                                <td>3</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">Course Categories & Videos</h4>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"
                                        class="dropset">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a href="videoslist.php" class="dropdown-item">Course List</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive dataview">
                                    <table class="table datatable ">
                                        <thead>
                                            <tr>
                                                <th>Sno</th>
                                                <th>Categories</th>
                                                <th>Total Instructors</th>
                                                <th>Total Courses</th>
                                            </tr>
                                        </thead=>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Html - Css</td>
                                                <td>10</td>
                                                <td>200</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Python</td>
                                                <td>20</td>
                                                <td>300</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>C Programming</td>
                                                <td>15</td>
                                                <td>250</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Java Programming</td>
                                                <td>5</td>
                                                <td>20</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>
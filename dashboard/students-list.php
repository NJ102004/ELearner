<?php
    require '../includes/scripts/connection.php';  
    session_start();
    if(isset($_SESSION['educat_logedin_user_id']) && (trim ($_SESSION['educat_logedin_user_id']) !== '')){
        $user_id = $_SESSION['educat_logedin_user_id'];
        $query = "SELECT * FROM user_master WHERE user_id = $user_id";
        $result = mysqli_query($conn, $query);
        $userdata = mysqli_fetch_assoc($result);
        $user_role = $userdata["role"];
        if($user_role != 1){
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
    <title>Students</title>

    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/EduCat (4)_rm.png">

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

    <!-- Sidebar START -->
        <?php
            include("sidebar.php");
        ?>
    <!-- Sidebar END -->

<!-- <div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
        <ul>
            <li>
                <a href="index.php"><img src="assets/img/icons/dashboard.svg" alt="img"><span>Dashboard</span> </a>
            </li>
            <li>
                <a href="astudentlist.php" class="active"><img src="assets/img/icons/users1.svg" alt="img"><span>Students</span></a>
               
            </li>
            <li>
                <a href="ainstructorlist.php"><img src="assets/img/icons/user2.svg" alt="img"><span>Instructor</span></a>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"><img src="assets/img/icons/purchase1.svg" alt="img"><span>Cources</span><span class="menu-arrow"></span></a>
                <ul>
                    <li><a href="videoslist.php">All Courses</a></li>
                    <li><a href="aaddvideos.php">Add Course</a></li>
                    <li><a href="avideorating.php">Rated Course</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"><img src="assets/img/icons/time.svg" alt="img"><span>
                        Report</span> <span class="menu-arrow"></span></a>
                <ul>
                    <li><a href="acoursereport.php">Course report</a></li>
                </ul>
            </li>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"><img src="assets/img/icons/settings.svg" alt="img"><span>
                        Settings</span> <span class="menu-arrow"></span></a>
                <ul>
                    <li><a href="aprofile.php">Profile</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
</div> -->
        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Student List</h4>
                        <h6>Manage Students</h6>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-input">
                                    <a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg"
                                            alt="img"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-0" id="filter_inputs">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Product</option>
                                                        <option>Macbook pro</option>
                                                        <option>Orange</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Category</option>
                                                        <option>Computers</option>
                                                        <option>Fruits</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Choose Sub Category</option>
                                                        <option>Computer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Brand</option>
                                                        <option>N/D</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg col-sm-6 col-12 ">
                                                <div class="form-group">
                                                    <select class="select">
                                                        <option>Price</option>
                                                        <option>150.00</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-1 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <a class="btn btn-filters ms-auto"><img
                                                            src="assets/img/icons/search-whites.svg" alt="img"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table  datanew">
                                <thead>
                                    <tr>
                                        <!-- <th>
                                            <label class="checkboxs">
                                                <input type="checkbox" id="select-all">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </th> -->
                                        <th>Student Name</th>
                                        <th>Email id </th>
                                        <th>Completed course</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                          $selectQuery = "SELECT * FROM `user_master` WHERE `role` = '3' ";
                                          $result = mysqli_query($conn, $selectQuery);
                                                // Check if there are results
                                                if ($result) {
                                                    // Iterate through the results and print options
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>
                                    <tr>                
                                        <?php echo "<td>" . $row["user_name"] . "</td>"; ?>
                                        <?php echo "<td>" . $row["user_email"] . "</td>"; ?>
                                        <td>10</td>
                                        <td>
                                            <a href="deletestudent.php?id=<?php echo $row["user_id"];    ?>">
                                                <img src="assets/img/icons/delete.svg" alt="img">
                                            </a>  
                                        </td>
                                    </tr>
                                          <?php
                                                  }
                                                } 
                                                else {
                                                    echo "Error fetching values from the database: " . mysqli_error($conn);
                                                }
                                            ?>
                                </tbody>
                            </table>
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

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>
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

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $catname = $_POST["cat_name"];
        if(!empty($catname)){
        $sql = "INSERT INTO `course_category_master` (`course_category_name`, `course_category_owner`) VALUES ('$catname', $user_id)";
        $result = mysqli_query($conn,$sql);
        if($result){
            $_SESSION["educat_success_message"] = "Category added successfully.";
        }else{
            $_SESSION["educat_error_message"] = "Error: Category is not added.";
        }
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
    <title>All Categories</title>

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
                        <h4>Categories</h4>
                        <h6>Manage all Categories</h6>
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
                        <a href="add-category.php" class="btn btn-added" data-bs-toggle="modal"
                            data-bs-target="#create">
                            <img src="assets/img/icons/plus.svg" alt="img">Add New Category
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-input">
                                    <a class="btn btn-searchset">
                                        <img src="assets/img/icons/search-white.svg" alt="img">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table  datanew">
                                <thead>
                                    <tr>
                                        <th>Category name </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql1 = ($user_role == "1")? "SELECT * FROM `course_category_master`":"SELECT * FROM `course_category_master` WHERE `course_category_owner` = '$user_id'";
                                    $result1 = mysqli_query($conn , $sql1);
                                    while($row = mysqli_fetch_assoc($result1)){
?>
                                    <tr>
                                        <td><?php echo $row['course_category_name'];?></td>
                                        <td>
                                            <a class="me-3" href="edit-course-category.php?id=<?php echo $row['course_category_id']?>" class="btn btn-added" >
                                                <img src="assets/img/icons/edit.svg" alt="img">
                                            </a>
                                            <a class="me-3" href="delete_cat.php?id=<?php echo $row['course_category_id']?>">
                                                <img src="assets/img/icons/delete.svg" alt="img">
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Category</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Category Name</label>
                                                <input name="cat_name" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="submit" value="Submit" class="btn btn-submit me-2">
                                    </div>
                                </form>
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

    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>
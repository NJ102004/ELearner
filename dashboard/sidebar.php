<?php
$currentURL = $_SERVER['PHP_SELF'];
$currentPage = basename($currentURL);
?>
<div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <?php
                            if ($user_role == 1) {
                                ?>
                        <li>
                            <a href="index.php" <?php if($currentPage == "index.php" || $currentPage == "confirmation.php"){echo 'class="active"';}?> ><img src="assets/img/icons/dashboard.svg" alt="img"><span>Dashboard</span> </a>
                        </li>
                        <li>
                            <a href="students-list.php" <?php if($currentPage == "students-list.php"){echo 'class="active"';}?> ><img src="assets/img/icons/users1.svg" alt="img"><span>Students</span></a>
                        </li>
                        <li>
                            <a href="instructor-list.php" <?php if($currentPage == "instructor-list.php"){echo 'class="active"';}?> ><img src="assets/img/icons/user2.svg" alt="img"><span>Instructor</span></a>
                        </li>

                              <?php  
                            }
                        ?>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/purchase1.svg" alt="img"><span>Course</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="course-list.php" <?php if($currentPage == "course-list.php" || $currentPage == "course-chapter-list.php" || $currentPage == "course-chapter-videos-list.php" || $currentPage == "course-add-chapter.php" || $currentPage == "quiz-add-information.php" || $currentPage == "course-add-video.php" || $currentPage == "course-edit.php" || $currentPage == "quiz-add.php" || $currentPage == "course-edit-chapter.php"){echo 'class="active"';}?> >All Courses</a></li>
                                <li><a href="course-add.php" <?php if($currentPage == "course-add.php"){echo 'class="active"';}?> >Add Course</a></li>
                                <li><a href="category-list.php" <?php if($currentPage == "category-list.php"){echo 'class="active"';}?> >Category</a></li>
                                <li><a href="course-popular.php" <?php if($currentPage == "course-popular.php"){echo 'class="active"';}?> >Rated Course</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/time.svg" alt="img"><span>
                                    Report</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="course-report.php" <?php if($currentPage == "course-report.php"){echo 'class="active"';}?> >Course report</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
</div>
    <?php
        $currentURL = $_SERVER['PHP_SELF'];
        $currentPage = basename($currentURL);
        if(isset($_SESSION['educat_logedin_user_id'])){
            ?>
    <header>
        <nav class="navigation">
            <div class="logo">
                <a href="index.php"><img src="assets/img/EduCat (3).png" alt="Logo"></a>
            </div>
        <form method="GET" action="search.php">
            <div class="search-bar">
                <input type="text" placeholder="Explore Courses" name="search_term" <?php if(isset($_GET["search_term"]) && $currentPage == "search.php"){echo 'value="' . $_GET["search_term"] . '"';}?>>
                <!-- <a href="#" style="display: flex; align-items: center;"><img src="assets/img/search.svg" alt="search" height="25px" width="25px"></a> -->
            </div>
        </form>
            <button class="menu-btn">☰</button>
            <div class="sidebar">
                <div class="menu-content">
                    <?php
                    if($user_role == 3){
                    ?>
                    <a href="create-instructor.php" class="buttons">Become an Instructor</a>
                    <?php
                    }elseif ($user_role == 2) {
                    ?>
                    <a href="dashboard/course-list.php" class="buttons">Instructor Dashboard</a>
                    <?php
                    }elseif ($user_role == 1) {
                    ?>
                    <a href="dashboard/" class="buttons">Admin Dashboard</a>
                    <?php
                    }
                    ?>
                    <a href="mycourse.php" class="buttons">My Courses</a>
                    <!-- <a href="mycart.php" class="svg"><img src="./assets/img//shopping-cart.svg" alt=""></a> -->
                    <a href="myaccount.php" class="svg"><img alt="<?php echo $userdata["user_profile_photo"];?>" src="./assets/img/profile-circle.svg" alt=""></a>
                </div>
            </div>
        </nav>
    </header>
    <?php
        }else{
            ?>
    <header>
        <nav class="navigation">
            <div class="logo">
                <a href="index.php"><img src="assets/img/EduCat (3).png" alt="Logo"></a>
            </div>
            <form method="GET" action="search.php">
            <div class="search-bar">
                <input type="text" placeholder="Explore Courses" name="search_term" <?php if(isset($_GET["search_term"]) && $currentPage == "search.php"){echo 'value="' . $_GET["search_term"] . '"';}?>>
            </div>
        </form>
            <button class="menu-btn">☰</button>
            <div class="sidebar">
                <div class="menu-content">
                    <a href="sign-in.php" class="buttons">Sign In</a>
                    <a href="sign-up.php" class="buttons">Sign Up</a>

                </div>
            </div>
        </nav>
    </header>
            <?php
        }
    ?>
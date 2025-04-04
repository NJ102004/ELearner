<?php
$currentURL = $_SERVER['PHP_SELF'];
$currentPage = basename($currentURL);
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fontschr.googleapis.com/css2?family=Alegreya+Sans+SC&family=Poppins&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/EduCat (4)_rm.png">

    <?php
    if (isset($_SESSION['educat_logedin_user_id'])) {
    ?>
        <header>

            <nav class="navigation">
                <div class="logo">
                    <a href="index.php"><img src="assets/img/EduCat (3).png" alt="EduCat Logo"></a>
                </div>
                <form method="GET" action="search.php">
                    <div class="search-bar">
                        <input type="text" placeholder="Explore Courses" name="search_term"
                            <?php if (isset($_GET["search_term"]) && $currentPage == "search.php") {
                                echo 'value="' . htmlspecialchars($_GET["search_term"]) . '"';
                            } ?>>
                    </div>
                </form>
                <button class="menu-btn">☰</button>
                <div class="sidebar">
                    <div class="menu-content">
                        <?php if ($user_role == 3) { ?>
                            <a href="create-instructor.php" class="buttons">Become an Instructor</a>
                        <?php } elseif ($user_role == 2) { ?>
                            <a href="dashboard/course-list.php" class="buttons">Instructor Dashboard</a>
                        <?php } elseif ($user_role == 1) { ?>
                            <a href="dashboard/" class="buttons">Admin Dashboard</a>
                        <?php } ?>
                        <a href="mycourse.php" class="buttons">My Courses</a>
                        <a href="myaccount.php" class="svg">
                            <img src="./assets/img/profile-circle.svg" alt="Profile">
                        </a>
                    </div>
                </div>
            </nav>
        </header>

    <?php } else { ?>
        <header>
            <nav class="navigation">
                <div class="logo">
                    <a href="index.php"><img src="assets/img/EduCat (3).png" alt="EduCat Logo"></a>
                </div>
                <form method="GET" action="search.php">
                    <div class="search-bar">
                        <input type="text" placeholder="Explore Courses" name="search_term"
                            <?php if (isset($_GET["search_term"]) && $currentPage == "search.php") {
                                echo 'value="' . htmlspecialchars($_GET["search_term"]) . '"';
                            } ?>>
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
    <?php } ?>

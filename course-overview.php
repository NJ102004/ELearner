<?php
    require 'includes/scripts/connection.php';  
    require 'includes/scripts/common.php';  

    session_start();
    if(isset($_SESSION['educat_logedin_user_id']) && (trim ($_SESSION['educat_logedin_user_id']) !== '')){
        $user_id = $_SESSION['educat_logedin_user_id'];
        $query = "SELECT * FROM user_master WHERE user_id = $user_id";
        $result = mysqli_query($conn, $query);
        $userdata = mysqli_fetch_assoc($result);
        $user_role = $userdata["role"];
    }
    if(isset($_GET["id"])){
        $courseID = $_GET["id"];
        $query = "SELECT * FROM course_master WHERE course_id = $courseID";
        $res = $conn->query($query);
        if ($res->num_rows > 0) {
            $rowForData = $res->fetch_assoc();
        }
    }else{
        header("Location: 404.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $rowForData["course_name"];?> | EduCat</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/EduCat (4)_rm.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
</head>
<style>
        /* Style the checkboxes and arrows */
        input[type="checkbox"] {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        outline: none;
        border: 2px solid #666;
        border-radius: 50%;
        width: 15px;
        height: 15px;
        cursor: pointer;
    }

    input[type="checkbox"]:checked {
        background-color: #666;
    }

    .heart {
        cursor: pointer;
    }

    .heart.clicked {
        color: red;
    }

    .sidenav {
        height: 98%;
        width: 97%;
        z-index: 1;
    }

    /* Style the sidenav links and the dropdown button */
    .sidenav a,
    .dropdown-btn {
        padding: 16px 16px;
        text-decoration: none;
        font-size: 20px;
        color: rgb(94, 94, 94);
        border-radius: 9px;
        display: flex;
        border: none;
        background: rgba(206, 206, 206, 0.856);
        transition: all 0.3s ease;
        margin-bottom: 5px;
        width: 100%;
        text-align: left;
        cursor: pointer;
    }

    .dropdown-btn{
        display: flex;
        justify-content: space-between;
    }

    /* On mouse-over */
    .sidenav a:hover,
    .dropdown-btn:hover {
        color: #161616;
        background: rgba(206, 206, 206, 0.836);
    }

    /* Add an active class to the active dropdown button */
    .active {
        background: rgba(206, 206, 206, 0.74);
        color: rgb(0, 0, 0);
    }

    /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
    .dropdown-container {
        display: none;
        width: 97%;
    }

    .dropdown-container a {
        background-color: rgba(128, 128, 128, 0.712);
        color: rgb(255, 255, 255);
        transition: all 0.5s ease;
        padding: 11px 16px;
    }

    .dropdown-container a:hover {
        background-color: rgb(128, 128, 128);
        color: white;
    }

    /* Some media queries for responsiveness */
    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }

    .submleft {
        width: 5%;
        float: left;
    }

    .submright {
        width: 95%;
        float: right;
    }

    .anothervideos{
        display: flex;
        justify-content: center;
    }
</style>
<body>
    <?php
        include("includes/components/header.php");
    ?>
    <div class="overviewmain1">
        <div class="overviewcon1">
            <div class="leftover">  
                <h3><?php
                    $categoryID = $rowForData["course_category"];
                    $queryCat = "SELECT course_category_name FROM course_category_master WHERE course_category_id = $categoryID"; 
                    $resCat = $conn->query($queryCat);
                    if ($resCat->num_rows > 0) {
                        $rowForCat = $resCat->fetch_assoc();
                    }
                    echo "Category:- " . $rowForCat["course_category_name"];
                ?></h3>
                <h1 style="font-weight: bold;"><?php echo $rowForData["course_name"];?></h1>
                <h3><?php echo implode(' ', array_slice(str_word_count($rowForData["course_description"], 1), 0, 20)); ?>...</h3>
                <div class="extrabuttons">
                    <?php
                        if ($rowForData["course_purchases"] >= 1000) {
                            ?>
                            <div class="bestseller"><p>Best Seller</p></div>
                            <?php
                        }
                    ?>

                    <?php

                    // Function to calculate weighted average
                    function calculateWeightedAverage($ratings) {
                        $totalWeight = 0;
                        $weightedSum = 0;

                        foreach ($ratings as $key => $value) {
                            $weight = $key + 1; // Weight is the star rating itself (1 for 1 star, 2 for 2 stars, etc.)
                            $totalWeight += $weight;
                            $weightedSum += $weight * $value;
                        }

                        if ($totalWeight == 0) {
                            return 0; // Return 0 if there are no ratings
                        }

                        return $weightedSum / $totalWeight;
                    }

                    // Query to fetch ratings and number of people for each star rating
                    $sql = "SELECT * FROM course_rating WHERE course = $courseID";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $totalRatings = mysqli_fetch_assoc($result);
                        
                        // Calculate weighted average
                        $ratings = array(
                            $totalRatings['rating_1'],
                            $totalRatings['rating_2'],
                            $totalRatings['rating_3'],
                            $totalRatings['rating_4'],
                            $totalRatings['rating_5']
                        );

                        $courseRating = calculateWeightedAverage($ratings);

                        $totalRating =  number_format($courseRating, 2);

                        if (($totalRating > 0) && ($totalRating < 5)) {
                            $totalRating = 1;
                            $parts = explode('.', strval($totalRating));
                            $totalStars = $parts[0];
                        }

                    } 
                    else{
                        $totalRating = 0;
                        $totalStars = 0;
                    }
                    ?>

                    <h3 style="font-size: 1.6rem; color: rgb(255, 187, 0);"><?php echo ($totalRating > 0)? ($totalRating > 5)? "5.0": $totalRating : "";?> <span style="color: rgb(255, 187, 0); font-size: 1.7rem;">
                        <?php
                            if( $totalRating == 0){
                                echo "No rating yet!";
                            }
                            else{
                                if($totalRating > 5){
                                    $totalStars = 5;
                                }
                                for ($i=0; $i <  $totalStars; $i++) { 
                                    echo "&starf;";
                                }
                            }
                        ?>
                </span></h3>
                    <!-- <p><?php echo $rowForData["course_purchases"];?> students purchased this course</p> -->
                </div>
                <h4>Created by <?php
                    $instructorID = $rowForData["course_instructor"];
                    $queryINST = "SELECT user_id, user_name FROM user_master WHERE user_id = $instructorID"; 
                    $resINST = $conn->query($queryINST);
                    if ($resINST->num_rows > 0) {
                        $rowForINST = $resINST->fetch_assoc();
                    }
                    echo $rowForINST["user_name"];
                ?>
                </h4>
                <?php 
                    $langaugeID = $rowForData["course_language"];
                    $queryForLANG = "SELECT language_name FROM languages_master WHERE language_id = $langaugeID";
                    $resForLANG = mysqli_query($conn, $queryForLANG);
                    if ($resForLANG->num_rows > 0) {
                        $rowForLANG = $resForLANG->fetch_assoc();
                    }
                ?>
                <h4>&#9432; Last updated <?php echo $rowForData["course_last_updated_on"];?> &nbsp; &#x1F310; <?php echo $rowForLANG["language_name"];?></h4>
            </div>
            <div class="rightover">
                <div class="productmain">
                    <div class="productimage">
                        <img src="<?php echo $rowForData["course_image"];?>" alt="">
                    </div>
                    <div class="productcontent">
                        <div class="profirst">
                            <div class="pro" style="display: flex; gap: 10px;">
                                <h2 style="margin: 0; font-size:larger;">&#8377; <?php if ($rowForData["course_discount"] > 0) {
                                        $original_price = $rowForData["course_price"];
                                        $discount_rate = $rowForData["course_discount"];
                                }
                                echo ($rowForData["course_discount"] > 0)? $original_price - ($original_price * ($discount_rate / 100)):$rowForData["course_price"];?> only</h2><h3 style="color: gray; font-weight: normal;">
                                <?php
                                        $original_price = $rowForData["course_price"];
                                        $discount_rate = $rowForData["course_discount"];
                                    if ($rowForData["course_discount"] > 0) {
                                        ?>
                                            <s>&#8377; <?php echo $rowForData["course_price"];?></s> <?php echo $rowForData["course_discount"];?>% off</h3>
                                        <?php
                                    }
                                ?>
                            </div>
                            <?php
                                if($rowForData["course_discount"] > 0){
                                    ?>
                                        <div>
                                            <p style="color: red; font-weight: bold;">Few hours left at this price!</p>
                                        </div>
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="probuttons">
                            <div class="button1">
                                <?php 
                                    if(isset($_GET["id"]) && isset($user_id)){
                                        $check_query = "SELECT * FROM purchased_course_master WHERE course_id = $courseID AND user_id = $user_id";
                                        $check_res = mysqli_query($conn, $check_query);
                                        $check_row = $check_res->fetch_assoc();
                                        if(mysqli_num_rows($check_res) > 0){
                                            ?>
                                            <a href="play.php?id=<?php echo $_GET["id"];?>" class="buynow">Start Learning</a>
                                            <a href="myheart.php?id=<?php echo $_GET["id"];?>"style="<?php echo ($check_row["course_favorite"] != 0)? 'color: red;':"color: grey;";?>font-size: 30px; text-decoration: none;">❤</a>
                                            <?php
                                        }else{
                                            ?>
                                            <!-- <a id="rzp-button1" href="includes/scripts/purchase_course.php?id=<?php echo $_GET["id"];?>" class="buynow">Buy this course</a> -->
                                            <a id="rzp-button1" class="buynow" style="cursor:pointer;">Buy this course</a>
                                            <!-- <a href="mycart.php?id=<?php echo $_GET["id"];?>" class="atc"><img src="./assets/img/addtocart.png" alt="" style="height: 21px; width: 21px;"/></a> -->
                                            <?php
                                        }
                                    }else{
                                            ?>
                                            <a href="sign-in.php" class="buynow">Buy this course</a>
                                            <?php
                                    }
                                ?>
                            </div>
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
                            <div><p style="color: gray; text-align: center;">Full Lifetime Access</p></div>
                            <div style="display: flex; justify-content: center;"><a href="https://wa.me/?text=Hey, i found very usefull course on Educat checkout this: <?php echo urlencode($domain . "/course-overview.php?id=" . $_GET["id"])?>" style="color: black; text-align: center;"><u>Share</u></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ovreviewmain2">
        <div class="cincludes">
            <h2>This course includes:</h2>
            <div class="accesson">
                <p><img src="./assets/img/mobile.png" alt="" height="25px" width="25px">Access on all devices.</p>
                <p><img src="./assets/img/assignment.png" alt="" height="25px" width="25px">Assignments</p>
                <p><img src="./assets/img/download.png" alt="" height="25px" width="25px">Downloadable Resources</p>
                <!-- <p><img src="./assets/img/playvideo.png" alt="" height="25px" width="25px"><?php echo $rowForData["course_videos"]?> total video lectures</p> -->
                <p><img src="./assets/img/playvideo.png" alt="" height="25px" width="25px">Downloadable Videos</p>
                <p><img src="./assets/img/artical.png" alt="" height="25px" width="25px">Quizes</p>
                <p><img src="./assets/img/certificate.png" alt="" height="25px" width="25px">Certificate of completion</p>
            </div>
        </div>
        <div class="learn">
            <h2>What you'll learn</h2>
            <ul>
                <?php
                    $courseId = $_GET["id"];
                    $sql = "SELECT * FROM course_chapter_list WHERE course_id = $courseId ORDER BY course_chapter_id ASC";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row1 = $result->fetch_assoc()) {
                            ?>
                                <li><?php echo $row1["course_chapter_name"];?></li>
                <?php
                        }
                    } else {
                        echo "0 results";
                    }

                ?>
            </ul>
        </div>
        <div class="coursecontent">
            <div class="anothervideos" style="margin-top: 40px;">
                <div class="sidenav">
                    <h3>Topics:</h3>
                <?php
                $sql = "SELECT * FROM course_chapter_list WHERE course_id = $courseId ORDER BY course_chapter_id ASC";
                $result = $conn->query($sql);
                    // Display the retrieved data
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $chapterId =  $row["course_chapter_id"];
                            ?>
                    <div class="dropbox">
                    <button class="dropdown-btn"><?php echo $row["course_chapter_name"];?>
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        <?php
                        $sql2 = "SELECT * FROM videos_master WHERE video_of_chapter = $chapterId ORDER BY video_id ASC";
                        $result2 = $conn->query($sql2);
                        // Display the retrieved data
                        if ($result2->num_rows > 0) {
                            while ($rowOfVideo = $result2->fetch_assoc()) {
                                $courseVideoId = $rowOfVideo["video_id"];                               
                                ?>
                        <a>
                            <!-- <div class="submleft"></div> -->
                            <div class="submright">&nbsp&nbsp <?php echo $rowOfVideo["video_name"];?></div>
                        </a>
                        <?php
                        }
                    } else {
                        echo "0 results";
                    }

                ?>
                    </div>
                </div>

                            <?php
                        }
                    } else {
                        echo "0 results";
                    }

                ?>
                </div>
            </div>
        </div>
        <!-- <div class="requirement">
            <h2>Requirements</h2>
            <ul>
                <li>Spring Tool Suite</li>
                <li>Java Knowledge</li>
            </ul>
        </div> -->
        <div class="prodiscription">
            <h2>Description</h2>
            <p><?php echo $rowForData["course_description"];?></p>
        </div>
    </div>
    <?php 
    include("includes/components/footer.php");
    ?>

    <?php
        
        $final_price = ($discount_rate > 0)? $original_price - ($original_price * ($discount_rate / 100)):$original_price;
    ?>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
    var options = {
        "key": "rzp_test_rv4pDcdZOwyhIS", // Enter the Key ID generated from the Dashboard
        "amount": "<?php echo  $final_price * 100?>",
        "currency": "INR",
        "name": "EduCat",
        "image": "https://i.ibb.co/QK5xyg0/Edu-Cat-4.png",
        config: {
            display: {
            blocks: {
                banks: {
                name: 'All payment methods',
                instruments: [
                    {
                    method: 'upi'
                    },
                    {
                    method: 'card'
                    },
                    {
                        method: 'wallet'
                    },
                    {
                        method: 'netbanking'
                    }
                ],
                },
            },
            sequence: ["block.banks"],
            preferences: {
                show_default_blocks: true,
            },
            },
        },
        "handler": function (response) {
            window.location.href = "includes/scripts/purchase_course.php?id=<?php echo $_GET["id"];?>";
        },
        "modal": {
        "ondismiss": function () {
            if (confirm("Are you sure, you want to close the payment?")) {
            txt = "You pressed OK!";
            console.log("Checkout form closed by the user");
            } else {
            txt = "You pressed Cancel!";
            console.log("Complete the Payment")
            }
        }
        }
    };
    var rzp1 = new Razorpay(options);
    document.getElementById('rzp-button1').onclick = function (e) {
        rzp1.open();
        e.preventDefault();
    }
    </script>

    <script>
         function toggleHeartColor() {
        var heart = document.getElementById("clickable");
        heart.classList.toggle("clicked");
    }

    var dropdowns = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdowns.length; i++) {
        dropdowns[i].addEventListener("click", function () {
            // Close all open dropdowns except the clicked one
            var openDropdowns = document.querySelectorAll('.dropdown-btn.active');
            openDropdowns.forEach(function (openDropdown) {
                
            }.bind(this));

            // Toggle the clicked dropdown
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
        });
    }
    </script>
</body>
</html>
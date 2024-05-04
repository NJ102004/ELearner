<?php
    require 'includes/scripts/connection.php';  
    session_start();
    if(isset($_SESSION['educat_logedin_user_id']) && (trim ($_SESSION['educat_logedin_user_id']) !== '')){
        $user_id = $_SESSION['educat_logedin_user_id'];
        $query = "SELECT * FROM user_master WHERE user_id = $user_id";
        $result = mysqli_query($conn, $query);
        $userdata = mysqli_fetch_assoc($result);
        $user_role = $userdata["role"];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
    <title>EduCat</title>
</head>
<style>
    input[type="range"][value="100"]::-webkit-slider-thumb {
        transform: translateX(-100%);
    }

    input[type="range"] {
        -webkit-appearance: none;
        position: relative;
        overflow: hidden;
        height: 39px;
        width: 100%;
        /* border: 1px solid black; */
        border-radius: 15px;
        cursor: pointer;
        /* iOS */
        margin-right: 10px;
        z-index: 1;
    }
</style>

<body>

    <!-- Header START -->
    <?php
    include("includes/components/header.php");
    ?>
    <!-- Header END -->
    
    <!-- Banner Slider START -->
    <div class="container">
    <?php
        $sql = "SELECT * FROM course_master ORDER BY course_id DESC LIMIT 5;";
        $res = $conn->query($sql);

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
    ?>
    <div class="image">
        <div class="banner">
            <div class="lbanner">
                <h2>New Course Uploaded</h2>
                <h1><?php echo $row["course_name"]; ?></h1>
                <h4 style="color: white;"><?php echo implode(' ', array_slice(str_word_count($row["course_description"], 1), 0, 8)); ?>...</h4>
                <a href="course-overview.php?id=<?php echo $row["course_id"];?>">Enroll</a>
            </div>
            <div class="rbanner">
                <img src="assets/img/teacher.png" alt="">
            </div>
        </div>
    </div>
<?php
    }
}
?>

       
        <div class="button">
            <a onclick="nextimg(-1)" class="prev">
                <</a>
                    <a onclick="nextimg(1)" class="next">></a>
        </div>
    </div>
    <!-- Banner Slider END -->

    <!-- Course Slider START -->
    <div class="container" style="margin-bottom: 15px; height: 62vh;">
        <h1 style="color: black; margin-bottom: 15px; text-align: center; font-family: cursive;">Student are viewing
        </h1>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
                        $sqlQuery = "SELECT cm.course_id, cm.course_name, cm.course_image, cm.course_instructor, cm.course_completion_number, um.user_name
                        FROM course_master cm
                        JOIN user_master um ON cm.course_instructor LIMIT 7";

                        $result = mysqli_query($conn, $sqlQuery);
                        if ($result) {
                            // Iterate through the results and print options
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>  
                            <div class="swiper-slide">
                                <a href="course-overview.php?id=<?php echo $row["course_id"];?>">
                                    <img src="<?php echo $row["course_image"];?>" alt="" class="size"
                                        style="border-radius: 15px; width: 100%; height: 60%; margin-top: 10px">
                                    <p style="margin-bottom: -10px; font-weight: 700;"><b><?php echo $row["course_name"];?></b></p>
                                    <p style="margin-bottom: -10px; font-size: 13px; color: gray;"><?php echo $row["user_name"];?></p>
                                    <div class="range-container" style="margin-bottom: 20px;">
                                        <input type="range" value="<?php echo $row["course_completion_number"];?>" id="rangeInput" min="0" max="100" disabled>
                                    </div>
                                </a>
                            </div>
                <?php
                        }
                    } else {
                        echo "Error fetching values from the database: " . mysqli_error($conn);
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Course Slider END -->

    <!-- Course Panel with sidebar START -->
    <?php
         if(isset($_SESSION['educat_logedin_user_id'])){
            ?>
            <div class="container" style="display: flex; justify-content: space-between;">
        <div class="leftc lang">
            <h2>Category</h2>
            <!-- <a href="#" style="text-decoration: underline;">HTML</a> -->
            <?php
                $sql = "SELECT * FROM course_category_master ORDER BY RAND() LIMIT 10";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // Loop through the categories and print them
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <a href="index.php?category=<?php echo $row["course_category_id"]?>"><?php echo $row["course_category_name"]?></a>
                        <?php
                    }
                } else {
                    echo "No categories found.";
                }
            ?>
        </div>
        <div class="rightc lang">
            <?php
                if(isset($_GET["category"])){
                    $categoryID = $_GET["category"];
                    $sql = "SELECT * FROM `course_master` WHERE course_category = $categoryID ORDER BY RAND() LIMIT 9";
                }else{
                    $sql = "SELECT * FROM `course_master` ORDER BY RAND() LIMIT 9";
                }
                $result = mysqli_query($conn,$sql);
                while($data = mysqli_fetch_assoc($result)){

            ?>
            <a href="course-overview.php?id=<?php echo $data['course_id']?>" class="boxesc">
                <img src="<?php echo $data['course_image'];?>" alt="">
                <p><?php echo $data['course_name'];?></p>
            </a>
           
    <?php
        }
    ?>
        </div>
    </div>
            <?php
         }
         else{
            ?>
            <div class="topics">
        <div class="left">
            <h1 style="color: #000; font-family: cursive; margin:0;">A broad selection of courses</h1>
            <h5 style="color: gray; font: message-box; font-variant: all-petite-caps; margin:0;">Choose from over 10,000 online
                video
                courses with new additions pulished every month</h5>
        </div>
        <!-- <div class="right">
            <a class="see-all" href="allvideos.php">see all Courses</a>
        </div> -->
    </div>
    <div class="container" style="margin-bottom: 15px; height: 45vh; ">
        <div class="slide-content" style="height: 100%; width: 98%;">
            <div class="card-wrapper swiper-wrapper">
                <?php 
                    $sql2 = "SELECT * FROM `course_master` ORDER BY RAND() LIMIT 10;";
                    if($result = mysqli_query($conn,$sql2)){
                        if(mysqli_num_rows($result) > 0){
                            while($rowdata = mysqli_fetch_assoc($result)){
                                $instructor = $rowdata['course_instructor'];
                                $sql1 = "SELECT * FROM `user_master` WHERE `user_id` = $instructor";
                                if ($result1 = mysqli_query($conn,$sql1)) {
                                    if(mysqli_num_rows($result1) > 0){
                                        $rowdata1 = mysqli_fetch_assoc($result1);
                                        ?>
                                                <div class="card swiper-slide">
                                                <a href="course-overview.php?id=<?php echo $rowdata['course_id']?>">
                                                    <div class="image-content">

                                                        <div class="card-image">
                                                            <img src="<?php echo $rowdata['course_image'] ?>" alt="" class="card-img">
                                                        </div>
                                                    </div>

                                                    <div class="card-content">
                                                        <h2 class="name"><?php echo $rowdata['course_name'];?></h2>
                                                        <p class="description"><?php echo $rowdata['course_description'];?></p>
                                                    </div>
                                                    </a>
                                                </div>
                                        <?php
                                        }
                                    }
                                }
                        }else{
                            echo "<p style='color: white;'>No course found.</p>";
                        }
                    }   
                ?>
                
            </div>
        </div>
    </div>
    </div>
            <?php
         }
    ?>
    <!-- Course Panel with sidebar END -->

    <!-- Become instrucer START -->
    <?php
    if(isset($user_role) && $user_role == 3){
      ?>
    <div class="container"
        style="height: 80vh; overflow: hidden; background-color: rgb(216, 216, 216); border-radius: 25px;">
        <div class="left" style="width: 40%; height: 100%; align-items: center;">
            <img src="assets/img/teacher.png" alt="systumm">
        </div>
        <div class="right"
            style="width: 60%; height: 100%; justify-content: center; align-items: center; flex-direction: column;">
            <h1 style="color: black; font-weight: bold; font-size: 50px;">Become an Instructor</h1>
            <h4 style="color: black; font-weight: bold; text-align: center; font-size: 30px;">
                We Provide the tools <br>
                and skills to teach what you love.</h4>
            <a href="becomeins.php" class="see-all"
                style="background-color: #fca311; color: black; padding:10px 16px; border: 1px solid black;"> Start
                teaching today </a>
        </div>
    </div>
      <?php 
    }
    ?>
    <!-- Become instrucer END -->

    <!-- FAQ START -->
    <div class="container faq1">
        <div class="FAQ">
            <H2>FAQ</H2>
        </div>
        <div class="mainClass">
            <div class="contentBox">
                <div class="que">What makes EduCat different from other online learning platforms?</div>
                <div class="ans">
                    <p>EduCat distinguishes itself through its comprehensive course curation process. We carefully select and review courses to ensure high-quality content. Additionally, our advanced recommendation system tailors course suggestions based on individual user preferences, creating a personalized learning experience.
                    </p>
                </div>
            </div>
            <div class="contentBox">
                <div class="que">How are instructors vetted on EduCat?</div>
                <div class="ans">
                    <p>At EduCat, we prioritize the quality and expertise of our instructors. All potential instructors undergo a rigorous vetting process, which includes an evaluation of their credentials, teaching experience, and a sample lesson. This ensures that our users receive instruction from knowledgeable and qualified professionals.
                    </p>
                </div>
            </div>
            <div class="contentBox">
                <div class="que">What security measures are in place to protect user data and transactions?</div>
                <div class="ans">
                    <p>The security of user data and transactions is paramount at EduCat. We employ industry-standard encryption protocols to safeguard sensitive information. Our payment processing partners, such as Paytm, provide secure payment transactions, ensuring a safe and reliable platform for our users.
                    </p>
                </div>
            </div>
            <div class="contentBox">
                <div class="que">Can I access EduCat on mobile devices?</div>
                <div class="ans">
                    <p>Yes, EduCat is designed to be fully responsive, allowing seamless access on a variety of devices, including smartphones and tablets. Whether you prefer learning on your computer, tablet, or mobile phone, EduCat ensures a consistent and user-friendly experience across all platforms.
                    </p>
                </div>
            </div>
            <div class="contentBox">
                <div class="que">How does EduCat support learners with diverse needs?</div>
                <div class="ans">
                    <p>EduCat is committed to inclusivity and accessibility. Our platform provides closed captioning for video content, transcripts for lectures, and other accessibility features. Moreover, we regularly update our platform to comply with accessibility standards, ensuring an optimal learning experience for users with diverse needs.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ END -->

    <!-- Footer START -->
    <?php 
    include("includes/components/footer.php");
    ?>
    <!-- Footer END -->
    
    <script>
        const mainClass = document.getElementsByClassName('contentBox')
        for (i = 0; i < mainClass.length; i++) {
            mainClass[i].addEventListener('click', function () {
                this.classList.toggle('active')
            })
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            freeMode: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
    <script>
        const menuBtn = document.querySelector('.menu-btn');
        const sidebar = document.querySelector('.sidebar');

        menuBtn.addEventListener('click', function () {
            this.classList.toggle('active');
            if (this.classList.contains('active')) {
                document.addEventListener('click', closeSidebarOnClickOutside);
            } else {
                document.removeEventListener('click', closeSidebarOnClickOutside);
            }
        });

        function closeSidebarOnClickOutside(event) {
            if (!sidebar.contains(event.target) && !menuBtn.contains(event.target)) {
                menuBtn.classList.remove('active');
                document.removeEventListener('click', closeSidebarOnClickOutside);
            }
        }

        var imageno = 1;
        displayimg(imageno);

        function nextimg(n) {
            displayimg(imageno += n)
        }

        function currentSlide(n) {
            displayimg(imageno = n)
        }

        function displayimg(n) {
            var i;
            var image = document.getElementsByClassName("image");
            var dots = document.getElementsByClassName("dot");

            if (n > image.length) {
                imageno = 1;
            }

            if (n < 1) {
                imageno = image.length;
            }

            for (i = 0; i < image.length; i++) {
                image[i].style.display = "none";
            }

            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }

            image[imageno - 1].style.display = "block";
            dots[imageno - 1].className += " active";
        }
    </script>
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
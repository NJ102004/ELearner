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
        /* transform: translateX(-100%); */
    }

    input[type="range"] {
        -webkit-appearance: none;
        position: relative;
        overflow: hidden;
        height: 39px;
        width: 100%;
        border: 1px solid black;
        border-radius: 15px;
        cursor: pointer;
        /* iOS */
        margin-right: 10px;
        z-index: 1;
    }

    .rightc a{
        text-decoration: none;
    }
    
</style>

<body>
    <header>
        <nav class="navigation">
            <div class="logo">
                <a href="index.php"><img src="assets/img/EduCat (3).png" alt="Logo"></a>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search...">
            </div>
            <button class="menu-btn">☰</button>
            <div class="sidebar">
                <div class="menu-content">
                    <a href="becomeins.php" class="buttons">Become an instructor</a>
                    <a href="allvideos.php" class="buttons">Course</a>
                    <a href="favouritecourse.php" class="svg"><img src="./assets/img//iconmonstr-heart-thin.svg" alt=""></a>
                    <a href="#" class="svg"><img src="./assets/img//shopping-cart.svg" alt=""></a>
                    <a href="profilestu.php" class="svg"><img src="./assets/img/profile-circle.svg" alt=""></a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Banner Slider start -->
    <div class="container">
        <div class="image">
            <div class="banner">
                <div class="lbanner">
                    <h2>New course Uploaded</h2>
                    <h1>For Python</h1>
                    <h4 style="color: white;">From Saumya sir he teaches very well and he is a very minded person</h4>
                    <a href="videoplayer.php">Watch course</a>
                </div>
                <div class="rbanner">
                    <img src="assets/img/teacher.png" alt="">
                </div>
            </div>
        </div>
        <div class="image">
            <div class="banner">
                <div class="lbanner">
                    <h2>New course Uploaded</h2>
                    <h1>For React JS</h1>
                    <h4 style="color: white;">todfg Saumya sir he teaches very well and he is a very minded person</h4>
                    <a href="videoplayer.php">Watch course</a>
                </div>
                <div class="rbanner">
                    <img src="assets/img/teacher.png" alt="">
                </div>
            </div>
        </div>
        <div class="image">
            <div class="banner">
                <div class="lbanner">
                    <h2>New course Uploaded</h2>
                    <h1>For C Programming</h1>
                    <h4 style="color: white;">todfg Saumya sir he teaches very well and he is a very minded person</h4>
                    <a href="videoplayer.php">Watch course</a>
                </div>
                <div class="rbanner">
                    <img src="assets/img/teacher.png" alt="">
                </div>
            </div>
        </div>
        <div class="image">
            <div class="banner">
                <div class="lbanner">
                    <h2>New course Uploaded</h2>
                    <h1>For C++</h1>
                    <h4 style="color: white;">todfg Saumya sir he teaches very well and he is a very minded person</h4>
                    <a href="videoplayer.php">Watch course</a>
                </div>
                <div class="rbanner">
                    <img src="assets/img/teacher.png" alt="">
                </div>
            </div>
        </div>
        <div class="image">
            <div class="banner">
                <div class="lbanner">
                    <h2>New course Uploaded</h2>
                    <h1>For Java Programming</h1>
                    <h4 style="color: white;">Frodasadadm Saumya sir he teaches very well and he is a very minded person
                    </h4>
                    <a href="videoplayer.php">Watch course</a>
                </div>
                <div class="rbanner">
                    <img src="assets/img/teacher.png" alt="">
                </div>
            </div>
        </div>
        <div class="button">
            <a onclick="nextimg(-1)" class="prev">
                <</a>
                    <a onclick="nextimg(1)" class="next">></a>
        </div>
    </div>
    <!-- Banner Slider Ends -->

    <!-- Card Slider Start -->
    <div class="container" style="margin-bottom: 15px; height: 60vh;">
        <h1 style="color: black; margin-bottom: 15px; text-align: center; font-family: cursive;">Student are viewing
        </h1>
        <div class="swiper mySwiper" style="margin-top: -17px;">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="videoplayer.php">
                        <img src="assets/img/r1.jpeg" alt="" class="size"
                            style="border-radius: 15px; width: 100%; height: 60%; margin-top: 10px">
                        <p style="margin-bottom: -10px; font-weight: 700;"><b>React Native</b></p>
                        <p style="margin-bottom: -10px; font-size: 13px; color: gray;">TG developer</p>
                        <div class="range-container" style="margin-bottom: 20px;">
                            <input type="range" value="50" id="rangeInput" min="0" max="100" disabled>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="videoplayer.php">
                        <img src="assets/img/j7.jpeg" alt="" class="size"
                            style="border-radius: 15px; width: 100%; height: 60%; margin-top: 10px">
                        <p style="margin-bottom: -10px; font-weight: 700;"><b>Learn coding</b></p>
                        <p style="margin-bottom: -10px; font-size: 13px; color: gray;">Total learner</p>
                        <div class="range-container" style="margin-bottom: 20px;">
                            <input type="range" value="10" id="rangeInput" min="0" max="100" disabled>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="videoplayer.php">
                        <img src="assets/img/r3.png" alt="" class="size"
                            style="border-radius: 15px; width: 100%; height: 60%; margin-top: 10px">
                        <p style="margin-bottom: -10px; font-weight: 700;"><b>Basics of java</b></p>
                        <p style="margin-bottom: -10px; font-size: 13px; color: gray;">code with samarth</p>
                        <div class="range-container" style="margin-bottom: 20px;">
                            <input type="range" value="20" id="rangeInput" min="0" max="100" disabled>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="videoplayer.php">
                        <img src="assets/img/EduCat (5).png" alt="" class="size"
                            style="border-radius: 15px; width: 100%; height: 60%; margin-top: 10px">
                        <p style="margin-bottom: -10px; font-weight: 700;"><b>Expertize in coding</b></p>
                        <p style="margin-bottom: -10px; font-size: 13px; color: gray;">Coursera</p>
                        <div class="range-container" style="margin-bottom: 20px;">
                            <input type="range" value="40" id="rangeInput" min="0" max="100" disabled>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="videoplayer.php">
                        <img src="assets/img/EduCat (6).png" alt="" class="size"
                            style="border-radius: 15px; width: 100%; height: 60%; margin-top: 10px">
                        <p style="margin-bottom: -10px; font-weight: 700;"><b>Learn coding</b></p>
                        <p style="margin-bottom: -10px; font-size: 13px; color: gray;">Total learner</p>
                        <div class="range-container" style="margin-bottom: 20px;">
                            <input type="range" value="90" id="rangeInput" min="0" max="100" disabled>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="videoplayer.php">
                        <img src="assets/img/EduCat (4).png" alt="" class="size"
                            style="border-radius: 15px; width: 100%; height: 60%; margin-top: 10px">
                        <p style="margin-bottom: -10px; font-weight: 700;"><b>Basics of react</b></p>
                        <p style="margin-bottom: -10px; font-size: 13px; color: gray;">code with Rudra</p>
                        <div class="range-container" style="margin-bottom: 20px;">
                            <input type="range" value="70" id="rangeInput" min="0" max="100" disabled>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="videoplayer.php">
                        <img src="assets/img/EduCat (2).png" alt="" class="size"
                            style="border-radius: 15px; width: 100%; height: 60%; margin-top: 10px">
                        <p style="margin-bottom: -10px; font-weight: 700;"><b>Basics of java</b></p>
                        <p style="margin-bottom: -10px; font-size: 13px; color: gray;">code with harry</p>
                        <div class="range-container" style="margin-bottom: 20px;">
                            <input type="range" value="20" id="rangeInput" min="0" max="100" disabled>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="videoplayer.php"> 
                        <img src="assets/img/EduCat (6).png" alt="" class="size"
                            style="border-radius: 15px; width: 100%; height: 60%; margin-top: 10px">
                        <p style="margin-bottom: -10px; font-weight: 700;"><b>Learn coding</b></p>
                        <p style="margin-bottom: -10px; font-size: 13px; color: gray;">Total learner</p>
                        <div class="range-container" style="margin-bottom: 20px;">
                            <input type="range" value="30" id="rangeInput" min="0" max="100" disabled>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="display: flex; justify-content: space-between;">
        <div class="leftc lang">
            <h2>Course Name</h2>
            <a href="#" style="text-decoration: underline;">JAVA</a>
            <a href="#">Excel</a>
            <a href="#">Web Development</a>
            <a href="#">JavaScript</a>
            <a href="#">Data Science</a>
            <a href="#">Amazon AWS</a>
            <a href="#">Drawing</a>
            <a href="#">Php</a>
            <a href="#">Python</a>
        </div>
        <div class="rightc lang">
            <a href="videoplayer.php" class="boxesc">
                <img src="./assets/img/j1.png" alt="">
                <p>Full cource of Java programing with performing all programs</p>
            </a>
            <a href="videoplayer.php" class="boxesc">
                <img src="./assets/img/r2.png" alt="">
                <p>Basics of react with performing all programs</p>
            </a>
            <a href="videoplayer.php" class="boxesc">
                <img src="./assets/img/j3.jpeg" alt="">
                <p>Much knowledge of Java programing with performing all programs</p>
            </a>
            <a href="videoplayer.php" class="boxesc">
                <img src="./assets/img/r3.png" alt="">
                <p>Much knowledge of React.js with performing all programs</p>
            </a>
            <a href="videoplayer.php" class="boxesc">
                <img src="./assets/img/j4.jpeg" alt="">
                <p>Full cource of Java programing with performing all programs</p>
            </a>
            <a href="videoplayer.php" class="boxesc">
                <img src="./assets/img/r1.jpeg" alt="">
                <p>Basics of react with performing all programs</p>
            </a>
            <a href="videoplayer.php" class="boxesc">
                <img src="./assets/img/j1.png" alt="">
                <p>Much knowledge of Java programing with performing all programs</p>
            </a>
            <a href="videoplayer.php" class="boxesc">
                <img src="./assets/img/j6.jpeg" alt="">
                <p>Much knowledge of React.js with performing all programs</p>
            </a>
            <a href="videoplayer.php" class="boxesc">
                <img src="./assets/img/j2.png" alt="">
                <p>Full cource of Java programing with performing all programs</p>
            </a>
        </div>
    </div>
    <div class="topics">
        <div class="left">
            <h1 style="color: #000; font-family: cursive; margin-bottom: 0;">Popular for you</h1>
            <!-- <h5 style="color: gray; font: message-box; font-variant: all-petite-caps;">Choose from over 10,000 online
                video
                courses with new additions pulished every month</h5> -->
        </div>
        <!-- <div class="right">
            <a class="see-all" href="allvideos.php">see all videos</a>
        </div> -->
    </div>
    <div class="container" style="margin-bottom: 15px; height: 45vh; ">
        <div class="slide-content" style="height: 100%; width: 98%;">
            <div class="card-wrapper swiper-wrapper">
                <div class="card swiper-slide">
                    <a href="videoplayer.php">
                        <div class="image-content s1">

                            <div class="card-image">
                                <img src="assets/img/r2.png" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Coursera</h2>
                            <p class="description">The lorem text the section that contains header with having open
                                functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
                <div class="card swiper-slide">
                    <a href="videoplayer.php">
                        <div class="image-content">

                            <div class="card-image">
                                <img src="assets/img/r1.jpeg" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Code with harry</h2>
                            <p class="description">The lorem text the section that contains header with having open
                                functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
                <div class="card swiper-slide">
                    <a href="videoplayer.php">
                        <div class="image-content">

                            <div class="card-image">
                                <img src="assets/img/r3.png" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Byjus</h2>
                            <p class="description">The lorem text the section that contains header with having open
                                functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
                <div class="card swiper-slide">
                    <a href="videoplayer.php">
                        <div class="image-content">

                            <div class="card-image">
                                <img src="assets/img/EduCat (6).png" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Coursera</h2>
                            <p class="description">The lorem text the section that contains header with having open
                                functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
                <div class="card swiper-slide">
                    <a href="videoplayer.php">p
                        <div class="image-content">
                            <div class="card-image">
                                <img src="assets/img/EduCat (2).png" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Byjus</h2>
                            <p class="description">The lorem text the section that contains header with having open
                                functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                </div>
                </a>
                <div class="card swiper-slide">
                    <a href="videoplayer.php">
                        <div class="image-content">

                            <div class="card-image">
                                <img src="assets/img/EduCat (3).png" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Code with harry</h2>
                            <p class="description">The lorem text the section that contains header with having open
                                functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- <div class="swiper-pagination"></div> -->
        </div><hr>
    </div>
    <div class="topics">
        <div class="left">
            <h1 style="color: #000; font-family: cursive; margin-bottom: 0;">Short and sweet courses for you</h1>
            <!-- <h5 style="color: gray; font: message-box; font-variant: all-petite-caps;">Choose from over 10,000 online
                video
                courses with new additions pulished every month</h5> -->
        </div>
        <!-- <div class="right">
            <a class="see-all" href="allvideos.php">see all videos</a>
        </div> -->
    </div>
    <div class="container" style="margin-bottom: 15px; height: 45vh; ">
        <div class="slide-content" style="height: 100%; width: 98%;">
            <div class="card-wrapper swiper-wrapper">
                <div class="card swiper-slide">
                    <a href="videoplayer.php">
                        <div class="image-content s1">

                            <div class="card-image">
                                <img src="assets/img/r2.png" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Coursera</h2>
                            <p class="description">The lorem text the section that contains header with having open
                                functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
                <div class="card swiper-slide">
                    <a href="videoplayer.php">
                        <div class="image-content">

                            <div class="card-image">
                                <img src="assets/img/r1.jpeg" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Code with harry</h2>
                            <p class="description">The lorem text the section that contains header with having open
                                functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
                <div class="card swiper-slide">
                    <a href="videoplayer.php">
                        <div class="image-content">

                            <div class="card-image">
                                <img src="assets/img/r3.png" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Byjus</h2>
                            <p class="description">The lorem text the section that contains header with having open
                                functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
                <div class="card swiper-slide">
                    <a href="videoplayer.php">
                        <div class="image-content">

                            <div class="card-image">
                                <img src="assets/img/EduCat (6).png" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Coursera</h2>
                            <p class="description">The lorem text the section that contains header with having open
                                functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
                <div class="card swiper-slide">
                    <a href="videoplayer.php">p
                        <div class="image-content">
                            <div class="card-image">
                                <img src="assets/img/EduCat (2).png" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Byjus</h2>
                            <p class="description">The lorem text the section that contains header with having open
                                functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                </div>
                </a>
                <div class="card swiper-slide">
                    <a href="videoplayer.php">
                        <div class="image-content">

                            <div class="card-image">
                                <img src="assets/img/EduCat (3).png" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Code with harry</h2>
                            <p class="description">The lorem text the section that contains header with having open
                                functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- <div class="swiper-pagination"></div> -->
        </div><hr>
    </div>
    <div class="topics">
        <div class="left">
            <h1 style="color: #000; font-family: cursive; margin-bottom: 0;">Students are viewing</h1>
            <!-- <h5 style="color: gray; font: message-box; font-variant: all-petite-caps;">Choose from over 10,000 online
                video
                courses with new additions pulished every month</h5> -->
        </div>
        <!-- <div class="right">
            <a class="see-all" href="allvideos.php">see all videos</a>
        </div> -->
    </div>
    <div class="container" style="margin-bottom: 15px; height: 45vh; ">
        <div class="slide-content" style="height: 100%; width: 98%;">
            <div class="card-wrapper swiper-wrapper">
                <div class="card swiper-slide">
                    <a href="videoplayer.php">
                        <div class="image-content s1">

                            <div class="card-image">
                                <img src="assets/img/r2.png" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Coursera</h2>
                            <p class="description">The lorem text the section that contains header with having open
                                functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
                <div class="card swiper-slide">
                    <a href="videoplayer.php">
                        <div class="image-content">

                            <div class="card-image">
                                <img src="assets/img/r1.jpeg" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Code with harry</h2>
                            <p class="description">The lorem text the section that contains header with having open
                                functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
                <div class="card swiper-slide">
                    <a href="videoplayer.php">
                        <div class="image-content">

                            <div class="card-image">
                                <img src="assets/img/r3.png" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Byjus</h2>
                            <p class="description">The lorem text the section that contains header with having open
                                functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
                <div class="card swiper-slide">
                    <a href="videoplayer.php">
                        <div class="image-content">

                            <div class="card-image">
                                <img src="assets/img/EduCat (6).png" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Coursera</h2>
                            <p class="description">The lorem text the section that contains header with having open
                                functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
                <div class="card swiper-slide">
                    <a href="videoplayer.php">p
                        <div class="image-content">
                            <div class="card-image">
                                <img src="assets/img/EduCat (2).png" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Byjus</h2>
                            <p class="description">The lorem text the section that contains header with having open
                                functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                </div>
                </a>
                <div class="card swiper-slide">
                    <a href="videoplayer.php">
                        <div class="image-content">

                            <div class="card-image">
                                <img src="assets/img/EduCat (3).png" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Code with harry</h2>
                            <p class="description">The lorem text the section that contains header with having open
                                functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- <div class="swiper-pagination"></div> -->
        </div>
    </div>
    <footer class="footer-distributed">

        <div class="footer-left">

            <img src="./assets/img/EduCat (3).png" alt="">

            <p class="footer-links">
                <a href="index.php" class="link-1">Home</a>

                <a href="allvideos.php">Course</a>

                <a href="contact.php">Contact</a>
            </p>

            <p class="footer-company-name">Educat © 2023</p>
        </div>

        <div class="footer-center">

            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>LJ Polytechnic</span> Sanans-chcowkdi, Ahmedabad</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+91 70961 97750</p>
            </div>

            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:support@company.com">www.educat.com</a></p>
            </div>

        </div>

        <div class="footer-right">

            <p class="footer-company-about">
                <span>About the Website</span>
                This is best learning platform for coding learners.
            </p>

        </div>

    </footer>
    <script>

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
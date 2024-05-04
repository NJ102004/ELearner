<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/EduCat (4)_rm.png">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/videop.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Dashboard</title>
</head>
<style>
    .container {
        display: flex;
        justify-content: space-between;
    }
    .vcon{
        width: 30%;
        height: 328px;
    }
    .vtop{
        height: 50%;
    }
    .videocon{
        justify-content: normal;
    }
    .star{
        font-size: 2rem;
        color: orange;
        font-weight: bold;
    }
</style>

<body>
    <header>
        <nav class="navigation">
            <div class="logo">
                <a href="index.php"><img src="assets/img/EduCat (3).png" alt="Logo"></a>
            </div>
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Search..." oninput="searchCourses()">
            </div>
            <button class="menu-btn">☰</button>
            <!-- <div class="sidebar">
                <div class="menu-content">
                    <a href="allvideos.php" class="buttons">Add Course</a>
                </div>
            </div> -->
        </nav>
    </header>
    <div class="container">
        <div class="leftside b">
            <a href="intdash.php">Course</a>
            <a href="intreport.php" style="background: #303030;">Report</a>
            <a href="intsetting.php">Setting</a>
        </div>
        <div class="rightside b">
            <div class="videocon">
                <a href="videoplayer.php" class="vcon">
                    <div class="vtop">
                        <img src="./assets/img/j1.png" alt="">
                    </div>
                    <div class="vbottom">
                        <div class="coldata">
                            <p><b>Name: </b>JAVA</p>
                            <p><b>Enrolled Student: </b>999+</p>
                            <p><b>Cource Completed Student: </b>599+</p>
                            <p><b>Feedback: </b>59+</p>
                            <p class="star">&#9733;&#9733;&#9733;&#9733;</p>
                        </div>
                    </div>
                </a>
                <a href="videoplayer.php" class="vcon">
                    <div class="vtop">
                        <img src="./assets/img/r3.png" alt="">
                    </div>
                    <div class="vbottom">
                        <div class="coldata">
                            <p><b>Name: </b>React</p>
                            <p><b>Enrolled Student: </b>999+</p>
                            <p><b>Cource Completed Student: </b>599+</p>
                            <p><b>Feedback: </b>59+</p>
                            <p class="star">&#9733;&#9733;</p>
                        </div>
                    </div>
                </a>
                <a href="videoplayer.php" class="vcon">
                    <div class="vtop">
                        <img src="./assets/img/j2.png" alt="">
                    </div>
                    <div class="vbottom">
                        <div class="coldata">
                            <p><b>Name: </b>JAVA</p>
                            <p><b>Enrolled Student: </b>999+</p>
                            <p><b>Cource Completed Student: </b>599+</p>
                            <p><b>Feedback: </b>59+</p>
                            <p class="star">&#9733;&#9733;&#9733;</p>
                        </div>
                    </div>
                </a>
                <a href="videoplayer.php" class="vcon">
                    <div class="vtop">
                        <img src="./assets/img/r1.jpeg" alt="">
                    </div>
                    <div class="vbottom">
                        <div class="coldata">
                            <p><b>Name: </b>React</p>
                            <p><b>Enrolled Student: </b>999+</p>
                            <p><b>Cource Completed Student: </b>599+</p>
                            <p><b>Feedback: </b>59+</p>
                            <p class="star">&#9733;&#9733;&#9733;&#9733;&#9733;</p>
                        </div>
                    </div>
                </a>
                <a href="videoplayer.php" class="vcon">
                    <div class="vtop">
                        <img src="./assets/img/j7.jpeg" alt="">
                    </div>
                    <div class="vbottom">
                        <div class="coldata">
                            <p><b>Name: </b>JAVA</p>
                            <p><b>Enrolled Student: </b>999+</p>
                            <p><b>Cource Completed Student: </b>599+</p>
                            <p><b>Feedback: </b>59+</p>
                            <p class="star">&#9733;&#9733;</p>
                        </div>
                    </div>
                </a>
                <div id="sorryMessage" style="color: red; margin:auto;; display: none; font-size: 2rem;">Couse not found</div>
            </div>
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
</body>
<script>
    function searchCourses() {
        var searchInput = document.getElementById('searchInput').value.toLowerCase();
        var vconElements = document.querySelectorAll('.vcon');
        var sorryMessage = document.getElementById('sorryMessage');
        var coursesFound = false;

        vconElements.forEach(function(vcon) {
            var title = vcon.querySelector('p').innerText.toLowerCase();

            if (title.includes(searchInput)) {
                vcon.style.display = 'block';
                coursesFound = true;
            } else {
                vcon.style.display = 'none';
            }
        });

        if (coursesFound) {
            sorryMessage.style.display = 'none';
        } else {
            sorryMessage.style.display = 'block';
        }
    }
</script>
</html>
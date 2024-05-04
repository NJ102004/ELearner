<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/videop.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/EduCat (4)_rm.png">
    <title>Dashboard</title>
</head>
<style>
    .container {
        display: flex;
        justify-content: space-between;
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
            <div class="sidebar">
                <div class="menu-content">
                    <a href="addcourse1.php" class="buttons">Add Course</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="leftside b">
            <a href="intdash.php" style="background: #303030;">Course</a>
            <a href="intreport.php">Report</a>
            <a href="intsetting.php">Setting</a>
        </div>
        <div class="rightside b">
            <div class="mainc">
                <a href="#" class="i s">
                    <img src="./assets/img/j1.png" alt="">
                </a>
                <a href="#" class="c s">
                    <div class="contents">
                        <h3>Advance Java</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis praesentium architecto aliquid voluptates minima error dolorem inventore ab, quaerat magnam!</p>
                        <h4>19 Chapters / 65 Videos</h4>
                    </div>
                </a>
                <div class="ud s">
                    <a href="#"><img src="./assets/img//edit-pencil.svg" alt=""></a>
                    <a href="#"><img src="./assets/img/trash-red.svg" alt=""></a>
                </div>
            </div>
            <div class="mainc">
                <a href="#" class="i s">
                    <img src="./assets/img/j2.png" alt="">
                </a>
                <a href="#" class="c s">
                    <div class="contents">
                        <h3>meet</h3>
                        <p>pys ipsum meet sit amet consectetur adipisicing elit. Veritatis praesentium architecto aliquid voluptates minima error dolorem inventore ab, quaerat magnam!</p>
                        <h4>19 Chapters / 65 Videos</h4>
                    </div>
                </a>
                <div class="ud s">
                    <a href="#"><img src="./assets/img//edit-pencil.svg" alt=""></a>
                    <a href="#"><img src="./assets/img/trash-red.svg" alt=""></a>
                </div>
            </div>
            <div class="mainc">
                <a href="#" class="i s">
                    <img src="./assets/img/j3.jpeg" alt="">
                </a>
                <a href="#" class="c s">
                    <div class="contents">
                        <h3>Advance Java</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis praesentium architecto aliquid voluptates minima error dolorem inventore ab, quaerat magnam!</p>
                        <h4>19 Chapters / 65 Videos</h4>
                    </div>
                </a>
                <div class="ud s">
                    <a href="#"><img src="./assets/img//edit-pencil.svg" alt=""></a>
                    <a href="#"><img src="./assets/img/trash-red.svg" alt=""></a>
                </div>
            </div>
            <div class="mainc">
                <a href="#" class="i s">
                    <img src="./assets/img/j4.jpeg" alt="">
                </a>
                <a href="#" class="c s">
                    <div class="contents">
                        <h3>Advance Java</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis praesentium architecto aliquid voluptates minima error dolorem inventore ab, quaerat magnam!</p>
                        <h4>19 Chapters / 65 Videos</h4>
                    </div>
                </a>
                <div class="ud s">
                    <a href="#"><img src="./assets/img//edit-pencil.svg" alt=""></a>
                    <a href="#"><img src="./assets/img/trash-red.svg" alt=""></a>
                </div>
            </div>
            <div class="mainc">
                <a href="#" class="i s">
                    <img src="./assets/img/j5.jpeg" alt="">
                </a>
                <a href="#" class="c s">
                    <div class="contents">
                        <h3>Advance Java</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis praesentium architecto aliquid voluptates minima error dolorem inventore ab, quaerat magnam!</p>
                        <h4>19 Chapters / 65 Videos</h4>
                    </div>
                </a>
                <div class="ud s">
                    <a href="#"><img src="./assets/img//edit-pencil.svg" alt=""></a>
                    <a href="#"><img src="./assets/img/trash-red.svg" alt=""></a>
                </div>
            </div>
            <div class="mainc">
                <a href="#" class="i s">
                    <img src="./assets/img/j6.jpeg" alt="">
                </a>
                <a href="#" class="c s">
                    <div class="contents">
                        <h3>Advance Java</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis praesentium architecto aliquid voluptates minima error dolorem inventore ab, quaerat magnam!</p>
                        <h4>19 Chapters / 65 Videos</h4>
                    </div>
                </a>
                <div class="ud s">
                    <a href="#"><img src="./assets/img//edit-pencil.svg" alt=""></a>
                    <a href="#"><img src="./assets/img/trash-red.svg" alt=""></a>
                </div>
            </div>
            <div class="mainc">
                <a href="#" class="i s">
                    <img src="./assets/img/j7.jpeg" alt="">
                </a>
                <a href="#" class="c s">
                    <div class="contents">
                        <h3>Advance Java</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis praesentium architecto aliquid voluptates minima error dolorem inventore ab, quaerat magnam!</p>
                        <h4>19 Chapters / 65 Videos</h4>
                    </div>
                </a>
                <div class="ud s">
                    <a href="#"><img src="./assets/img//edit-pencil.svg" alt=""></a>
                    <a href="#"><img src="./assets/img/trash-red.svg" alt=""></a>
                </div>
            </div>
            <div class="mainc">
                <a href="#" class="i s">
                    <img src="./assets/img/r1.jpeg" alt="">
                </a>
                <a href="#" class="c s">
                    <div class="contents">
                        <h3>Advance Java</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis praesentium architecto aliquid voluptates minima error dolorem inventore ab, quaerat magnam!</p>
                        <h4>19 Chapters / 65 Videos</h4>
                    </div>
                </a>
                <div class="ud s">
                    <a href="#"><img src="./assets/img//edit-pencil.svg" alt=""></a>
                    <a href="#"><img src="./assets/img/trash-red.svg" alt=""></a>
                </div>
            </div>
            <div class="mainc">
                <a href="#" class="i s">
                    <img src="./assets/img/r2.png" alt="">
                </a>
                <a href="#" class="c s">
                    <div class="contents">
                        <h3>Advance Java</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis praesentium architecto aliquid voluptates minima error dolorem inventore ab, quaerat magnam!</p>
                        <h4>19 Chapters / 65 Videos</h4>
                    </div>
                </a>
                <div class="ud s">
                    <a href="#"><img src="./assets/img//edit-pencil.svg" alt=""></a>
                    <a href="#"><img src="./assets/img/trash-red.svg" alt=""></a>
                </div>
            </div>
            <div id="sorryMessage" style="color: red; margin:auto; display: none; font-size: 2rem;">Couse not found</div>
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
        var maincElements = document.querySelectorAll('.mainc');
        var sorryMessage = document.getElementById('sorryMessage');
        var coursesFound = false;

        maincElements.forEach(function(mainc) {
            var title = mainc.querySelector('h3').innerText.toLowerCase();
            var description = mainc.querySelector('p').innerText.toLowerCase();

            if (title.includes(searchInput) || description.includes(searchInput)) {
                mainc.style.display = 'flex';
                coursesFound = true;
            } else {
                mainc.style.display = 'none';
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
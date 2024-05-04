<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/EduCat (4)_rm.png">
    <link rel="stylesheet" href="./assets/css/videop.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>All Videos</title>
</head>
<style>
    body{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 100vh;
    }
    
    .container {
        display: flex;
        justify-content: center;
    }

    h1 {
        color: black;
        text-align: center;
        margin: 0;
    }

    .videocon {
        flex-direction: column;
        justify-content: space-evenly;
    }

    .oldp input,
    .newp input {
        padding: 7px 10px;
        border: 2px solid rgb(74 74 74 / 71%);
        margin-top: 5px;
        border-radius: 8px;
        transition: 0.3s all ease;
    }

    .oldp input:focus,
    .newp input:focus {
        outline: none;
    }

    label {
        font-weight: bold;
    }

    .oldp,
    .newp{
        display: flex;
        flex-direction: column;
    }

    .centerset{
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
    }
    
    .bottomset button{
        padding: 10px 25px;
        border-radius: 10px;           
        border: 2px solid var(--btn-color);
        background-color: var(--btn-color);
        color: white;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s all ease;
    }

    .bottomset button:hover{
        border: 2px solid var(--btn-color);
        background-color: transparent;
        color: var(--btn-color);
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
                    <a href="allvideos.php" class="buttons">All courses</a>
                    <a href="completedcource.php" class="buttons">Completed Courses</a>
                    <a href="favouritecourse.php" class="buttons">Favourites</a>
                    <a href="profilestu.php" class="buttons">My Profile</a>
                    <a href="settingstu.php" class="buttons active">Setting</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="videocon">
            <div class="topset">
                <h1>Security</h1>
            </div>
            <div class="centerset">
                <div class="oldp">
                    <label for="oldp">Old Password</label>
                    <input type="text" id="oldp">
                </div>
                <div class="newp">
                    <label for="newp">New Password</label>
                    <input type="text" id="newp">
                </div>
            </div>
            <div class="bottomset">
                <button>Save Changes</button>
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

</html>
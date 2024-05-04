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
    <title>Dashboard</title>
</head>
<style>
    .container {
        display: flex;
        justify-content: space-between;
    }

    .topsetting {
        height: 150px;
        display: flex;
        justify-content: space-between;
        padding: 20px;
    }

    .leftimg {
        width: 10%;
        height: 100%;
        display: flex;
        align-items: center;
    }

    .leftimg img {
    height: 54% !important;
    border-radius: 50%;
    background-color: rgb(218, 218, 218);
    overflow: hidden;
    object-fit: fill;
    width: 85% !important;
    }

    .centercontent {
        width: 20%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .rightcontent {
        width: 20%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .centercontent label,
    .rightcontent label {
        font-weight: bold;
    }

    .centercontent input,
    .rightcontent input {
        padding: 7px 10px;
        border: 2px solid green;
        margin-top: 5px;
        border-radius: 8px;
        transition: 0.3s all ease;
    }

    .centercontent input:focus,
    .rightcontent input:focus {
        outline: none;
    }

    .inputsetting {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .inputsetting a {
        text-decoration: none;
        color: black;
        font-size: 1.5rem;
        display: flex;
        margin-bottom: 15px;
        align-items: center;
        width: fit-content;
    }

    .centersetting {
        padding: 20px;
        margin-top: -20px;
    }

    .bottomsetting {
        padding: 20px;
        display: flex;
        align-items: end;
        justify-content: end;
    }

    .bottomsetting button{
        padding: 10px 25px;
        border-radius: 10px;
        border: 2px solid var(--btn-color);
        background-color: var(--btn-color);
        color: white;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s all ease;
    }

    .bottomsetting button:hover{
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
            <a href="intreport.php">Report</a>
            <a href="intsetting.php" style="background: #303030;">Setting</a>
        </div>
        <div class="rightside b">
            <div class="topsetting">
                <div class="leftimg" id="imageContainer">
                    <img id="userImage" src="./assets/img/user.png" alt="" style="cursor: pointer;">
                    <input type="file" id="imageInput" style="display: none;" accept="image/*">
                </div>
                <div class="centercontent">
                    <label for="fnameins">First Name</label>
                    <input type="text" value="Priyanshu" id="fnameins">
                </div>
                <div class="rightcontent">
                    <label for="lnameins">Last Name</label>
                    <input type="text" value="Pithadiya" id="lnameins">
                </div>

            </div>
            <div class="centersetting">
                <div class="inputsetting">
                    <a href="#"><img src="./assets/img/reset.png" alt="" height="30px" width="30px">&nbsp;&nbsp;Change
                        Password</a>
                    <a href="#"><img src="./assets/img/coupon.png" alt="" height="30px" width="30px">&nbsp;&nbsp;Manage
                        Coupens</a>
                    <a href="#"><img src="./assets/img/notification.png" alt="" height="30px" width="30px">&nbsp;&nbsp;Notifications</a>
                    <a href="#"><img src="./assets/img/help.png" alt="" height="25px" width="25px">&nbsp;&nbsp;Help</a>
                </div>
            </div>
            <div class="bottomsetting">
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
    <script>
        // Add event listener to the image container
        const imageContainer = document.getElementById("imageContainer");
        const imageInput = document.getElementById("imageInput");
        const userImage = document.getElementById("userImage");

        // Trigger the file input when the user clicks on the image container
        imageContainer.addEventListener("click", () => {
            imageInput.click();
        });

        // Listen for changes in the file input
        imageInput.addEventListener("change", (event) => {
            const selectedImage = event.target.files[0];

            if (selectedImage) {
                // Set the selected image as the source of the userImage
                const imageURL = URL.createObjectURL(selectedImage);
                userImage.src = imageURL;
            }
        });

        // Get references to the input fields in centercontent and rightcontent
        const centerInput = document.querySelector('.centercontent input');
        const rightInput = document.querySelector('.rightcontent input');

        // Add input event listeners to check for input and change border color
        centerInput.addEventListener("input", () => {
            if (centerInput.value.trim() !== '') {
                centerInput.style.borderColor = 'green';
            } else {
                centerInput.style.borderColor = 'red';
            }
        });

        rightInput.addEventListener("input", () => {
            if (rightInput.value.trim() !== '') {
                rightInput.style.borderColor = 'green';
            } else {
                rightInput.style.borderColor = 'red';
            }
        });
    </script>

</body>

</html>
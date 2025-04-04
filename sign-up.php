<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/EduCat (4)_rm.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Sign up</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    
    <div class="container">
        <form action="includes/scripts/signmeup.php" method="post" class="login" id="signupform">
            <div class="main">
                <div class="heading">
                    <h1>Sign up</h1>
                </div>
                <div class="inputs">
                    <input type="text" name="educat_user_fullname" class="input" placeholder="Full Name" pattern="^[^0-9]+$" title="Please enter a valid name without numbers" autofocus required>
                    <input type="email" name="educat_user_email" class="input" placeholder="Email" id="emailID" required>
                    <span id="emailError" class="error"></span>

                    <!-- OTP Section -->
                    <div id="otp-section">
                        <div class="otp-input">
                            <input type="text" name="educat_user_otp" class="input" placeholder="Enter OTP" id="otp" required>
                            <button type="button" class="otp-button" id="sendOTP">Send OTP</button>
                        </div>
                        <span id="otpMessage"></span>
                    </div>

                    <input type="password" name="educat_user_password" class="input" placeholder="Password" pattern=".{8,}" title="Password must be at least 8 characters long" id="password" required>
                    <input type="password" name="educat_user_confirm_password" class="input" placeholder="Confirm password" pattern=".{8,}" title="Password must be at least 8 characters long" oninput="checkPasswordMatch()" id="confirm-password" required>
                </div>
                <div class="button">
                    <input type="submit" class="btn" value="Sign Up">
                </div>
                <div class="signup">
                    Have an account? <a href="sign-in.php">&nbsp;Sign In</a>
                </div>
            </div>
        </form>
        <div class="leftimg">
            <img src="./assets/img/study.png" alt="">
        </div>
    </div>

    <style>
        .otp-input {
            display: flex;
            /* align-items: center; */
            width: 320px;
            margin: 0;
            padding: 0;

        }

        .otp-button {
            margin-left: 10px;
            margin-top: 17px;
            padding: 8px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            border-radius: 5px;
        }

        .otp-button:hover {
            background-color: #45a049;
        }
    </style>
    
    <script>
        function checkPasswordMatch() {
            const password = document.getElementById("password");
            const confirmPassword = document.getElementById("confirm-password");

            if (password.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity("Passwords do not match");
            } else {
                confirmPassword.setCustomValidity("");
            }
        }
        $("#sendOTP").click(function() {
            const email = $("#emailID").val();

            if (!email) {
                $("#otpMessage").text("Please enter your email first.").css("color", "red");
                return;
            }

            $.ajax({
                url: "includes/scripts/send_otp.php", // Make sure this path is correct relative to your sign-up.php file
                type: "POST",
                data: {
                    email: email
                },
                dataType: "json",
                success: function(response) {
                    $("#otpMessage").text(response.message).css("color", response.success ? "green" : "red");
                },
                error: function(xhr, status, error) {
                    $("#otpMessage").text("An error occurred. Please try again.").css("color", "red");
                    console.log(xhr.responseText); // Logs the error response for debugging
                }
            });
        });
    </script>

</body>

</html>
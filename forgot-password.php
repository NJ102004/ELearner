<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/login.css">
  <title>Forgot Password</title>
</head>

<body>
  <div class="container">
    <div class="leftimg">
      <img src="./assets/img/forgot.png" alt="">
    </div>
    <form id="forgetPasswordForm" class="login">
      <div class="main">
        <h1>Forgot Password</h1>
        <div class="inputs">
          <input type="email" name="email" class="input" placeholder="Email" required autofocus>
          <div class="otp-container">
            <input type="text" name="otp" class="otp-input" placeholder="OTP" required>
            <span class="send-otp" id="sendOtp">Send OTP</span>
          </div>
        </div>


        <div class="button">
          <button type="submit" class="btn">Verify OTP</button>
        </div>

        <div class="signup">
          <a href="sign-in.php">Back to Login</a>
        </div>
      </div>
    </form>

    <script>
      document.getElementById('sendOtp').addEventListener('click', function() {
        const email = document.querySelector('input[name="email"]').value;

        if (!email) {
          alert('Please enter your email');
          return;
        }

        fetch('includes/scripts/forget_password_handler.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify({
              action: 'send_otp',
              email
            })
          })
          .then(response => response.json())
          .then(data => alert(data.message));
      });

      document.addEventListener("DOMContentLoaded", () => {
        const sendOtpElement = document.getElementById("sendOtp");
        let otpSent = false;

        sendOtpElement.addEventListener("click", () => {
          if (!otpSent) {
            // Trigger your OTP sending logic here (e.g., AJAX request)
            console.log("Sending OTP...");

            // After sending OTP, update the text to "Resend"
            sendOtpElement.textContent = "Resend";
            otpSent = true;
          } else {
            // Handle Resend OTP logic here
            console.log("Resending OTP...");

            // Optionally disable the button for a few seconds to prevent spam
            sendOtpElement.style.pointerEvents = "none";
            setTimeout(() => {
              sendOtpElement.style.pointerEvents = "auto";
            }, 5000); // 5 seconds cooldown before allowing resend
          }
        });
      });


      document.getElementById('forgetPasswordForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const email = document.querySelector('input[name="email"]').value;
        const otp = document.querySelector('input[name="otp"]').value;

        fetch('includes/scripts/forget_password_handler.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify({
              action: 'verify_otp',
              email,
              otp
            })
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              alert('OTP Verified! Proceeding to reset password.');
              window.location.href = `reset_password.php?email=${encodeURIComponent(email)}`;
            } else {
              alert(data.message);
            }
          });
      });
    </script>
  </div>
</body>

</html>
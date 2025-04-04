<!-- Simplified forgot-password.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/login.css">
  <title>Forgot Password</title>
</head>

<body>
  <div class="container">
  <div class="leftimg">
      <img src="./assets/img/forgot.png" alt="">
    </div>
    <form id="forgetPasswordForm" action="includes/scripts/forget_password_handler.php" method="post" class="login">
      <div class="main">
        <div class="heading">
          <h1>Reset Password</h1>
        </div>
        <div id="step1" class="inputs">
          <input type="email" name="email" class="input" placeholder="Email" required>
          <input type="text" name="otp" class="input" placeholder="OTP" required>
          <span class="send-otp" id="sendOtp">Send OTP</span>
        </div>

        <div id="step2" class="inputs" style="display: none;">
          <input type="password" name="new_password" class="input" placeholder="New Password" autocomplete="new-password">
          <input type="password" name="confirm_password" class="input" placeholder="Confirm Password" autocomplete="new-password">
        </div>

        <div class="button">
          <input value="Submit" name="submit" type="submit" class="btn">
        </div>
        <div class="signup">
          <a href="sign-in.php">Back to Login</a>
        </div>
      </div>
    </form>

    <script>
      const form = document.getElementById('forgetPasswordForm');
      const step2 = document.getElementById('step2');
      const sendOtpBtn = document.getElementById('sendOtp');

      sendOtpBtn.addEventListener('click', function () {
        const emailInput = document.querySelector('input[name="email"]');

        if (emailInput.value === '') {
          alert('Please enter your email');
          return;
        }

        fetch('includes/scripts/forget_password_handler.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ action: 'send_otp', email: emailInput.value })
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert('OTP sent to your email');
          } else {
            alert(data.message);
          }
        });
      });

      form.addEventListener('submit', function (e) {
        e.preventDefault();
        const emailInput = document.querySelector('input[name="email"]').value;
        const otpInput = document.querySelector('input[name="otp"]').value;
        const newPassword = document.querySelector('input[name="new_password"]').value;
        const confirmPassword = document.querySelector('input[name="confirm_password"]').value;

        if (step2.style.display === 'none') {
          fetch('includes/scripts/forget_password_handler.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: 'verify_otp', email: emailInput, otp: otpInput })
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              alert('OTP verified successfully. Please enter your new password.');
              step2.style.display = 'block';
            } else {
              alert(data.message);
            }
          });
        } else {
          if (newPassword !== confirmPassword) {
            alert('Passwords do not match');
            return;
          }

          fetch('includes/scripts/forget_password_handler.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
              action: 'reset_password',
              email: emailInput,
              new_password: newPassword
            })
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              alert('Password reset successfully. You can now login.');
              window.location.href = 'sign-in.php';
            } else {
              alert(data.message);
            }
          });
        }
      });
    </script>
  </div>
</body>

</html>

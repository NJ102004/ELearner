<?php
session_start();
require 'includes/scripts/connection.php';
require 'includes/components/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($email) || empty($new_password) || empty($confirm_password)) {
      $error = 'All fields are required.';
    } elseif ($new_password !== $confirm_password) {
      $error = 'Passwords do not match.';
    } elseif (!isset($_SESSION['educat_user_otp_verified']) || $_SESSION['educat_user_otp_verified'] !== true) {
      $error = 'OTP verification required. Please try again.';
    } else {
      $hashedPassword = password_hash($new_password, PASSWORD_BCRYPT);

      $stmt = $conn->prepare("UPDATE user_master SET user_password = ? WHERE user_email = ?");
      $stmt->bind_param('ss', $hashedPassword, $email);

      if ($stmt->execute()) {
        $success = 'Password reset successfully. You can now login.';
        unset($_SESSION['educat_user_otp_verified']); // Clear OTP verification session
      } else {
        $error = 'Failed to update password. Please try again.';
      }

      $stmt->close();
      $conn->close();
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
  <div class="container">
    <div class="leftimg">
      <img src="./assets/img/forgot.png" alt="">
    </div>
    
      <?php if (isset($error)): ?>
        <div class="error"><?php echo $error; ?></div>
      <?php elseif (isset($success)): ?>
        <div class="success"><?php echo $success; ?></div>
      <?php endif; ?>

      <form action="reset_password.php" method="post" class="login">
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>">
        <div class="main">
        <h1>Reset Password</h1>
        <div class="inputs">
          <input type="password" name="new_password" class="input" placeholder="New Password" required autocomplete="new-password">
          <input type="password" name="confirm_password" class="input" placeholder="Confirm Password" required autocomplete="new-password">
        </div>
        <div class="button">
          <button type="submit" class="btn">Reset Password</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>
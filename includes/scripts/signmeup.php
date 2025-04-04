<?php
session_start();


require __DIR__ . '/connection.php'; // Connection is in the same folder as signmeup.php
require __DIR__ . '/../components/functions.php'; // Going one folder up to reach components


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["educat_user_fullname"];
    $email = $_POST["educat_user_email"];
    $password = $_POST["educat_user_password"];
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    $confirmPassword = $_POST["educat_user_confirm_password"];
    $userOtp = $_POST["educat_user_otp"];
    $registrationDate = date("d-m-Y");
    $_SESSION["trial_email"] =  $_POST["educat_user_email"]; 
    
    // Validate OTP
    if (!isset($_SESSION['educat_user_otp']) || !isset($_SESSION['educat_user_otp_expiry'])) {
        $_SESSION['educat_error_message'] = "OTP has not been generated. Please request OTP.";
        header("Location: ../../sign-up.php");
        exit();
    }

    if (time() > $_SESSION['educat_user_otp_expiry']) {
        $_SESSION['educat_error_message'] = "OTP has expired. Please request a new one.";
        header("Location: ../../sign-up.php");
        exit();
    }

    if ($userOtp !== $_SESSION['educat_user_otp']) {
        $_SESSION['educat_error_message'] = "Invalid OTP. Please try again.";
        header("Location: ../../sign-up.php");
        exit();
    }

    // Clear OTP from session after validation
    unset($_SESSION['educat_user_otp']);
    unset($_SESSION['educat_user_otp_expiry']);

    if (empty($fullname) || empty($email) || empty($password) || empty($confirmPassword)) {
        $_SESSION['educat_error_message'] = "All fields are required.";
        header("Location: ../../sign-up.php");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['educat_error_message'] = "Invalid email format.";
        header("Location: ../../sign-up.php");
        exit();
    }

    if ($password !== $confirmPassword) {
        $_SESSION['educat_error_message'] = "Passwords do not match.";
        header("Location: ../../sign-up.php");
        exit();
    }

    // Check if email already exists
    $email = mysqli_real_escape_string($conn, $email);
    $sql = "SELECT COUNT(*) FROM `user_master` WHERE `user_email` = '$email'";
    $res = mysqli_query($conn, $sql);

    if($res) {
        $row = mysqli_fetch_array($res);
        $count = $row[0];

        if($count > 0) {
            $_SESSION['educat_error_message'] = "Email address already exists.";
            header("Location: ../../sign-up.php");
            exit();
        }
    }

    // Insert user data into the database
    $insertQuery = "INSERT INTO user_master (user_name, user_email, user_password, role, isVerified, isActive, registration_date) VALUES ('$fullname', '$email', '$hashedpassword', 3, 0, 0, '$registrationDate')";

    if ($conn->query($insertQuery) === TRUE) {
        $_SESSION['educat_success_message'] = "Account created, Please login with correct credentials.";
        header("Location: ../../sign-in.php");
        exit();
    } else {
        $_SESSION['educat_error_message'] = "Error: " . $insertQuery . "<br>" . $conn->error;
        header("Location: ../../sign-up.php");
        exit();
    }

    $conn->close();
}
?>

<?php
session_start();


require '../scripts/connection.php';
require '../components/functions.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid email format.']);
        exit();
    }

    // Generate OTP
    $otp = generateOTP();
    $_SESSION['educat_user_otp'] = $otp;
    $_SESSION['educat_user_otp_expiry'] = time() + (5 * 60); // Valid for 5 minutes

    // Send OTP via email
    if (sendOTP($email, $otp)) {
        echo json_encode(['success' => true, 'message' => 'OTP has been sent to your email.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to send OTP. Please try again.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}

?>

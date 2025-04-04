<?php
session_start();

require '../scripts/connection.php';
require '../components/functions.php';

header('Content-Type: application/json');
$input = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($input['action'] === 'send_otp') {
        $email = filter_var($input['email'], FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['success' => false, 'message' => 'Invalid email format.']);
            exit();
        }

        $otp = generateOTP();
        $_SESSION['educat_user_otp'] = $otp;
        $_SESSION['educat_user_otp_expiry'] = time() + (5 * 60);

        if (sendOTP($email, $otp)) {
            echo json_encode(['success' => true, 'message' => 'OTP has been sent to your email.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to send OTP. Please try again.']);
        }

        exit();
    }

    if ($input['action'] === 'verify_otp') {
        $otp = $input['otp'];
        $email = $input['email'];

        if (!isset($_SESSION['educat_user_otp']) || $_SESSION['educat_user_otp'] !== $otp) {
            echo json_encode(['success' => false, 'message' => 'Invalid or expired OTP.']);
            exit();
        }

        if (time() > $_SESSION['educat_user_otp_expiry']) {
            echo json_encode(['success' => false, 'message' => 'OTP expired. Please request a new one.']);
            exit();
        }

        echo json_encode(['success' => true, 'message' => 'OTP verified successfully.']);
        exit();
    }

    if ($input['action'] === 'reset_password') {
        $email = $input['email'];
        $new_password = $input['new_password'];

        $hashedPassword = password_hash($new_password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("UPDATE user_master SET password = ? WHERE email = ?");
        $stmt->bind_param('ss', $hashedPassword, $email);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Password has been reset successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update password. Please try again.']);
        }

        $stmt->close();
        $conn->close();
        exit();
    }
}




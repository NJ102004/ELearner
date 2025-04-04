<?php


// Include PHPMailer for sending emails
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../../vendor/autoload.php';


// Function to generate random OTP
function generateOTP($length = 6)
{
    return str_pad(random_int(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
}

// Function to send OTP email
function sendOTP($email, $otp)
{
    $mail = new PHPMailer(true);

    try {
        // Dynamic email sender details (fetch from database)
        $senderEmail = getSenderEmail();

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $senderEmail['email'];
        $mail->Password   = $senderEmail['password'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Set proper encoding and headers
        $mail->CharSet = 'UTF-8'; // ✅ Ensuring the email supports all characters
        $mail->XMailer = 'ELearnerMailer/1.0'; // ✅ Custom mailer to reduce spam suspicion

        $mail->setFrom($senderEmail['email'], 'ELearner');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body = "
        <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333; padding: 20px; border: 1px solid #ddd; border-radius: 10px;'>
            <h2 style='color: #4CAF50;'>Welcome to ELearner!</h2>
            <p>Dear User,</p>
            <p>Thank you for choosing <strong>ELearner</strong>. We're excited to have you onboard!</p>
            <p>To proceed with your account registration, please use the OTP code provided below:</p>
            
            <div style='font-size: 18px; margin: 20px 0; padding: 10px; background-color: #f0f0f0; border-radius: 5px; text-align: center;'>
                <strong style='color: #4CAF50;'>$otp</strong>
            </div>
            
            <p><strong>Note:</strong> This OTP code is valid for 5 minutes.</p>
            
            <p>If you did not request this, please ignore this email or contact our support team.</p>
            
            <p>Warm regards,<br>
            The <strong>ELearner</strong> Team</p>
            
            <hr>
            <p style='font-size: 12px; color: #888;'>This is an automated email. Please do not reply directly to this message.</p>
        </div>
    ";


        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function sendVerificationEmail($to, $verificationLink, $emailSubject) {
    $mail = new PHPMailer(true);

    try {

        // Dynamic email sender details (fetch from database)
        $senderEmail = getSenderEmail();
        
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username   = $senderEmail['email'];
        $mail->Password   = $senderEmail['password'];
        $mail->SMTPSecure = 'tls'; // Use 'tls' or 'ssl'
        // For SSL use this port
        // $mail->Port = 465;
        // For TLS use this port
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($senderEmail['email'], 'ELearner Team');
        $mail->addAddress($to);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $emailSubject;
        $mail->Body = $verificationLink;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}


// Function to fetch sender email details from the database
function getSenderEmail()
{
    require '../scripts/connection.php';

    $query = "SELECT email, password FROM email_settings LIMIT 1";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return ['email' => 'defaultemail@example.com', 'password' => 'defaultpassword'];
}

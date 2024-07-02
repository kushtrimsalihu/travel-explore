<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

header('Content-Type: application/json');

ob_start();

$smtp_username = isset($_POST['smtp_username']) ? $_POST['smtp_username'] : '';
$smtp_password = isset($_POST['smtp_password']) ? $_POST['smtp_password'] : '';
$recipient_emails = isset($_POST['recipient_emails']) ? $_POST['recipient_emails'] : [];

if (empty($recipient_emails) || !is_array($recipient_emails)) {
    ob_end_clean();
    http_response_code(400);
    echo json_encode(['error' => 'No valid recipient email addresses provided.']);
    exit;
}

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $smtp_username;
    $mail->Password = $smtp_password;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom($smtp_username, 'Travel Explore Mailer');
    
    foreach ($recipient_emails as $recipient_email) {
        if (filter_var($recipient_email, FILTER_VALIDATE_EMAIL)) {
            $mail->addAddress($recipient_email);
        }
    }

    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body    = 'Name: ' . $_POST['fullName'] . '<br>Email: ' . $_POST['email'] . '<br>Message: ' . nl2br($_POST['message']);
    $mail->AltBody = strip_tags($mail->Body);

    $mail->send();
    ob_end_clean(); 
    echo json_encode(['message' => 'Message has been sent']);
} catch (Exception $e) {
    ob_end_clean(); 
    http_response_code(500);
    echo json_encode(['error' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo]);
} catch (Error $e) {
    ob_end_clean(); 
    http_response_code(500);
    echo json_encode(['error' => 'An unexpected error occurred.']);
}
?>

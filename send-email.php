<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

header('Content-Type: application/json'); 

$mail = new PHPMailer(true);
try {
    
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;
    $mail->Username = 'rinesakuqi2003@gmail.com'; 
    $mail->Password = 'bvyl tvza cakx vpum'; 
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    
    $mail->setFrom('rinesakuqi2003@gmail.com', 'Mailer');
    $mail->addAddress('rinesakuqi2003@gmail.com', 'Rinesa'); 

    
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body    = 'Name: ' . $_POST['fullName'] . '<br>Email: ' . $_POST['email'] . '<br>Message: ' . nl2br($_POST['message']);
    $mail->AltBody = strip_tags($mail->Body);

    
    $mail->send();
    echo json_encode(['message' => 'Message has been sent']);
} catch (Exception $e) {
    http_response_code(500); 
    echo json_encode(['error' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo]);
}
?>

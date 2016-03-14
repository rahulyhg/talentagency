<?php
date_default_timezone_set('Etc/UTC');
// $email and $message are the data that is being
// posted to this page from our html contact form
$client_email = "";
$cc_email = "";
$bcc_email = "";
$subject = "";
$message = "";
$file_path = "";

// Retrieving & storing user's submitted information
if (isset($_POST['client_email'])) {
$client_email = $_POST['client_email'];
}
if (isset($_POST['cc_email'])) {
$cc_email = $_POST['cc_email'];
}
if (isset($_POST['bcc_email'])) {
$bcc_email = $_POST['bcc_email'];
}
if (isset($_POST['subject'])) {
$subject = $_POST['subject'];
}
if (isset($_POST['message'])) {
$message = $_POST['message'];
}
if (isset($_POST['uploaded_file_path'])) {
$file_path = $_POST['uploaded_file_path'];
}


require("PHPMailerAutoload.php");

$mail = new PHPMailer;

$mail->SMTPDebug = 2;                               // Enable verbose debug output
$mail->Debugoutput = 'html';
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'nainakhawar2015@gmail.com';                 // SMTP username
$mail->Password = 'nainakhan14';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('kafia@sutlej.net', 'Kafia');
//$mail->addAddress('rmak@sutlej.net', 'Mansoor');     // Add a recipient
$mail->addAddress($client_email);               // Name is optional
$mail->addReplyTo('kafia@sutlej.net', 'Information');
$mail->addCC($cc_email);
$mail->addBCC($bcc_email);
//$mail->msgHTML(file_get_contents('search1.html'));
if (isset($_FILES['uploaded_file']) &&
    $_FILES['uploaded_file']['error'] == UPLOAD_ERR_OK) {
    $mail->AddAttachment($_FILES['uploaded_file']['tmp_name'],
                         $_FILES['uploaded_file']['name']);
}
$mail->addAttachment($_FILES['file_path']);;         // Add attachments
//$mail->addAttachment('../uploads/Kafia Ahmed.pdf');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $message;
$mail->AltBody = $message;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>
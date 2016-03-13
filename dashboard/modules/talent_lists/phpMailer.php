<?php
date_default_timezone_set('Etc/UTC');
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
$mail->addAddress('rmak@sutlej.net', 'Mansoor');     // Add a recipient
//$mail->addAddress('naina@sutlej.net');               // Name is optional
$mail->addReplyTo('kafia@sutlej.net', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
$mail->msgHTML(file_get_contents('search1.html'));
$mail->addAttachment('../uploads/talent_photos/1_photo.jpg');         // Add attachments
$mail->addAttachment('../uploads/Kafia Ahmed.pdf');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'PHPMailer Testing';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>
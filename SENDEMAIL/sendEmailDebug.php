
<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
include 'config/config.php';
$id = $_GET['id'];
date_default_timezone_set('Etc/UTC');
require 'PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "ahmad.bastian8@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "W0r3&Tr0j43";
//Set who the message is to be sent from
$mail->setFrom('ahmad.bastian8@gmail.com', 'judul dari x');
//Set an alternative reply-to address
$namaPenerimaEmail  = "tutorialsuper.cs@gmail.com";
// $mail->addReplyTo('tutorialsuper.cs@gmail.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('tutorialsuper.cs@gmail.com', 'John Doe');
//Set the subject line
// $mail->Subject = 'PHPMailer GMail SMTP test';
// //Read an HTML message body from an external file, convert referenced images to embedded,
// //convert HTML into a basic plain-text alternative body
// $mail->msgHTML(file_get_contents('phpcurl.php'), dirname(__FILE__));
//Replace the plain text body with one created manually
// $mail->AltBody = 'This is a plain-text message body';

function get_include_contents($filename) {

    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}
$mail->IsHTML(true);    // set email format to HTML
$mail->Subject = "You have an event today";
$mail->Body = get_include_contents('content\invoice.php'); // HTML -> PHP!
$mail->addAttachment("file/file.txt", "File.txt");
//Attach an image file
$mail->addAttachment('imgTes/amanda.jpg');
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

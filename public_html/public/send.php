<?php
require_once('class.phpmailer.php');


$mail = new PHPMailer(true);

$mail->IsSMTP(); // telling the class to use SMTP

try {
  $mail->Host       = "mail.host.com"; // SMTP server
  $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->Host       = "mail.host.com"; // sets the SMTP server
  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
  $mail->Username   = "yourname@yourdomain"; // SMTP account username
  $mail->Password   = "yourpassword";        // SMTP account password
  $mail->AddAddress('whoto@otherdomain.com', 'John Doe');
  $mail->SetFrom('name@yourdomain.com', 'First Last');
  $mail->AddReplyTo('name@yourdomain.com', 'First Last');
  $mail->Subject = 'PHPMailer Test Subject via mail(), advanced';
  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
  $mail->MsgHTML("<h1>Haiiiiii</h1>");
  //$mail->AddAttachment('images/phpmailer.gif');      // attachment
  //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
  $mail->Send();
  echo "Message Sent OK</p>\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}
?>

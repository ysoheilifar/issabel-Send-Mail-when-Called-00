<?php
include "class.phpmailer.php";
include "class.smtp.php";

$html = file_get_contents("checkcdr00.html");
if (strpos($html, "900") !== false) {
  echo "**found CDR Report 00**\n";

  $mail = new PHPMailer;
 
//Enable SMTP debugging.
  $mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
  $mail->isSMTP();            
//Set SMTP host name                          
  $mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
  $mail->SMTPAuth = true;                          
//Provide username and password     
  $mail->Username = "issabel@gmail.com";                 
  $mail->Password = "pass_of_issabel_Gmail";                           
//If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "tls";                           
//Set TCP port to connect to
  $mail->Port = 587;                                   
 
  $mail->From = "issabel@gmail.com";
  $mail->FromName = "**found CDR Report 00**";
 
  $mail->addAddress("admin@yahoo.com", "Recepient Name");
 
  $mail->isHTML(true);
 
  $mail->Subject = "**found CDR Report 00**";
  $mail->Body = file_get_contents('checkcdr00.html');
  $mail->AltBody = "This is the plain text version of the email content";
 
  try {
      $mail->send();
      echo "Message has been sent successfully\n";
  } catch (Exception $e) {
      echo "Mailer Error: " . $mail->ErrorInfo;
  }

} else {
  echo "not found CDR Report 00\n";
}


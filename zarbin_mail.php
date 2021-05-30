#!/usr/bin/php -q
<?php
require 'phpagi.php';
require 'mail/PHPMailerAutoload.php';
include "mail/class.phpmailer.php";
include "mail/class.smtp.php";
error_reporting (E_ALL);
$agi = new AGI();

//set time zone to local
date_default_timezone_set('Asia/Tehran');
$datetime = date("Y-m-d H:i:s");
$time = date("H:i:s");

//set CDR User Field
$agi->set_variable("CDR(userfield)", "CALLED 00");

//get some of channel variables
$caller_id_number = $agi->request["agi_callerid"];
$caller_id_name   = $agi->request["agi_calleridname"];
$unique_id        = $agi->request["agi_uniqueid"];
$exten 			  = $agi->request['agi_dnid'];

//set mail paraneters
$agi->set_variable("mail_server", "smtp.gmail.com");
$agi->set_variable("mail_user", "decat.router@gmail.com");
$agi->set_variable("mail_password","decat102030@");
$agi->set_variable("mail_to", "y.soheilifar@yahoo.com");
$agi->set_variable("mail_subject", "CDR 00 Called");
$agi->set_variable("mail_to_text", "Admin");
$agi->set_variable("mail_from_text", "ZarbinNetwork");
$agi->set_variable("mail_body", "CallerIDNumber = ".$caller_id_number."<p>DIDNumber = ".$exten."<p>DateTime = ".$datetime."<p>UniqueID = ".$unique_id);

$mail_subject   = $agi->get_variable("mail_subject")['data'];
$mail_body      = $agi->get_variable("mail_body")['data'];
$mail_server    = $agi->get_variable("mail_server")['data'];
$mail_user      = $agi->get_variable("mail_user")['data'];
$mail_password  = $agi->get_variable("mail_password")['data'];
$mail_from_text = $agi->get_variable("mail_from_text")['data'];
$mail_to        = $agi->get_variable("mail_to")['data'];
$mail_to_text   = $agi->get_variable("mail_to_text")['data'];

$mail = new PHPMailer;
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)    1 = client messages          2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
$mail->CharSet = 'UTF-8';
$mail->Host = $mail_server;
$mail->Port = 25;
$mail->SMTPAuth = true;
$mail->Username = $mail_user;
$mail->Password = $mail_password;
$mail->setFrom($mail_user,$mail_from_text) ;
$mail->addAddress($mail_to, $mail_to_text);
$mail->Subject = $mail_subject;
$mail->msgHTML($mail_body);
$mail->addAttachment($feedback_file);
if ($mail->send()) 
	$agi->verbose("**************Message sent*****************");
else 
	$agi->verbose("**************Message not sent!*************");
exit;
?>
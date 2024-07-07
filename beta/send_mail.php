<?php
ob_start();

require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer(true);
$mailHost = "mail.utility-deals.com";
$mailUsername = "info@utility-deals.com";   //SMTP user name
$mailPassword = "r21Z@9zX3!kq";    //SMTP user password
$mailSMTPSecure = 'tls';
$mailFrom = "info@utility-deals.com";  //sender mail address
$mailFromName = "Test Mail";  // sender name
$mailAddReplyTo = "info@utility-deals.com";
$mailTo = "hetal.thakar21@gmail.com";   //reciver mail address

if ($_REQUEST['action']=='contact') {
    $mailFormat = file_get_contents("contact_mail.html");
    $mailFormat = str_replace("#date#", date('d-m-Y'), $mailFormat);
    $mailFormat = str_replace("#Name#", $_REQUEST['name'], $mailFormat);
    $mailFormat = str_replace("#Email#", $_REQUEST['email'], $mailFormat);
    $mailFormat = str_replace("#Phone#", $_REQUEST['phone'], $mailFormat);
    // $mailFormat = str_replace("#doj#", date('d-m-Y',strtotime($_REQUEST['doj'])), $mailFormat);
    // $mailFormat = str_replace("#Address#", $_REQUEST['address'], $mailFormat);
    // $mailFormat = str_replace("#Postcode#", $_REQUEST['postcode'], $mailFormat);
    // $mailFormat = str_replace("#Reference#", $_REQUEST['reference'], $mailFormat);
    // $mailFormat = str_replace("#CurrentSupplier#", $_REQUEST['csupllier'], $mailFormat);
    // $mailFormat = str_replace("#enddate#", date('d-m-Y',strtotime($_REQUEST['enddate'])), $mailFormat);
    $mailFormat = str_replace("#Meassage#", $_REQUEST['message'], $mailFormat);

    try {

      //  $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $mailHost;
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $mailUsername;
        $mail->Password   = $mailPassword;                            //SMTP password
        $mail->SMTPSecure = $mailSMTPSecure;
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($mailFrom);
        $mail->addAddress($mailTo);     //Add a recipient            
        //   $mail->addCC('shahkrunal83@gmail.com');     //Add a recipient            
        $mail->addReplyTo($mailAddReplyTo);
        //   $mail->addCC('cc@example.com');
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'test mail';
        $mail->Body    = $mailFormat; //'This is the HTML message body <b>in bold!</b>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if ($_REQUEST['action']=='gas_deal') {
    $mailFormat = file_get_contents("mail_format.html");
    $mailFormat = str_replace("#date#", date('d-m-Y'), $mailFormat);
    $mailFormat = str_replace("#Name#", $_REQUEST['name'], $mailFormat);
    $mailFormat = str_replace("#Email#", $_REQUEST['email'], $mailFormat);
    $mailFormat = str_replace("#Phone#", $_REQUEST['phone'], $mailFormat);
    // $mailFormat = str_replace("#doj#", date('d-m-Y',strtotime($_REQUEST['doj'])), $mailFormat);
    $mailFormat = str_replace("#Address#", $_REQUEST['address'], $mailFormat);
    $mailFormat = str_replace("#Postcode#", $_REQUEST['postcode'], $mailFormat);
    // $mailFormat = str_replace("#Reference#", $_REQUEST['reference'], $mailFormat);
    $mailFormat = str_replace("#CurrentSupplier#", $_REQUEST['csupllier'], $mailFormat);
    $mailFormat = str_replace("#enddate#", date('d-m-Y',strtotime($_REQUEST['enddate'])), $mailFormat);
    $mailFormat = str_replace("#Meassage#", $_REQUEST['message'], $mailFormat);

    try {

        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $mailHost;
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $mailUsername;
        $mail->Password   = $mailPassword;                            //SMTP password
        $mail->SMTPSecure = $mailSMTPSecure;
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($mailFrom);
        $mail->addAddress($mailTo);     //Add a recipient            
        //   $mail->addCC('shahkrunal83@gmail.com');     //Add a recipient            
        $mail->addReplyTo($mailAddReplyTo);
        //   $mail->addCC('cc@example.com');
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Gas deal mail';
        $mail->Body    = $mailFormat; //'This is the HTML message body <b>in bold!</b>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

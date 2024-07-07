<?php


if (isset($_POST['singlebutton'])) {
    $senderName   = $_POST['senderName'];
    $senderEmail  = $_POST['senderEmail'];
    //$to           = "info@excellentcomputers.co.in"; // website admin's email
    $to           = "hetal.thakar21@gmail.com";
    $message      = $_POST['senderMessage'];// message from textarea
    
    // from person contacting from site
    $from         = "From: " . $senderName . "<" . $senderEmail . ">";
    $subject      = "Inquiry from Utility Deals";
    
    $headers   = array();
    $headers[] = "MIME-Version: 1.0";
    $headers[] = "Content-type: text/plain; charset=utf-8";
    $headers[] = $from;
    $headers[] = "Reply-To: " . $from;
    $headers[] = "Subject: {$subject}";
    $headers[] = "X-Mailer: PHP/".phpversion();
    
    // send simple mail
    try {
        if (!mail($to, $subject, $message, implode("\r\n", $headers))){
            echo "mail was not send.";exit;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
header("location:form.html");
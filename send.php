<?php
require 'vendor/autoload.php'; 

$toEmail  = "hectorhpflores72@gmail.com";
$apiKey = getenv("sendGridKey");
$fromEmail = "updates@visualstudio-plus.com";
$fromName  = "Updates";
$toName    = "Customer";
###########################################################################


###########################################################################
$email = new \SendGrid\Mail\Mail(); 
$email->setFrom($fromEmail, $fromName);
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo($toEmail, $toName);
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);

###########################################################################
$sendgrid = new \SendGrid($apiKey);
try {
    $response = $sendgrid->send($email);
	
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
	print 'Hector';
	
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
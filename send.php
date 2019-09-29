<?php
require 'vendor/autoload.php'; 
$toEmail   = "{Your email}";

if($toEmail == "{Your email}"){
	print "\n"."Seems like you havent updated the 'toEmail' variable. Update to use your personal email for testing"."\n"."\n";
	return;
}

###########################################################################
$apiKey = getenv("sendGridApiKey");
$domain = getenv("sendingEmailDomain");
$fromEmail = "updates@".$domain;
$fromName  = "Updates";
$toName    = "Customer";

###########################################################################
print "ToEmail: ".$toEmail. "\n";
print "apiKey: ".$apiKey. "\n";
print "fromEmail: ".$fromEmail. "\n";
print "ToEmail: ".$fromName. "\n";
print "fromName: ".$toName. "\n";

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
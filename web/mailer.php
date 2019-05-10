<style>
.message{
	margin:30px;
}
</style>
<?php 

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$reason = $_POST['reason'];
$title = $firstname . " " . $lastname . " requests access to NewsAggregator";
$headers .= 'From: News Aggregator' . "\r\n";
$message = $firstname . " " . $lastname . " (email address: " . $email . ") has requested access to News Aggregator." . "\r\n" . "Reason: " . $reason . "\r\n" . "Mobile number: " . $telephone;


if(mail('newsaggregator@oii.ox.ac.uk', $title, $message, $headers)){ ?>

<div class="message"> 

<?php
	echo "Thank you! Your request has been submitted. If approved, we will send you login details within the next working day.";
	
?>
</div>
<?php
} else {
	echo "Sorry, we've encountered an error. Please go back and try again. You can otherwise try emailing us at: ___";
}


?>
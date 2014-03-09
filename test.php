<?php
	/* Send an SMS using Twilio. You can run this file 3 different ways:
	 *
	 * - Save it as sendnotifications.php and at the command line, run 
	 *        php sendnotifications.php
	 *
	 * - Upload it to a web host and load mywebhost.com/sendnotifications.php 
	 *   in a web browser.
	 * - Download a local server like WAMP, MAMP or XAMPP. Point the web root 
	 *   directory to the folder containing this file, and load 
	 *   localhost:8888/sendnotifications.php in a web browser.
	 */

	// Step 1: Download the Twilio-PHP library from twilio.com/docs/libraries, 
	// and move it into the folder containing this file.
	//require "Services/Twilio.php";
	//require 'C:\wamp\www\Milos\twilio-php-master\Services\Twilio.php';
	require "twilio-php-master/Services/Twilio.php";

	// Step 2: set our AccountSid and AuthToken from www.twilio.com/user/account
	$AccountSid = "AC79900bb5daf942cc25425603a84ee298";
	$AuthToken = "e84fc4b034093d65338655d8506b95ef";

	// Step 3: instantiate a new Twilio Rest Client
	$client = new Services_Twilio($AccountSid, $AuthToken);



	//Test
	if(isset($_POST['PhoneNumberReceiver'])) 
	{
	  $PhoneNumberReceiver=$_POST['PhoneNumberReceiver'];
	}
	else 
	{
	  echo "PhoneNumberReceiver was not set in the form\n";
	}
	if(isset($_POST['Message'])) {
	  $Message=$_POST['Message'];
	}
	else 
	{
	  echo "Message was not set in the form\n";
	}


	// Step 4: make an array of people we know, to send them a message. 
	// Feel free to change/add your own phone number and name here.
	$people = array(
		$PhoneNumberReceiver => "Reciever",
		//"+15108965091" => "David Zhang",
		//"+14158675310" => "Boots",
		//"+14158675311" => "Virgil",
	);

	// Step 5: Loop over all our friends. $number is a phone number above, and 
	// $name is the name next to it
	$sms = $client->account->messages->sendMessage("408-215-9670", $PhoneNumberReceiver, $Message);
	echo "Sent message";
	header( 'Location: textfriends.html');
	/*
	foreach ($people as $number => $name) {

		$sms = $client->account->messages->sendMessage(

		// Step 6: Change the 'From' number below to be a valid Twilio number 
		// that you've purchased, or the (deprecated) Sandbox number
			"408-215-9670",  //1 408-215-9670

			// the number we are sending to - Any phone number
			$number,

			// the sms body
			//"Hey $name, Monkey Party at 6PM. Bring Bananas!"
			$Message
		);

		// Display a confirmation message on the screen
		echo "Sent message to $name";
	} */

	?>
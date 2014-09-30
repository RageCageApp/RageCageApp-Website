<?php

if( isset( $_POST['email'] ) ) {
    if( !empty( $_POST['email'] ) ) {
        $return['email'] = $_POST['email'];
        // Get the PHP helper library from twilio.com/docs/php/install
        require_once('twilio/Services/Twilio.php'); // Loads the library
         
        // Your Account Sid and Auth Token from twilio.com/user/account
        $sid = "AC3eef83f070fe080a92a0000fb5dc50c4"; 
        $token = "d82dbf603d848f49c574f0da54d308a0"; 
        $client = new Services_Twilio($sid, $token);
         
        $sms = $client->account->sms_messages->create("+13232388192", "+16263408980", $return['email'].' wants to stay in the loop', array());
        $return['error'] = $sms->sid;
    }
    else {
        $return['error'] = 'No Phone Sent';
    }
}
else {
    $return['error'] = 'No Phone Sent';
}

echo json_encode( $return );

<?php
require('http.php');
require('oauth_client.php');
require('config.php');


$client = new oauth_client_class;

// set the offline access only if you need to call an API
// when the user is not present and the token may expire
$client->offline = FALSE;

$client->debug = false;
$client->debug_http = true;
$client->redirect_uri = REDIRECT_URL;

$client->client_id = CLIENT_ID;
$application_line = __LINE__;
$client->client_secret = CLIENT_SECRET;

if (strlen($client->client_id) == 0 || strlen($client->client_secret) == 0)
  die('Please go to Google APIs console page ' .
          'http://code.google.com/apis/console in the API access tab, ' .
          'create a new client ID, and in the line ' . $application_line .
          ' set the client_id to Client ID and client_secret with Client Secret. ' .
          'The callback URL must be ' . $client->redirect_uri . ' but make sure ' .
          'the domain is valid and can be resolved by a public DNS.');

/* API permissions
 */
$client->scope = SCOPE;
if (($success = $client->Initialize())) {
  if (($success = $client->Process())) {
    if (strlen($client->authorization_error)) {
      $client->error = $client->authorization_error;
      $success = false;
    } elseif (strlen($client->access_token)) {
      $success = $client->CallAPI(
              'https://www.googleapis.com/oauth2/v1/userinfo', 'GET', array(), array('FailOnAccessError' => true), $user);
    }
  }
  $success = $client->Finalize($success);
}
if ($client->exit)
  exit;
if ($success) {
// Now check if user exist with same email ID
  try {

		$email= $user->email;
		$con=mysql_connect('rutvi.db.9462939.hostedresource.com','rutvi','Demo9@1212');
		mysql_select_db('rutvi',$con);
		$res=mysql_query("select * from user_tbl where pk_email_id='$email'",$con);
		$cnt=mysql_num_rows($res);
        if ($cnt > 0) {
          // User Exist 

          $_SESSION["name"] = $user->name;
          $_SESSION["email"] = $user->email;
          $_SESSION["new_user"] = "no";
        }
		else {
          // New user, Insert in database

        $type='User';
		$name=$user->name;
		$email= $user->email;
		$pic= $user->picture;
        $con=mysql_connect('rutvi.db.9462939.hostedresource.com','rutvi','Demo9@1212');
		mysql_select_db('rutvi',$con);
		$res=mysql_query("insert into user_tbl  VALUES ('$email','$name',Null,Null,Null,'$pic','$type',Null,Null)",$con);
		
         
		 if ($res > 0) {
            $_SESSION["name"] = $email= $user->name;
            $_SESSION["email"] = $email= $user->email;
            $_SESSION["new_user"] = "yes";
          }
        }
      }
   catch (Exception $ex) {
    $_SESSION["e_msg"] = $ex->getMessage();
  }

  $_SESSION["user_id"] = $user->id;
} else {
  $_SESSION["e_msg"] = $client->error;
}
	/*$name=$user->name;
	echo $name;
	$email=$user->email;
	echo $email;
	$gen=$user->gender;
	echo $gen;
	$pic=$user->picture;
	echo $pic;
	//print_r($user);*/
header("location:../user/view.php");
exit;
?>

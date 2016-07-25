<?php
session_start();
require_once './config.php';
// Only if user is logged in and given permission, we can fetch user details
if ($userID) {
  try {
    if ($_SESSION["user_id"] == "") {
      // fetch user details.
      $user_profile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');

      // Now check if user exist with same email ID
      
      try {
        $con=mysql_connect('rutvi.db.9462939.hostedresource.com','rutvi','Demo9@1212');
		mysql_select_db('rutvi',$con);
		$email=$user_profile["email"];
		$name=$user_profile["first_name"];
		$res=mysql_query("select * from user_tbl where pk_email_id='$email'",$con);
		$cnt=mysql_num_rows($res);
        if ($cnt > 0) {
          // User Exist 

          $_SESSION["name"] = $user_profile["first_name"];

          $_SESSION["email"] = $user_profile["email"];
          //$_SESSION["new_user"] = "no";
        } else {
          // New user, Insert in database
		$type='User';
		$email=$user_profile["email"];
		$name=$user_profile["first_name"];
        $con=mysql_connect('rutvi.db.9462939.hostedresource.com','rutvi','Demo9@1212');
		mysql_select_db('rutvi',$con);
		$res=mysql_query("insert into user_tbl  VALUES ('$email','$name',Null,Null,Null,Null,'$type',Null,Null)",$con);
         
		 if ($res > 0) {
            $_SESSION["name"] = $user_profile["name"];
            $_SESSION["email"] = $user_profile["email"];
            //$_SESSION["new_user"] = "yes";
          }
        }
      } catch (Exception $ex) {
        #echo $ex->getMessage();
      }
	//print_r($user_profile["email"]);
	//print_r($user_profile["picture"]);
	//print_r($user_profile["first_name"]);
	//print_r($user_profile);
	//$email=$user_profile["email"];
	//$name=$user_profile["first_name"];
	//echo $name;
	//echo $email;
	header('location:user/view.php');
	//echo  $user_profile[0]["link"];
	//echo  $user_profile[0]["picture"];
 
    }
    $_SESSION["user_id"] = $userID;
  } catch (FacebookApiException $e) {
    $userID = NULL;
  }
} else {
	// if not a authentic facebook user
	header("location:main.php");
}
?>
<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ob_start();
session_start();

define('PROJECT_NAME', 'Login System with facebook ');
define('DB_SERVER', 'rutvi.db.9462939.hostedresource.com');
define('DB_SERVER_USERNAME', 'rutvi');
define('DB_SERVER_PASSWORD', 'Demo9@1212');
define('DB_DATABASE', 'rutvi');


/* * ***** facebook related activities start ** */
require 'facebook_library/facebook.php';

define("APP_ID", "504044143127630");
define("APP_SECRET", "6ed21e730130940a7a2d8fd45a14a01b");
/* make sure the url end with a trailing slash */
define("SITE_URL", "http://demo9.brainoorja.com/shopping/facebook");
/* the page where you will be redirected after login */
define("REDIRECT_URL", SITE_URL."facebook_login.php");
/* Email permission for fetching emails. */
define("PERMISSIONS", "email");


/*  If database connection is OK, then proceed with facebook * */
// create a facebook object
$facebook = new Facebook(array('appId' => APP_ID, 'secret' => APP_SECRET));
$userID = $facebook->getUser();

// Login or logout url will be needed depending on current user login state.
if ($userID) {
  $logoutURL = $facebook->getLogoutUrl(array('next' => SITE_URL . 'logout.php'));
} else {
  $loginURL = $facebook->getLoginUrl(array('scope' => PERMISSIONS, 'redirect_uri' => REDIRECT_URL));
}
?>
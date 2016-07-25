<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ob_start();
session_start();

define('PROJECT_NAME', 'Login System with Google');
define('DB_SERVER', 'rutvi.db.9462939.hostedresource.com');
define('DB_SERVER_USERNAME', 'rutvi');
define('DB_SERVER_PASSWORD', 'Demo9@1212');
define('DB_DATABASE', 'rutvi');


/* make sure the url end with a trailing slash */
define("SITE_URL", "http://demo9.brainoorja.com/shopping/login-system-google/");
/* the page where you will be redirected for authorzation */
define("REDIRECT_URL", SITE_URL."google_login.php");

/* * ***** Google related activities start ** */
define("CLIENT_ID", "155438986156-tcv6b4nmi7mj0qa91cobru4utbnrgdb2.apps.googleusercontent.com");
define("CLIENT_SECRET", "gKG_CIW9H3UVSBPoad_Ctso3");

/* permission */
define("SCOPE", 'https://www.googleapis.com/auth/userinfo.email '.
		'https://www.googleapis.com/auth/userinfo.profile' );



/* logout both from google and your site **/
define("LOGOUT_URL", "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=". urlencode(SITE_URL."logout.php"));
/* * ***** Google related activities end ** */
?>
<!-- end session -->
<?php 
session_start();
$_SESSION['session_username'] = "";
$_SESSION['session_password'] = "";
session_destroy();

//end cookie username
$cookie_name = "cookie_username";
$cookie_value = "";
$time = time() - (60 * 60);
setcookie($cookie_name,$cookie_value,$time,"/");

//end cookie password
$cookie_name = "cookie_password";
$cookie_value = "";
$time = time() - (60 * 60);
setcookie($cookie_name,$cookie_value,$time,"/");


header("location:index.php");
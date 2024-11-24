<?php
session_start();

// Destroy session
session_unset();
session_destroy();

// Clear cookies
setcookie('username', '', time() - 3600, "/");

// Redirect to login page
header("Location: login.php");
exit();
?>

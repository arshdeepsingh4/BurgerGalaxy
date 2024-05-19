<?php
session_start();
session_unset();
// Destroy the session
session_destroy();
// Redirect to the login page
header("location: login.php");
exit;
?>

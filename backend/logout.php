<?php
session_start();

// Clear all session variables
$_SESSION = [];

// Destroy the session completely
session_destroy();

// Redirect user to the login page
header("Location: ../login.php");
exit;

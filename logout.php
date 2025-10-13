<?php
session_start(); // Start the session

// Check if admin is logged in
if(isset($_SESSION['admin_id'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to admin login page
    header("Location: admin_login.php");
    exit();
} else {
    // If no admin session, just redirect to login page
    header("Location: admin_login.php");
    exit();
}
?>

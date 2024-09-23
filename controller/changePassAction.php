<?php
session_start();
require "../model/userData.php";

// Initialize variables
$_SESSION["change_pass_error"] = '';

// Check if user is logged in (cookie set)
if (!isset($_COOKIE['user'])) {
    header("Location: ../view/login.php");
    exit();
}

// Get the user's email from the cookie
$email = $_COOKIE['user'];

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and validate form inputs
    $currentPassword = sanitize($_POST['current_password']);
    $newPassword = sanitize($_POST['new_password']);

    // Validate inputs
    if (empty($currentPassword) || empty($newPassword)) {
        $_SESSION["change_pass_error"] = "Both current and new passwords are required.";
        header("Location: ../view/dashboard.php#cp");
        exit();
    }

    // Check if current password is correct
    $result = validateAndChangePassword($email, $currentPassword, $newPassword);

    if ($result === 'current_password_invalid') {
        $_SESSION["change_pass_error"] = "Current password is incorrect.";
        header("Location: ../view/dashboard.php#cp");
        exit();
    } elseif ($result === 'update_failed') {
        $_SESSION["change_pass_error"] = "Password update failed.";
        header("Location: ../view/dashboard.php#cp");
        exit();
    } else {
        // Password updated successfully
        header("Location: ../view/dashboard.php");
        exit();
    }
}

// Function to sanitize input
function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
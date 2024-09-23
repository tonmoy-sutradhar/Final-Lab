<?php
session_start();
require "../model/userData.php";

// Initialize error message
$_SESSION["forgot_new_pass_error"] = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and validate form inputs
    $newPassword = sanitize($_POST['new-password']);
    $confirmPassword = sanitize($_POST['confirm-password']);

    // Validate inputs
    if (empty($newPassword) || empty($confirmPassword)) {
        $_SESSION["forgot_new_pass_error"] = "Both fields are required.";
        header("Location: ../view/forgotNewPass.php");
        exit();
    }

    if ($newPassword !== $confirmPassword) {
        $_SESSION["forgot_new_pass_error"] = "Passwords do not match.";
        header("Location: ../view/forgotNewPass.php");
        exit();
    }

    // Check if forgotEmail cookie is set
    if (!isset($_COOKIE['forgotEmail'])) {
        header("Location: ../view/login.php");
        exit();
    }

    $email = $_COOKIE['forgotEmail'];

    // Update the password in the database
    $result = updatePassword($email, $newPassword);

    if ($result) {
        // Clear the cookie and redirect to login
        setcookie('forgotEmail', '', time() - 3600, '/'); // Expire the cookie
        header("Location: ../view/login.php");
    } else {
        $_SESSION["forgot_new_pass_error"] = "Password update failed.";
        header("Location: ../view/forgotNewPass.php");
    }
    exit();
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
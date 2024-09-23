<?php
session_start();
require "../model/userData.php";

// Initialize error message
$_SESSION["forgot_page_error"] = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize the form input
    $email = sanitize($_POST['email']);

    // Validate input
    if (empty($email)) {
        $_SESSION["forgot_page_error"] = "Email is required.";
        header("Location: ../view/forgot.php");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["forgot_page_error"] = "Invalid email format.";
        header("Location: ../view/forgot.php");
        exit();
    } else {
        // Check if email exists in the database
        $user = getUserByEmail($email); // Assuming this function checks if the email exists

        if (!$user) {
            $_SESSION["forgot_page_error"] = "No account found with this email.";
            header("Location: ../view/forgot.php");
            exit();
        } else {
            // Email exists, store email in cookie and redirect to forgotNewPass.php
            setcookie("forgotEmail", $email, time() + 3600, "/"); // 1 hour expiration
            header("Location: ../view/forgotNewPass.php");
            exit();
        }
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
<?php
// Start session
session_start();

// Check if the forgotEmail cookie is set
if (!isset($_COOKIE['forgotEmail'])) {
    // Redirect to login page if the cookie is not set
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - New Password</title>
    <link rel="stylesheet" href="css/styles.css">

    <!-- Link to external JavaScript file for validation -->
    <script src="js/forgotNewPass.js" defer></script>

    <style>
        /* Center the form in the middle of the window */
        body,
        html {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #f4f4f4;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
        }

        input[type="password"],
        button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-size: 12px;
            text-align: center;
        }
    </style>

</head>

<body>
    <div class="container">
        <form action="../controller/forgotNewPassAction.php" method="POST" novalidate class="forgot-new-pass-form"
            onsubmit="return isValidNewPass(this)">
            <h2>Set New Password</h2>

            <label for="new-password">New Password</label>
            <input type="password" id="new-password" name="new-password" required>
            <span id="new-pass-err" class="error-message"></span><br>

            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
            <span id="confirm-pass-err" class="error-message"></span>

            <button type="submit">Change Password</button>

            <!-- Error message -->
            <p class="error-message">
                <?php echo empty($_SESSION["forgot_new_pass_error"]) ? "" : $_SESSION["forgot_new_pass_error"]; ?>
            </p>
        </form>
    </div>
</body>

</html>
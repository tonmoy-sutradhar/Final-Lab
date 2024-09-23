<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/styles.css">

    <!-- Link to external JavaScript file for validation -->
    <script src="js/forgot.js" defer></script>

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

        input[type="text"],
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

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: #4CAF50;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>

</head>

<body>
    <div class="container">
        <form action="../controller/forgotAction.php" method="POST" novalidate class="forgot-form"
            onsubmit="return isValidForgot(this)">
            <h2>Forgot Password</h2>

            <label for="email">Enter your email to Change Password</label>
            <input type="text" id="email" name="email" required>
            <span id="femailerr" style="color: red; font-size: 12px; display: block; margin-bottom: 7px;"></span>

            <button type="submit">Change Password</button>

            <!-- Error message -->
            <p class="error-message">
                <?php echo empty($_SESSION["forgot_page_error"]) ? "" : $_SESSION["forgot_page_error"]; ?>
            </p>
        </form>

        <!-- Link to the login page -->
        <div class="login-link">
            <p>Remembered your password? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>

</html>
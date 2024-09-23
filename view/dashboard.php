<?php
session_start();
if (!isset($_COOKIE['user'])) {
    header("Location: login.php");
    exit();
}

$email = htmlspecialchars($_COOKIE['user']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link external JS file -->
    <script src="js/dashboard.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        header {
            background-color: #666;
            padding: 30px;
            text-align: center;
            font-size: 35px;
            color: white;
        }

        nav {
            float: left;
            width: 30%;
            background: #ccc;
            padding: 20px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li a {
            text-decoration: none;
            color: black;
            display: block;
            padding: 8px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #999;
        }

        article {
            float: left;
            padding: 20px;
            width: 70%;
            background-color: #f1f1f1;
            min-height: 300px;
        }

        section::after {
            content: "";
            display: table;
            clear: both;
        }

        footer {
            background-color: #777;
            padding: 10px;
            text-align: center;
            color: white;
        }

        @media (max-width: 600px) {
            nav, article {
                width: 100%;
                height: auto;
            }
        }

        .breadcrumb {
            margin: 10px 0;
            padding: 10px;
            background-color: #eee;
            display: none;
        }

        .breadcrumb a {
            text-decoration: none;
            color: #333;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }

        .edit-button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .edit-button:hover {
            background-color: #45a049;
        }
        .header {
            display: flex;
            justify-content: space-between; /* Space between heading and button */
            align-items: center; /* Align items vertically centered */
            margin-bottom: 15px; /* Spacing below the header */
        }

        #editButton {
            /* Optional styles for the edit button */
            margin-left: auto; /* Push the button to the right */
        }

    </style>
</head>
<body>
    <header>
        <h2> JS Project</h2>
    </header>

    <section>
        <nav>
            <ul>
                <li><a href="#home" onclick="showSection('home')">Home</a></li>
                <li><a href="#profile" onclick="showSection('profile')">Profile</a></li>
                <li><a href="#cp" onclick="showSection('change-password')">Change Password</a></li>
                <li><a href="../controller/logoutAction.php">Logout</a></li>
            </ul>
        </nav>

        <article>
            <!-- Home Section -->
            <div id="home" class="form-section active">
                <h1 id="main-heading">Home</h1>
                <p>Welcome to your dashboard! Feel free to explore and manage your profile.</p>
            </div>

            <!-- Profile Section -->
            <div id="profile" class="form-section">
                <div class="header">
                    <h1 id="main-heading">Profile</h1>
                    <button id="editButton" class="edit-button" onclick="toggleEdit()">Edit Profile</button>
                </div>
                <form id="profileForm" action="../controller/updateProfileAction.php" method="POST" novalidate onsubmit="updateProfile(this)">
                    <div class="form-group">
                        <label for="user-id">User ID:</label>
                        <input type="text" id="user-id" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email" value="" readonly>
                        <span id="emailError" style="color: red; font-size: 12px; display: none;"><?php echo (empty($_SESSION['emailError'])?"":$_SESSION['emailError']); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" id="phone" name="phone" value="" readonly>
                        <span id="phoneError" style="color: red; font-size: 12px; display: none;"><?php echo (empty($_SESSION['phoneError'])?"":$_SESSION['phoneError']); ?></span>
                    </div>
                    <div class="form-group">
                        <label for="full-name">Full Name:</label>
                        <input type="text" id="full-name" name="full_name" value="" readonly>
                        <span id="nameError" style="color: red; font-size: 12px; display: none;"><?php echo (empty($_SESSION['nameError'])?"":$_SESSION['nameError']); ?></span>
                    </div>
                    <button type="submit" class="edit-button" id="saveButton" style="display: none;">Update Profile</button>
                </form>
            </div>



            <!-- Change Password Form -->
            <div id="change-password" class="form-section">
                <form id="changePasswordForm" action="../controller/changePassAction.php" method="POST" novalidate onsubmit="return changePassword(this)">
                    <p>Please enter your current and new password to change your password.</p>
                    <div class="form-group">
                        <label for="current-password">Current Password</label>
                        <input type="password" name="current_password" id="current-password" placeholder="Enter current password">
                        <span id="cCurrentpasserr" style="color: red; font-size: 12px; display: block; margin-bottom: 7px;"></span>
                    </div>
                    <div class="form-group">
                        <label for="new-password">New Password</label>
                        <input type="password" name="new_password" id="new-password" placeholder="Enter new password">
                        <span id="cNewpasserr" style="color: red; font-size: 12px; display: block; margin-bottom: 7px;"><?php echo (empty($_SESSION['change_pass_error']) ? "" : $_SESSION['change_pass_error']); ?></span>
                    </div>
                    <input type="submit" value="Change Password">
                </form>
            </div>
        </article>
    </section>

    <footer>
        <p> JS Project footer</p>
    </footer>
</body>
</html>

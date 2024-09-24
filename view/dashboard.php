<?php
session_start();
if (!isset($_COOKIE['user'])) {
    header("Location: login.php");
    exit();
}

$email = htmlspecialchars($_COOKIE['user']);

// Assuming you have a function to get user details by email
require_once '../model/UserData.php';
$userDetails = getUserDetailsByEmail($email); // Fetch user details including name
$username = $userDetails['name']; // Assuming the name is stored in the 'name' field
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link external JS file -->
    <script src="js/dashboard.js"></script>
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
                <h1 id="main-heading">DASHBOARD</h1>
                <p > <span id="username"> Welcome,</span> <?php echo $username; ?> <br> Donate for Bangladesh.</p> <!-- Display the user's name here -->
                <img src="assets/donate.jpg" alt="">
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

<?php
// Starting session
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";  // Enter your MySQL root password
$dbname = "taka_donation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch current balances from database
$sql = "SELECT noakhali_balance, feni_balance, movement_balance FROM donation_balances WHERE id=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $noakhaliBalance = $row['noakhali_balance'];
    $feniBalance = $row['feni_balance'];
    $movementBalance = $row['movement_balance'];
} else {
    $noakhaliBalance = 0;
    $feniBalance = 0;
    $movementBalance = 0;
}

// Handle form submissions for donations
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['donate_noakhali'])) {
        $noakhaliBalance += (int)$_POST['noakhali_amount'];
    } elseif (isset($_POST['donate_feni'])) {
        $feniBalance += (int)$_POST['feni_amount'];
    } elseif (isset($_POST['donate_movement'])) {
        $movementBalance += (int)$_POST['movement_amount'];
    }

    // Update the balances in the database
    $updateSql = "UPDATE donation_balances SET 
                  noakhali_balance = $noakhaliBalance, 
                  feni_balance = $feniBalance, 
                  movement_balance = $movementBalance 
                  WHERE id = 1";
    
    if ($conn->query($updateSql) === TRUE) {
        echo "Records updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>


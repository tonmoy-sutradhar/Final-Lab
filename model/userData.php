<?php
function dbResponse($email, $password)
{
    // Create connection
    $conn = new mysqli("localhost", "root", "", "my_app");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the query
    $sql = "SELECT id FROM User WHERE email = '$email' and password = '$password'";
    $result = $conn->query($sql);

    $conn->close();
    return $result;
}

function isEmailPhoneExist($email, $phone)
{
    // Create connection
    $conn = new mysqli("localhost", "root", "", "my_app");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if email or phone already exists
    $sql = "SELECT id FROM User WHERE email = '$email' OR phone = '$phone'";
    $result = $conn->query($sql);
    $rowNumber = $result->num_rows;

    return $rowNumber;
}

function insertUser($email, $phone, $fullname, $gender, $password)
{
    // Create connection
    $conn = new mysqli("localhost", "root", "", "my_app");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Insert user data into the database
    $sql = "INSERT INTO User (email, phone, name, gender, password) VALUES ('$email', '$phone', '$fullname', '$gender', '$password')";

    $result = $conn->query($sql);

    return $result == true;
}

function validateAndChangePassword($email, $currentPassword, $newPassword)
{
    // Create connection
    $conn = new mysqli("localhost", "root", "", "my_app");

    // Check connection
    if ($conn->connect_error) {
        return 'update_failed';
    }

    // Check if current password is correct
    $stmt = $conn->prepare("SELECT password FROM User WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        $stmt->close();
        $conn->close();
        return 'current_password_invalid';
    }

    $stmt->bind_result($storedPassword);
    $stmt->fetch();
    $stmt->close();

    if ($storedPassword !== $currentPassword) {
        $conn->close();
        return 'current_password_invalid';
    }

    // Update the password
    $stmt = $conn->prepare("UPDATE User SET password = ? WHERE email = ?");
    $stmt->bind_param("ss", $newPassword, $email);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        return 'success';
    } else {
        $stmt->close();
        $conn->close();
        return 'update_failed';
    }
}

function getUserByEmail($email)
{
    // Create connection
    $conn = new mysqli("localhost", "root", "", "my_app");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL query
    $sql = "SELECT id FROM User WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if email exists
    $exists = $stmt->num_rows > 0;

    // Close statement and connection
    $stmt->close();
    $conn->close();

    return $exists;
}

function getUserDetailsByEmail($email) {
    // Create connection
    $conn = new mysqli("localhost", "root", "", "my_app");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the query
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    // Fetch the result as an associative array
    $userDetails = mysqli_fetch_assoc($result);

    // Close the connection
    $conn->close();

    return $userDetails;
}

function updatePassword($email, $newPassword)
{
    // Create connection
    $conn = new mysqli("localhost", "root", "", "my_app");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize inputs
    $email = $conn->real_escape_string($email);
    $newPassword = $conn->real_escape_string($newPassword);

    // Prepare SQL statement to update the password
    $sql = "UPDATE User SET password = ? WHERE email = ?";

    // Prepare and execute the statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $newPassword, $email);

        // Execute the statement
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            return true; // Success
        } else {
            $stmt->close();
            $conn->close();
            return false; // Error executing the query
        }
    } else {
        $conn->close();
        return false; // Error preparing the statement
    }
}

function updateUserProfile($userId, $newEmail, $newPhone, $newName) {
    // Create connection
    $conn = mysqli_connect("localhost", "root", "", "my_app");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL statement
    $sql = "UPDATE user SET email='$newEmail', phone='$newPhone', name='$newName' WHERE id=$userId";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        return true;
    } else {
        mysqli_close($conn);
        return false;
    }

}

function isPhoneExist($newPhone) {
    $servername = "localhost";
    $username = "root";
    $password = ""; // Empty password
    $dbname = "my_app"; // Your database name

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL statement
    $sql = "SELECT COUNT(*) FROM user WHERE phone='$newPhone'";
    $result = mysqli_query($conn, $sql);
    
    // Check the result
    if ($result) {
        $row = mysqli_fetch_array($result);
        mysqli_close($conn);
        return $row[0] > 0; // Return true if phone exists
    } else {
        mysqli_close($conn);
        return false; // Return false on error
    }
}

function isEmailExist($newEmail) {
    $servername = "localhost";
    $username = "root";
    $password = ""; // Empty password
    $dbname = "my_app"; // Your database name

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL statement
    $sql = "SELECT COUNT(*) FROM user WHERE email='$newEmail'";
    $result = mysqli_query($conn, $sql);
    
    // Check the result
    if ($result) {
        $row = mysqli_fetch_array($result);
        mysqli_close($conn);
        return $row[0] > 0; // Return true if email exists
    } else {
        mysqli_close($conn);
        return false; // Return false on error
    }
}

?>
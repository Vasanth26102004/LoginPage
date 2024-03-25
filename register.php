<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "admin";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

        // Retrieve and sanitize user input
        $username = $conn->real_escape_string($_POST['user']);
        $email = $conn->real_escape_string($_POST['email']);
        $pass = $conn->real_escape_string($_POST['pass']);

        // Hash the password for security
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        // Prepare insert statement
        $stmt = $conn->prepare("INSERT INTO page03 (Username,Email,Pass) VALUES (?,?,?)");
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        // Execute the insert statement
        if ($stmt->execute()) {
            echo "Registered successfully<br>";
        } else {
        }

        // Close statement
        $stmt->close();

    // Close connection
    $conn->close();
}
?>

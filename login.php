<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Database connection
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

    // Retrieve email and password from the form
    $email = $conn->real_escape_string($_POST["email"]);
    $sql = "SELECT Pass FROM page03 WHERE Email='$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password_from_db = $row['Pass'];
    
        // Verify the provided password against the hashed password from the database
        $password = $_POST['pass'];
        if (password_verify($password, $hashed_password_from_db)) {
            echo "Login successful!";
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Error: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

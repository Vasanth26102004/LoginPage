<?php
/*$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$create_database_sql = "CREATE DATABASE IF NOT EXISTS admin";

if ($conn->query($create_database_sql) === FALSE){
    echo "Error creating Database: " . $conn->error . "<br>";
}*/


if ($_SERVER["REQUEST_METHOD"] == "POST"){

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";


$conn = new mysqli($servername, $username, $password,$dbname);

    $username = $_POST['user'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $insert_sql = "INSERT INTO page01 (Username,Email,Pass)
                        VALUES ('$username','$email','$pass')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "Registered successfully<br>";
    } else {
        echo "Error inserting value: " . $conn->error . "<br>";
    }


$conn->close();
}
?>

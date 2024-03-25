<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

   $email = $_POST["email"];
   $pass = $_POST["pass"];

   $checkQuery = "SELECT COUNT() FROM page01 WHERE Username='$user' AND Pass='$password'" ;
   $result = $conn->query($checkQuery);

   if ($result->num_rows > 0) {
       echo "Login successful!";
   } else {
       echo "Invalid username or password";
   }

$conn->close();
?>
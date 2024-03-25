<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

   $email = $_POST["email"];
   $pass = $_POST["pass"];

   $checkQuery = "SELECT COUNT() FROM page01 WHERE Username='$user' AND Pass='$password'" ;
   $result = $conn->query($checkQuery);
   $checkQuery ="SELECT * FROM page01";

   if ($result> 0) {
       echo "Login successful!";
   } else {
       echo "Invalid username or password";
   }

$conn->close();
}
?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

$conn = new mysqli($servername, $username, $password, $dbname);

$create_table_sql = "CREATE TABLE IF NOT EXISTS page03
(
Username varchar(20),
Email varchar(50) NOT NULL,
Pass varchar(200),
PRIMARY KEY (Email),
UNIQUE (Username,Pass)
)";

if ($conn->query($create_table_sql) === TRUE) {
   echo "Table created successfully<br>";
} else {
   echo "Error creating table: " . $conn->error . "<br>";
}

$conn->close();
?>
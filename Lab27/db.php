<?php
$servername = "localhost";
$username = "root";  // Change if necessary
$password = "";      // Change if necessary
$dbname = "attendance_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

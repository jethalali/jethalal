<?php
$host = "localhost";
$dbname = "college_complaints";
$username = "root"; // Change this if your DB user is different
$password = ""; // Change this if your DB password is different

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>
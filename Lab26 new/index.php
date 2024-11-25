<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "<h2>Welcome " . $_SESSION['username'] . "</h2>";
echo "<p><a href='logout.php'>Logout</a></p>";
?>

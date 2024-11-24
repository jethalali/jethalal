<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Insert student into the database
    $sql = "INSERT INTO students (name, roll_no, email, password) VALUES ('$name', '$roll_no', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful! <a href='login.php'>Login</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Student Registration</h2>
        <form action="register.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            <label for="roll_no">Roll No:</label>
            <input type="text" name="roll_no" id="roll_no" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>

<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $stmt = $conn->prepare("INSERT INTO students (name, email, age) VALUES (:name, :email, :age)");
    $stmt->execute(['name' => $name, 'email' => $email, 'age' => $age]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="styles.css">
    <script src="validate.js"></script>
</head>
<body>
    <div class="container">
        <h1>Add Student</h1>
        <form method="POST" onsubmit="return validateForm()">
            <input type="text" name="name" id="name" placeholder="Name" required>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="number" name="age" id="age" placeholder="Age" required>
            <button type="submit">Add Student</button>
        </form>
    </div>
</body>
</html>
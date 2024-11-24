<?php include '../db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Add Food Item</title>
</head>
<body>
    <h1>Add Food Item</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Description:</label>
        <textarea name="description" required></textarea><br>

        <label>Price:</label>
        <input type="number" step="0.01" name="price" required><br>

        <label>Image:</label>
        <input type="file" name="image" required><br>

        <button type="submit">Add Food Item</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_FILES['image']['name'];
        $target = "../uploads/" . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $sql = "INSERT INTO food_items (name, description, price, image) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$name, $description, $price, $image]);
            echo "<p>Food item added successfully!</p>";
        } else {
            echo "<p>Error uploading the image.</p>";
        }
    }
    ?>
</body>
</html>

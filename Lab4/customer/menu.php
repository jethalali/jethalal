<?php include '../db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Menu</title>
</head>
<body>
    <h1>Menu</h1>
    <div class="menu">
        <?php
        $items = $conn->query("SELECT * FROM food_items");
        while ($item = $items->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='menu-item'>
                <img src='../uploads/{$item['image']}' alt='{$item['name']}'>
                <h3>{$item['name']}</h3>
                <p>{$item['description']}</p>
                <p>\${$item['price']}</p>
                <form method='POST' action='cart.php'>
                    <input type='hidden' name='food_item_id' value='{$item['id']}'>
                    <button type='submit'>Add to Cart</button>
                </form>
            </div>";
        }
        ?>
    </div>
</body>
</html>
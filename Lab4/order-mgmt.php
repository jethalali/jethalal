$orders = $conn->query("SELECT * FROM orders");
while ($order = $orders->fetch(PDO::FETCH_ASSOC)) {
    echo "<div>Order ID: {$order['id']} - Status: {$order['status']}</div>";
    echo "<form method='POST'>
        <select name='status'>
            <option value='pending'>Pending</option>
            <option value='preparing'>Preparing</option>
            <option value='delivered'>Delivered</option>
            <option value='cancelled'>Cancelled</option>
        </select>
        <button type='submit'>Update</button>
        <input type='hidden' name='order_id' value='{$order['id']}'>
    </form>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
    $order_id = $_POST['order_id'];
    $conn->query("UPDATE orders SET status='$status' WHERE id=$order_id");
    echo "Order updated!";
}
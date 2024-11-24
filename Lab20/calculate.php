<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the number of units from the form
    $units = $_POST['units'];
    $bill = 0;

    // Calculate bill based on the units
    if ($units <= 50) {
        $bill = $units * 3.50;
    } elseif ($units <= 150) {
        $bill = (50 * 3.50) + (($units - 50) * 4.00);
    } elseif ($units <= 250) {
        $bill = (50 * 3.50) + (100 * 4.00) + (($units - 150) * 5.20);
    } else {
        $bill = (50 * 3.50) + (100 * 4.00) + (100 * 5.20) + (($units - 250) * 6.50);
    }

    // Output the calculated bill
    echo "<div class='alert alert-success'>
            <h4 class='alert-heading'>Electricity Bill</h4>
            <p>Total Units: $units</p>
            <p>Total Bill: Rs. " . number_format($bill, 2) . "</p>
          </div>";
}
?>

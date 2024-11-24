$(document).ready(function () {
    // Form submission using AJAX
    $('#billForm').on('submit', function (e) {
        e.preventDefault();  // Prevent default form submission
        
        var units = $('#units').val();
        
        if (units < 1) {
            alert("Please enter a valid number of units.");
            return;
        }

        // Send AJAX request
        $.ajax({
            url: 'calculate.php',
            method: 'POST',
            data: { units: units },
            success: function (response) {
                $('#result').html(response);  // Display the result
            },
            error: function () {
                alert("There was an error processing your request.");
            }
        });
    });
});

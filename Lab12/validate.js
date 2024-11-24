function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var age = document.getElementById("age").value;

    // Check if name is empty
    if (name == "") {
        alert("Name must be filled out");
        return false;
    }

    // Check if email is valid
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!email.match(emailPattern)) {
        alert("Please enter a valid email address");
        return false;
    }

    // Check if age is a positive number
    if (age <= 0) {
        alert("Age must be a positive number");
        return false;
    }

    return true;
}
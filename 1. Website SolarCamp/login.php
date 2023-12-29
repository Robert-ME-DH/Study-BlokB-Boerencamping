<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "o*@tL4F!DtN36qLYx9k6nsF-pPzdhMQa6hVmG.A!3FxdgGDk.E";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from the HTML form
$username = $_POST['username'];
$password = $_POST['password'];

// Hash the password (assuming you stored hashed passwords in the database)
$hashed_password = hash('sha256', $password);

// Query the database for the user
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$hashed_password'";
$result = $conn->query($sql);

// Check if the user exists
if ($result->num_rows > 0) {
    echo "Login successful!";
} else {
    echo "Invalid username or password";
}

// Close the database connection
$conn->close();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "login_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verify the hashed password
        if (password_verify($password, $hashedPassword)) {
            echo "Login successful!";
            // Redirect to a new page or perform other actions after successful login.
        } else {
            echo "Login failed. Check your username and password.";
        }
    } else {
        echo "Login failed. Check your username and password.";
    }
}

// Close the connection
$conn->close();
?>
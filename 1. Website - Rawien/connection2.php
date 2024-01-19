<!-- php -S localhost:5000 -->
<?php
$servername = "localhost";
$username = "root";
$password = "@Defendertd5130";
$dbname = "data1";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

    // Rest of Code
    $name = $_POST["name"];
    $email = $_POST["email"];
    $begindatum = $_POST["date1"];
    $einddatum = $_POST["date2"];
      // Assuming you have a 'volwassenen' field in your form
    $kinderen = $_POST["kinderen"];        // Assuming you have a 'kinderen' field in your form

    $stmt = $conn->prepare("INSERT INTO customerform (Naam, Email, Begindatum, Einddatum, Kinderen) VALUES (:name, :email, :begindatum, :einddatum, :kinderen)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':begindatum', $begindatum);
    $stmt->bindParam(':einddatum', $einddatum);
   
    $stmt->bindParam(':kinderen', $kinderen);

    // Execute the prepared statement
    $stmt->execute();

    header("Location: Betalings pagina.html");
    // Close connection
    $conn = null;
    exit();
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>



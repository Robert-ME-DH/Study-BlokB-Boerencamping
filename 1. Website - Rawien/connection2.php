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
    $volwassenen = $_POST["Volwassenen"];
    $kinderen = $_POST["kinderen"];   
    $zwembad = $_POST["zwembad"];    // Assuming you have a 'kinderen' field in your form

    $stmt = $conn->prepare("INSERT INTO customerform (Naam, Email, Begindatum, Einddatum, Volwassenen, Kinderen, Zwembad) VALUES (:name, :email, :begindatum, :einddatum, :volwassenen, :kinderen, :zwembad)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':begindatum', $begindatum);
    $stmt->bindParam(':einddatum', $einddatum);
    $stmt->bindParam(':volwassenen', $volwassenen);
    $stmt->bindParam(':kinderen', $kinderen);
    $stmt->bindParam(':zwembad', $zwembad);

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



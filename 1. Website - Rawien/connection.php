<!-- php -S localhost:5000 -->

<?php -S localhost:5000
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

  $sql = "INSERT INTO customerform (Naam, Email, Begindatum, Einddatum) VALUES ('$name', '$email', '$begindatum', '$einddatum')";

  // Voer uit
  $conn->exec($sql);

  header("Location: Betalings pagina.html");
  // Close connection
  $conn = null;
  exit();
}
catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>

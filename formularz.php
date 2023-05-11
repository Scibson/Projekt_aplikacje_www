<?php
$host = "localhost"; // Nazwa hosta, zazwyczaj "localhost"
$username = "root"; // Nazwa użytkownika bazy danych
$password = ""; // Hasło do bazy danych
$dbname = "html"; // Nazwa bazy danych

// Połączenie z bazą danych
$conn = mysqli_connect($host, $username, $password, $dbname);

// Sprawdzenie, czy udało się połączyć z bazą danych
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Pobranie danych z formularza
  $imie = $_POST['imie'];
  $nazwisko = $_POST['nazwisko'];
  $email = $_POST['email'];

  // Wstawienie danych do bazy danych
  $sql = "INSERT INTO formularz (imie, nazwisko, email) VALUES ('$imie', '$nazwisko', '$email')";

  if (mysqli_query($conn, $sql)) {
    echo "Dane zostały pomyślnie dodane do bazy danych";
  } else {
    echo "Błąd: " . $sql . "<br>" . mysqli_error($conn);
  }
}
// Zamknięcie połączenia z bazą danych
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Formularz</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <header>
    <h1>Formularz</h1>
  </header>

  <section>
    <h2>Wpisz swoje dane</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
      <label for="imie">Imię:</label><br>
      <input type="text" name="imie" id="imie" required><br>

      <label for="nazwisko">Nazwisko:</label><br>
      <input type="text" name="nazwisko" id="nazwisko" required><br>

      <label for="email">Email:</label><br>
      <input type="email" name="email" id="email" required><br>

      <input type="submit" value="Wyślij">
    </form>
  </section>
</body>
</html>